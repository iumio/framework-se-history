<?php

class __iumioTemp_bb9909d56da5986cf91c77ae6ac76a02 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';
        $blocksContext = array();

        if ($partial = $this->mustache->loadPartial('head')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Header -->
';
        $buffer .= $indent . '<header id="header">
';
        $buffer .= $indent . '    <div class="inner">
';
        $buffer .= $indent . '        <a href="index.html" class="logo">Theory</a>
';
        $buffer .= $indent . '        <nav id="nav">
';
        $buffer .= $indent . '            <a href="#">Home</a>
';
        $buffer .= $indent . '            <a href="#">Generic</a>
';
        $buffer .= $indent . '            <a href="#">Elements</a>
';
        $buffer .= $indent . '        </nav>
';
        $buffer .= $indent . '        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</header>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Banner -->
';
        $buffer .= $indent . '<section id="banner">
';
        $buffer .= $indent . '    <h1>Welcome to iumio Starter</h1>
';
        $buffer .= $indent . '    <p>This is your app template</p>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- One -->
';
        $buffer .= $indent . '<section id="one" class="wrapper">
';
        $buffer .= $indent . '    <div class="inner">
';
        $buffer .= $indent . '        <div class="flex flex-3">
';
        $buffer .= $indent . '            <article>
';
        $buffer .= $indent . '                <header>
';
        $buffer .= $indent . '                    <h3>Magna tempus sed amet<br /> aliquam veroeros</h3>
';
        $buffer .= $indent . '                </header>
';
        $buffer .= $indent . '                <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
';
        $buffer .= $indent . '                <footer>
';
        $buffer .= $indent . '                    <a href="#" class="button special">More</a>
';
        $buffer .= $indent . '                </footer>
';
        $buffer .= $indent . '            </article>
';
        $buffer .= $indent . '            <article>
';
        $buffer .= $indent . '                <header>
';
        $buffer .= $indent . '                    <h3>Interdum lorem pulvinar<br /> adipiscing vitae</h3>
';
        $buffer .= $indent . '                </header>
';
        $buffer .= $indent . '                <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
';
        $buffer .= $indent . '                <footer>
';
        $buffer .= $indent . '                    <a href="#" class="button special">More</a>
';
        $buffer .= $indent . '                </footer>
';
        $buffer .= $indent . '            </article>
';
        $buffer .= $indent . '            <article>
';
        $buffer .= $indent . '                <header>
';
        $buffer .= $indent . '                    <h3>Libero purus magna sapien<br /> sed ullamcorper</h3>
';
        $buffer .= $indent . '                </header>
';
        $buffer .= $indent . '                <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
';
        $buffer .= $indent . '                <footer>
';
        $buffer .= $indent . '                    <a href="#" class="button special">More</a>
';
        $buffer .= $indent . '                </footer>
';
        $buffer .= $indent . '            </article>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Two -->
';
        $buffer .= $indent . '<section id="two" class="wrapper style1 special">
';
        $buffer .= $indent . '    <div class="inner">
';
        $buffer .= $indent . '        <header>
';
        $buffer .= $indent . '            <h2>Ipsum Feugiat</h2>
';
        $buffer .= $indent . '            <p>Semper suscipit posuere apede</p>
';
        $buffer .= $indent . '        </header>
';
        $buffer .= $indent . '        <div class="flex flex-4">
';
        $buffer .= $indent . '            <div class="box person">
';
        $buffer .= $indent . '                <div class="image round">
';
        $buffer .= $indent . '                    <img src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->sectionAbc93ac7accda188ef2b9c9bd87bfef9($context, $indent, $value);
        $buffer .= '" alt="Person 1" />
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <h3>Magna</h3>
';
        $buffer .= $indent . '                <p>Cipdum dolor</p>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="box person">
';
        $buffer .= $indent . '                <div class="image round">
';
        $buffer .= $indent . '                    <img src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->sectionFbb9522979e266617b6c5a3694ebf24b($context, $indent, $value);
        $buffer .= '" alt="Person 2" />
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <h3>Ipsum</h3>
';
        $buffer .= $indent . '                <p>Vestibulum comm</p>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="box person">
';
        $buffer .= $indent . '                <div class="image round">
';
        $buffer .= $indent . '                    <img src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section2492d50add61840fb9d3a6ac7e408539($context, $indent, $value);
        $buffer .= '" alt="Person 3" />
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <h3>Tempus</h3>
';
        $buffer .= $indent . '                <p>Fusce pellentes</p>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="box person">
';
        $buffer .= $indent . '                <div class="image round">
';
        $buffer .= $indent . '                    <img src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section0f7bf4eebfe55820ecb66661de28e9e9($context, $indent, $value);
        $buffer .= '" alt="Person 4" />
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <h3>Dolore</h3>
';
        $buffer .= $indent . '                <p>Praesent placer</p>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Three -->
';
        $buffer .= $indent . '<section id="three" class="wrapper special">
';
        $buffer .= $indent . '    <div class="inner">
';
        $buffer .= $indent . '        <header class="align-center">
';
        $buffer .= $indent . '            <h2>Nunc Dignissim</h2>
';
        $buffer .= $indent . '            <p>Aliquam erat volutpat nam dui </p>
';
        $buffer .= $indent . '        </header>
';
        $buffer .= $indent . '        <div class="flex flex-2">
';
        $buffer .= $indent . '            <article>
';
        $buffer .= $indent . '                <div class="image fit">
';
        $buffer .= $indent . '                    <img src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->section37578a2ab3ff87449a734fa9b0dac28f($context, $indent, $value);
        $buffer .= '" alt="Pic 01" />
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <header>
';
        $buffer .= $indent . '                    <h3>Praesent placerat magna</h3>
';
        $buffer .= $indent . '                </header>
';
        $buffer .= $indent . '                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor lorem ipsum.</p>
';
        $buffer .= $indent . '                <footer>
';
        $buffer .= $indent . '                    <a href="#" class="button special">More</a>
';
        $buffer .= $indent . '                </footer>
';
        $buffer .= $indent . '            </article>
';
        $buffer .= $indent . '            <article>
';
        $buffer .= $indent . '                <div class="image fit">
';
        $buffer .= $indent . '                    <img src="';
        // 'webassets' section
        $value = $context->find('webassets');
        $buffer .= $this->sectionB274d1884ea2fd1b9281bcb734210a40($context, $indent, $value);
        $buffer .= '" alt="Pic 02" />
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <header>
';
        $buffer .= $indent . '                    <h3>Fusce pellentesque tempus</h3>
';
        $buffer .= $indent . '                </header>
';
        $buffer .= $indent . '                <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna non comodo sodales tempus.</p>
';
        $buffer .= $indent . '                <footer>
';
        $buffer .= $indent . '                    <a href="#" class="button special">More</a>
';
        $buffer .= $indent . '                </footer>
';
        $buffer .= $indent . '            </article>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</section>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }

    private function sectionAbc93ac7accda188ef2b9c9bd87bfef9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/images/pic03.jpg';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'public/images/pic03.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionFbb9522979e266617b6c5a3694ebf24b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/images/pic04.jpg';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'public/images/pic04.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2492d50add61840fb9d3a6ac7e408539(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/images/pic05.jpg';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'public/images/pic05.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section0f7bf4eebfe55820ecb66661de28e9e9(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/images/pic06.jpg';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'public/images/pic06.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section37578a2ab3ff87449a734fa9b0dac28f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/images/pic01.jpg';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'public/images/pic01.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionB274d1884ea2fd1b9281bcb734210a40(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
        $blocksContext = array();
    
        if (is_object($value) && is_callable($value)) {
            $source = 'public/images/pic02.jpg';
            $result = call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda((string) $result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= 'public/images/pic02.jpg';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
