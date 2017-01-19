<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bundle\FrameworkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;

/**
 * Controller is a simple implementation of a Controller.
 *
 * It provides methods to common features needed in controllers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Controller extends ContainerAware
{
    /**
     * Generates a URL from the given parameters.
     *
     * @param string $route         The name of the route
     * @param mixed  $parameters    An array of parameters
     * @param int    $referenceType The type of reference (one of the constants in UrlGeneratorInterface)
     *
     * @return string The generated URL
     *
     * @see UrlGeneratorInterface
     */
    public function generateUrl($route, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->container->get('router')->generate($route, $parameters, $referenceType);
    }

    /**
     * Forwards the request to another controller.
     *
     * @param string $controller The controller name (a string like BlogBundle:Post:index)
     * @param array  $path       An array of path parameters
     * @param array  $query      An array of query parameters
     *
     * @return Response A Response instance
     */
    public function forward($controller, array $path = array(), array $query = array())
    {
        $path['_controller'] = $controller;
        $subRequest = $this->container->get('request_stack')->getCurrentRequest()->duplicate($query, null, $path);

        return $this->container->get('http_kernel')->handle($subRequest, HttpKernelInterface::SUB_REQUEST);
    }

    /**
     * Returns a RedirectResponse to the given URL.
     *
     * @param string $url    The URL to redirect to
     * @param int    $status The status code to use for the Response
     *
     * @return RedirectResponse
     */
    public function redirect($url, $status = 302)
    {
        return new RedirectResponse($url, $status);
    }

    /**
     * Returns a RedirectResponse to the given route with the given parameters.
     *
     * @param string $route      The name of the route
     * @param array  $parameters An array of parameters
     * @param int    $status     The status code to use for the Response
     *
     * @return RedirectResponse
     */
    protected function redirectToRoute($route, array $parameters = array(), $status = 302)
    {
        return $this->redirect($this->generateUrl($route, $parameters), $status);
    }

    /**
     * Adds a flash message to the current session for type.
     *
     * @param string $type    The type
     * @param string $message The message
     *
     * @throws \LogicException
     */
    protected function addFlash($type, $message)
    {
        if (!$this->container->has('session')) {
            throw new \LogicException('You can not use the addFlash method if sessions are disabled.');
        }

        $this->container->get('session')->getFlashBag()->add($type, $message);
    }

    /**
     * Checks if the attributes are granted against the current authentication token and optionally supplied object.
     *
     * @param mixed $attributes The attributes
     * @param mixed $object     The object
     *
     * @return bool
     *
     * @throws \LogicException
     */
    protected function isGranted($attributes, $object = null)
    {
        if (!$this->container->has('security.authorization_checker')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        return $this->container->get('security.authorization_checker')->isGranted($attributes, $object);
    }

    /**
     * Throws an exception unless the attributes are granted against the current authentication token and optionally
     * supplied object.
     *
     * @param mixed  $attributes The attributes
     * @param mixed  $object     The object
     * @param string $message    The message passed to the exception
     *
     * @throws AccessDeniedException
     */
    protected function denyAccessUnlessGranted($attributes, $object = null, $message = 'Access Denied.')
    {
        if (!$this->isGranted($attributes, $object)) {
            throw $this->createAccessDeniedException($message);
        }
    }

    /**
     * Returns a rendered view.
     *
     * @param string $view       The view name
     * @param array  $parameters An array of parameters to pass to the view
     *
     * @return string The rendered view
     */
    public function renderView($view, array $parameters = array())
    {
        if ($this->container->has('templating')) {
            return $this->container->get('templating')->render($view, $parameters);
        }

        if (!$this->container->has('twig')) {
            throw new \LogicException('You can not use the "renderView" method if the Templating Component or the Twig Bundle are not available.');
        }

        return $this->container->get('twig')->render($view, $parameters);
    }

    /**
     * Renders a view.
     *
     * @param string   $view       The view name
     * @param array    $parameters An array of parameters to pass to the view
     * @param Response $response   A response instance
     *
     * @return Response A Response instance
     */
    public function render($view, array $parameters = array(), Response $response = null)
    {
        if ($this->container->has('templating')) {
            return $this->container->get('templating')->renderResponse($view, $parameters, $response);
        }

        if (!$this->container->has('twig')) {
            throw new \LogicException('You can not use the "render" method if the Templating Component or the Twig Bundle are not available.');
        }

        if (null === $response) {
            $response = new Response();
        }

        $response->setContent($this->container->get('twig')->render($view, $parameters));

        return $response;
    }

    /**
     * Streams a view.
     *
     * @param string           $view       The view name
     * @param array            $parameters An array of parameters to pass to the view
     * @param StreamedResponse $response   A response instance
     *
     * @return StreamedResponse A StreamedResponse instance
     */
    public function stream($view, array $parameters = array(), StreamedResponse $response = null)
    {
        if ($this->container->has('templating')) {
            $templating = $this->container->get('templating');

            $callback = function () use ($templating, $view, $parameters) {
                $templating->stream($view, $parameters);
            };
        } elseif ($this->container->has('twig')) {
            $twig = $this->container->get('twig');

            $callback = function () use ($twig, $view, $parameters) {
                $twig->display($view, $parameters);
            };
        } else {
            throw new \LogicException('You can not use the "stream" method if the Templating Component or the Twig Bundle are not available.');
        }

        if (null === $response) {
            return new StreamedResponse($callback);
        }

        $response->setCallback($callback);

        return $response;
    }

    /**
     * Returns a NotFoundHttpException.
     *
     * This will result in a 404 response code. Usage example:
     *
     *     throw $this->createNotFoundException('Page not found!');
     *
     * @param string          $message  A message
     * @param \Exception|null $previous The previous exception
     *
     * @return NotFoundHttpException
     */
    public function createNotFoundException($message = 'Not Found', \Exception $previous = null)
    {
        return new NotFoundHttpException($message, $previous);
    }

    /**
     * Returns an AccessDeniedException.
     *
     * This will result in a 403 response code. Usage example:
     *
     *     throw $this->createAccessDeniedException('Unable to access this page!');
     *
     * @param string          $message  A message
     * @param \Exception|null $previous The previous exception
     *
     * @return AccessDeniedException
     */
    public function createAccessDeniedException($message = 'Access Denied.', \Exception $previous = null)
    {
        return new AccessDeniedException($message, $previous);
    }

    /**
     * Creates and returns a Form instance from the type of the form.
     *
     * @param string|FormTypeInterface $type    The built type of the form
     * @param mixed                    $data    The initial data for the form
     * @param array                    $options Options for the form
     *
     * @return Form
     */
    public function createForm($type, $data = null, array $options = array())
    {
        return $this->container->get('form.factory')->create($type, $data, $options);
    }

    /**
     * Creates and returns a form builder instance.
     *
     * @param mixed $data    The initial data for the form
     * @param array $options Options for the form
     *
     * @return FormBuilder
     */
    public function createFormBuilder($data = null, array $options = array())
    {
        if (method_exists('Symfony\Component\Form\AbstractType', 'getBlockPrefix')) {
            $type = 'Symfony\Component\Form\Extension\Core\Type\FormType';
        } else {
            // not using the class name is deprecated since Symfony 2.8 and
            // is only used for backwards compatibility with older versions
            // of the Form component
            $type = 'form';
        }

        return $this->container->get('form.factory')->createBuilder($type, $data, $options);
    }

    /**
     * Shortcut to return the request service.
     *
     * @return Request
     *
     * @deprecated since version 2.4, to be removed in 3.0.
     *             Ask Symfony to inject the Request object into your controller
     *             method instead by type hinting it in the method's signature.
     */
    public function getRequest()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 2.4 and will be removed in 3.0. The only reliable way to get the "Request" object is to inject it in the action method.', E_USER_DEPRECATED);

        return $this->container->get('request_stack')->getCurrentRequest();
    }

    /**
     * Shortcut to return the Doctrine Registry service.
     *
     * @return Registry
     *
     * @throws \LogicException If DoctrineBundle is not available
     */
    public function getDoctrine()
    {
        if (!$this->container->has('doctrine')) {
            throw new \LogicException('The DoctrineBundle is not registered in your application.');
        }

        return $this->container->get('doctrine');
    }

    /**
     * Get a user from the Security Token Storage.
     *
     * @return mixed
     *
     * @throws \LogicException If SecurityBundle is not available
     *
     * @see TokenInterface::getUser()
     */
    public function getUser()
    {
        if (!$this->container->has('security.token_storage')) {
            throw new \LogicException('The SecurityBundle is not registered in your application.');
        }

        if (null === $token = $this->container->get('security.token_storage')->getToken()) {
            return;
        }

        if (!is_object($user = $token->getUser())) {
            // e.g. anonymous authentication
            return;
        }

        return $user;
    }

    /**
     * Returns true if the service id is defined.
     *
     * @param string $id The service id
     *
     * @return bool true if the service id is defined, false otherwise
     */
    public function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * Gets a container service by its id.
     *
     * @param string $id The service id
     *
     * @return object The service
     */
    public function get($id)
    {
        if ('request' === $id) {
            @trigger_error('The "request" service is deprecated and will be removed in 3.0. Add a typehint for Symfony\\Component\\HttpFoundation\\Request to your controller parameters to retrieve the request instead.', E_USER_DEPRECATED);
        }

        return $this->container->get($id);
    }

    /**
     * Gets a container configuration parameter by its name.
     *
     * @param string $name The parameter name
     *
     * @return mixed
     */
    protected function getParameter($name)
    {
        return $this->container->getParameter($name);
    }

    /**
     * Checks the validity of a CSRF token.
     *
     * @param string $id    The id used when generating the token
     * @param string $token The actual token sent with the request that should be validated
     *
     * @return bool
     */
    protected function isCsrfTokenValid($id, $token)
    {
        if (!$this->container->has('security.csrf.token_manager')) {
            throw new \LogicException('CSRF protection is not enabled in your application.');
        }

        return $this->container->get('security.csrf.token_manager')->isTokenValid(new CsrfToken($id, $token));
    }
}



/*namespace Symfony\Component\HttpKernel;

use Symfony\Bridge\ProxyManager\LazyProxy\Instantiator\RuntimeInstantiator;
use Symfony\Bridge\ProxyManager\LazyProxy\PhpDumper\ProxyDumper;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\DependencyInjection\Loader\IniFileLoader;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Loader\DirectoryLoader;
use Symfony\Component\DependencyInjection\Loader\ClosureLoader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Config\EnvParametersResource;
use Symfony\Component\HttpKernel\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\MergeExtensionConfigurationPass;
use Symfony\Component\HttpKernel\DependencyInjection\AddClassesToCachePass;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\ConfigCache;
use Symfony\Component\ClassLoader\ClassCollectionLoader;


abstract class Kernel implements KernelInterface, TerminableInterface
{
    /**
     * @var BundleInterface[]
     */
/*protected $bundles = array();

protected $bundleMap;
protected $container;
protected $rootDir;
protected $environment;
protected $debug;
protected $booted = false;
protected $name;
protected $startTime;
protected $loadClassCache;

const VERSION = '2.8.11';
const VERSION_ID = 20811;
const MAJOR_VERSION = 2;
const MINOR_VERSION = 8;
const RELEASE_VERSION = 11;
const EXTRA_VERSION = '';

const END_OF_MAINTENANCE = '11/2018';
const END_OF_LIFE = '11/2019';

/**
 * Constructor.
 *
 * @param string $environment The environment
 * @param bool   $debug       Whether to enable debugging or not
 *
public function __construct($environment, $debug)
{
    $this->environment = $environment;
    $this->debug = (bool) $debug;
    $this->rootDir = $this->getRootDir();
    $this->name = $this->getName();

    if ($this->debug) {
        $this->startTime = microtime(true);
    }

    $defClass = new \ReflectionMethod($this, 'init');
    $defClass = $defClass->getDeclaringClass()->name;

    if (__CLASS__ !== $defClass) {
        @trigger_error(sprintf('Calling the %s::init() method is deprecated since version 2.3 and will be removed in 3.0. Move your logic to the constructor method instead.', $defClass), E_USER_DEPRECATED);
        $this->init();
    }
}

/**
 * @deprecated since version 2.3, to be removed in 3.0. Move your logic in the constructor instead.
 */
/*public function init()
{
    @trigger_error('The '.__METHOD__.' method is deprecated since version 2.3 and will be removed in 3.0. Move your logic to the constructor method instead.', E_USER_DEPRECATED);
}

public function __clone()
{
    if ($this->debug) {
        $this->startTime = microtime(true);
    }

    $this->booted = false;
    $this->container = null;
}

/**
 * Boots the current kernel.
 *
public function boot()
{
    if (true === $this->booted) {
        return;
    }

    if ($this->loadClassCache) {
        $this->doLoadClassCache($this->loadClassCache[0], $this->loadClassCache[1]);
    }

    // init bundles
    $this->initializeBundles();

    // init container
    $this->initializeContainer();

    foreach ($this->getBundles() as $bundle) {
        $bundle->setContainer($this->container);
        $bundle->boot();
    }

    $this->booted = true;
}

/**
 * {@inheritdoc}
 *
public function terminate(Request $request, Response $response)
{
    if (false === $this->booted) {
        return;
    }

    if ($this->getHttpKernel() instanceof TerminableInterface) {
        $this->getHttpKernel()->terminate($request, $response);
    }
}

/**
 * {@inheritdoc}
 *
public function shutdown()
{
    if (false === $this->booted) {
        return;
    }

    $this->booted = false;

    foreach ($this->getBundles() as $bundle) {
        $bundle->shutdown();
        $bundle->setContainer(null);
    }

    $this->container = null;
}

/**
 * {@inheritdoc}
 *
public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
{
    if (false === $this->booted) {
        $this->boot();
    }

    return $this->getHttpKernel()->handle($request, $type, $catch);
}

/**
 * Gets a HTTP kernel from the container.
 *
 * @return HttpKernel
 *
protected function getHttpKernel()
{
    return $this->container->get('http_kernel');
}

/**
 * {@inheritdoc}
 *
public function getBundles()
{
    return $this->bundles;
}

/**
 * {@inheritdoc}
 *
 * @deprecated since version 2.6, to be removed in 3.0.
 *
public function isClassInActiveBundle($class)
{
    @trigger_error('The '.__METHOD__.' method is deprecated since version 2.6 and will be removed in version 3.0.', E_USER_DEPRECATED);

    foreach ($this->getBundles() as $bundle) {
        if (0 === strpos($class, $bundle->getNamespace())) {
            return true;
        }
    }

    return false;
}

/**
 * {@inheritdoc}
 *
public function getBundle($name, $first = true)
{
    if (!isset($this->bundleMap[$name])) {
        throw new \InvalidArgumentException(sprintf('Bundle "%s" does not exist or it is not enabled. Maybe you forgot to add it in the registerBundles() method of your %s.php file?', $name, get_class($this)));
    }

    if (true === $first) {
        return $this->bundleMap[$name][0];
    }

    return $this->bundleMap[$name];
}

/**
 * {@inheritdoc}
 *
 * @throws \RuntimeException if a custom resource is hidden by a resource in a derived bundle
 *
public function locateResource($name, $dir = null, $first = true)
{
    if ('@' !== $name[0]) {
        throw new \InvalidArgumentException(sprintf('A resource name must start with @ ("%s" given).', $name));
    }

    if (false !== strpos($name, '..')) {
        throw new \RuntimeException(sprintf('File name "%s" contains invalid characters (..).', $name));
    }

    $bundleName = substr($name, 1);
    $path = '';
    if (false !== strpos($bundleName, '/')) {
        list($bundleName, $path) = explode('/', $bundleName, 2);
    }

    $isResource = 0 === strpos($path, 'Resources') && null !== $dir;
    $overridePath = substr($path, 9);
    $resourceBundle = null;
    $bundles = $this->getBundle($bundleName, false);
    $files = array();

    foreach ($bundles as $bundle) {
        if ($isResource && file_exists($file = $dir.'/'.$bundle->getName().$overridePath)) {
            if (null !== $resourceBundle) {
                throw new \RuntimeException(sprintf('"%s" resource is hidden by a resource from the "%s" derived bundle. Create a "%s" file to override the bundle resource.',
                    $file,
                    $resourceBundle,
                    $dir.'/'.$bundles[0]->getName().$overridePath
                ));
            }

            if ($first) {
                return $file;
            }
            $files[] = $file;
        }

        if (file_exists($file = $bundle->getPath().'/'.$path)) {
            if ($first && !$isResource) {
                return $file;
            }
            $files[] = $file;
            $resourceBundle = $bundle->getName();
        }
    }

    if (count($files) > 0) {
        return $first && $isResource ? $files[0] : $files;
    }

    throw new \InvalidArgumentException(sprintf('Unable to find file "%s".', $name));
}

/**
 * {@inheritdoc}
 *
public function getName()
{
    if (null === $this->name) {
        $this->name = preg_replace('/[^a-zA-Z0-9_]+/', '', basename($this->rootDir));
    }

    return $this->name;
}

/**
 * {@inheritdoc}
 *
public function getEnvironment()
{
    return $this->environment;
}

/**
 * {@inheritdoc}
 *
public function isDebug()
{
    return $this->debug;
}

/**
 * {@inheritdoc}
 *
public function getRootDir()
{
    if (null === $this->rootDir) {
        $r = new \ReflectionObject($this);
        $this->rootDir = dirname($r->getFileName());
    }

    return $this->rootDir;
}

/**
 * {@inheritdoc}
 *
public function getContainer()
{
    return $this->container;
}

/**
 * Loads the PHP class cache.
 *
 * This methods only registers the fact that you want to load the cache classes.
 * The cache will actually only be loaded when the Kernel is booted.
 *
 * That optimization is mainly useful when using the HttpCache class in which
 * case the class cache is not loaded if the Response is in the cache.
 *
 * @param string $name      The cache name prefix
 * @param string $extension File extension of the resulting file
 *
public function loadClassCache($name = 'classes', $extension = '.php')
{
    $this->loadClassCache = array($name, $extension);
}

/**
 * Used internally.
 *
public function setClassCache(array $classes)
{
    file_put_contents($this->getCacheDir().'/classes.map', sprintf('<?php return %s;', var_export($classes, true)));
}

/**
 * {@inheritdoc}
 *
public function getStartTime()
{
    return $this->debug ? $this->startTime : -INF;
}

/**
 * {@inheritdoc}
 *
public function getCacheDir()
{
    return $this->rootDir.'/cache/'.$this->environment;
}

/**
 * {@inheritdoc}
 *
public function getLogDir()
{
    return $this->rootDir.'/logs';
}

/**
 * {@inheritdoc}
 *
public function getCharset()
{
    return 'UTF-8';
}

protected function doLoadClassCache($name, $extension)
{
    if (!$this->booted && is_file($this->getCacheDir().'/classes.map')) {
        ClassCollectionLoader::load(include($this->getCacheDir().'/classes.map'), $this->getCacheDir(), $name, $this->debug, false, $extension);
    }
}

/**
 * Initializes the data structures related to the bundle management.
 *
 *  - the bundles property maps a bundle name to the bundle instance,
 *  - the bundleMap property maps a bundle name to the bundle inheritance hierarchy (most derived bundle first).
 *
 * @throws \LogicException if two bundles share a common name
 * @throws \LogicException if a bundle tries to extend a non-registered bundle
 * @throws \LogicException if a bundle tries to extend itself
 * @throws \LogicException if two bundles extend the same ancestor
 *
protected function initializeBundles()
{
    // init bundles
    $this->bundles = array();
    $topMostBundles = array();
    $directChildren = array();

    foreach ($this->registerBundles() as $bundle) {
        $name = $bundle->getName();
        if (isset($this->bundles[$name])) {
            throw new \LogicException(sprintf('Trying to register two bundles with the same name "%s"', $name));
        }
        $this->bundles[$name] = $bundle;

        if ($parentName = $bundle->getParent()) {
            if (isset($directChildren[$parentName])) {
                throw new \LogicException(sprintf('Bundle "%s" is directly extended by two bundles "%s" and "%s".', $parentName, $name, $directChildren[$parentName]));
            }
            if ($parentName == $name) {
                throw new \LogicException(sprintf('Bundle "%s" can not extend itself.', $name));
            }
            $directChildren[$parentName] = $name;
        } else {
            $topMostBundles[$name] = $bundle;
        }
    }

    // look for orphans
    if (!empty($directChildren) && count($diff = array_diff_key($directChildren, $this->bundles))) {
        $diff = array_keys($diff);

        throw new \LogicException(sprintf('Bundle "%s" extends bundle "%s", which is not registered.', $directChildren[$diff[0]], $diff[0]));
    }

    // inheritance
    $this->bundleMap = array();
    foreach ($topMostBundles as $name => $bundle) {
        $bundleMap = array($bundle);
        $hierarchy = array($name);

        while (isset($directChildren[$name])) {
            $name = $directChildren[$name];
            array_unshift($bundleMap, $this->bundles[$name]);
            $hierarchy[] = $name;
        }

        foreach ($hierarchy as $hierarchyBundle) {
            $this->bundleMap[$hierarchyBundle] = $bundleMap;
            array_pop($bundleMap);
        }
    }
}

/**
 * Gets the container class.
 *
 * @return string The container class
 *
protected function getContainerClass()
{
    return $this->name.ucfirst($this->environment).($this->debug ? 'Debug' : '').'ProjectContainer';
}

/**
 * Gets the container's base class.
 *
 * All names except Container must be fully qualified.
 *
 * @return string
 *
protected function getContainerBaseClass()
{
    return 'Container';
}

/**
 * Initializes the service container.
 *
 * The cached version of the service container is used when fresh, otherwise the
 * container is built.
 *
protected function initializeContainer()
{
    $class = $this->getContainerClass();
    $cache = new ConfigCache($this->getCacheDir().'/'.$class.'.php', $this->debug);
    $fresh = true;
    if (!$cache->isFresh()) {
        $container = $this->buildContainer();
        $container->compile();
        $this->dumpContainer($cache, $container, $class, $this->getContainerBaseClass());

        $fresh = false;
    }

    require_once $cache->getPath();

    $this->container = new $class();
    $this->container->set('kernel', $this);

    if (!$fresh && $this->container->has('cache_warmer')) {
        $this->container->get('cache_warmer')->warmUp($this->container->getParameter('kernel.cache_dir'));
    }
}

/**
 * Returns the kernel parameters.
 *
 * @return array An array of kernel parameters
 *
protected function getKernelParameters()
{
    $bundles = array();
    foreach ($this->bundles as $name => $bundle) {
        $bundles[$name] = get_class($bundle);
    }

    return array_merge(
        array(
            'kernel.root_dir' => realpath($this->rootDir) ?: $this->rootDir,
            'kernel.environment' => $this->environment,
            'kernel.debug' => $this->debug,
            'kernel.name' => $this->name,
            'kernel.cache_dir' => realpath($this->getCacheDir()) ?: $this->getCacheDir(),
            'kernel.logs_dir' => realpath($this->getLogDir()) ?: $this->getLogDir(),
            'kernel.bundles' => $bundles,
            'kernel.charset' => $this->getCharset(),
            'kernel.container_class' => $this->getContainerClass(),
        ),
        $this->getEnvParameters()
    );
}

/**
 * Gets the environment parameters.
 *
 * Only the parameters starting with "SYMFONY__" are considered.
 *
 * @return array An array of parameters
 *
protected function getEnvParameters()
{
    $parameters = array();
    foreach ($_SERVER as $key => $value) {
        if (0 === strpos($key, 'SYMFONY__')) {
            $parameters[strtolower(str_replace('__', '.', substr($key, 9)))] = $value;
        }
    }

    return $parameters;
}

/**
 * Builds the service container.
 *
 * @return ContainerBuilder The compiled service container
 *
 * @throws \RuntimeException
 *
protected function buildContainer()
{
    foreach (array('cache' => $this->getCacheDir(), 'logs' => $this->getLogDir()) as $name => $dir) {
        if (!is_dir($dir)) {
            if (false === @mkdir($dir, 0777, true) && !is_dir($dir)) {
                throw new \RuntimeException(sprintf("Unable to create the %s directory (%s)\n", $name, $dir));
            }
        } elseif (!is_writable($dir)) {
            throw new \RuntimeException(sprintf("Unable to write in the %s directory (%s)\n", $name, $dir));
        }
    }

    $container = $this->getContainerBuilder();
    $container->addObjectResource($this);
    $this->prepareContainer($container);

    if (null !== $cont = $this->registerContainerConfiguration($this->getContainerLoader($container))) {
        $container->merge($cont);
    }

    $container->addCompilerPass(new AddClassesToCachePass($this));
    $container->addResource(new EnvParametersResource('SYMFONY__'));

    return $container;
}

/**
 * Prepares the ContainerBuilder before it is compiled.
 *
 * @param ContainerBuilder $container A ContainerBuilder instance
 *
protected function prepareContainer(ContainerBuilder $container)
{
    $extensions = array();
    foreach ($this->bundles as $bundle) {
        if ($extension = $bundle->getContainerExtension()) {
            $container->registerExtension($extension);
            $extensions[] = $extension->getAlias();
        }

        if ($this->debug) {
            $container->addObjectResource($bundle);
        }
    }
    foreach ($this->bundles as $bundle) {
        $bundle->build($container);
    }

    // ensure these extensions are implicitly loaded
    $container->getCompilerPassConfig()->setMergePass(new MergeExtensionConfigurationPass($extensions));
}

/**
 * Gets a new ContainerBuilder instance used to build the service container.
 *
 * @return ContainerBuilder
 *
protected function getContainerBuilder()
{
    $container = new ContainerBuilder(new ParameterBag($this->getKernelParameters()));

    if (class_exists('ProxyManager\Configuration') && class_exists('Symfony\Bridge\ProxyManager\LazyProxy\Instantiator\RuntimeInstantiator')) {
        $container->setProxyInstantiator(new RuntimeInstantiator());
    }

    return $container;
}

/**
 * Dumps the service container to PHP code in the cache.
 *
 * @param ConfigCache      $cache     The config cache
 * @param ContainerBuilder $container The service container
 * @param string           $class     The name of the class to generate
 * @param string           $baseClass The name of the container's base class
 *
protected function dumpContainer(ConfigCache $cache, ContainerBuilder $container, $class, $baseClass)
{
    // cache the container
    $dumper = new PhpDumper($container);

    if (class_exists('ProxyManager\Configuration') && class_exists('Symfony\Bridge\ProxyManager\LazyProxy\PhpDumper\ProxyDumper')) {
        $dumper->setProxyDumper(new ProxyDumper(md5($cache->getPath())));
    }

    $content = $dumper->dump(array('class' => $class, 'base_class' => $baseClass, 'file' => $cache->getPath(), 'debug' => $this->debug));

    $cache->write($content, $container->getResources());
}

/**
 * Returns a loader for the container.
 *
 * @param ContainerInterface $container The service container
 *
 * @return DelegatingLoader The loader
 *
protected function getContainerLoader(ContainerInterface $container)
{
    $locator = new FileLocator($this);
    $resolver = new LoaderResolver(array(
        new XmlFileLoader($container, $locator),
        new YamlFileLoader($container, $locator),
        new IniFileLoader($container, $locator),
        new PhpFileLoader($container, $locator),
        new DirectoryLoader($container, $locator),
        new ClosureLoader($container),
    ));

    return new DelegatingLoader($resolver);
}

/**
 * Removes comments from a PHP source string.
 *
 * We don't use the PHP php_strip_whitespace() function
 * as we want the content to be readable and well-formatted.
 *
 * @param string $source A PHP string
 *
 * @return string The PHP string with the comments removed
 *
public static function stripComments($source)
{
    if (!function_exists('token_get_all')) {
        return $source;
    }

    $rawChunk = '';
    $output = '';
    $tokens = token_get_all($source);
    $ignoreSpace = false;
    for ($i = 0; isset($tokens[$i]); ++$i) {
        $token = $tokens[$i];
        if (!isset($token[1]) || 'b"' === $token) {
            $rawChunk .= $token;
        } elseif (T_START_HEREDOC === $token[0]) {
            $output .= $rawChunk.$token[1];
            do {
                $token = $tokens[++$i];
                $output .= isset($token[1]) && 'b"' !== $token ? $token[1] : $token;
            } while ($token[0] !== T_END_HEREDOC);
            $rawChunk = '';
        } elseif (T_WHITESPACE === $token[0]) {
            if ($ignoreSpace) {
                $ignoreSpace = false;

                continue;
            }

            // replace multiple new lines with a single newline
            $rawChunk .= preg_replace(array('/\n{2,}/S'), "\n", $token[1]);
        } elseif (in_array($token[0], array(T_COMMENT, T_DOC_COMMENT))) {
            $ignoreSpace = true;
        } else {
            $rawChunk .= $token[1];

            // The PHP-open tag already has a new-line
            if (T_OPEN_TAG === $token[0]) {
                $ignoreSpace = true;
            }
        }
    }

    $output .= $rawChunk;

    if (PHP_VERSION_ID >= 70000) {
        // PHP 7 memory manager will not release after token_get_all(), see https://bugs.php.net/70098
        unset($tokens, $rawChunk);
        gc_mem_caches();
    }

    return $output;
}

public function serialize()
{
    return serialize(array($this->environment, $this->debug));
}

public function unserialize($data)
{
    list($environment, $debug) = unserialize($data);

    $this->__construct($environment, $debug);
}
}*/
