<?php

class __iumioTemp_351a6fc87783b122a780c6583b716025 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!--
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<header id="header"><p>Welcome</p></header>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<div id="container">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <main id="center" class="column">
';
        $buffer .= $indent . '        <article>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <h1>This is your app</h1>
';
        $buffer .= $indent . '            <p><script>generateText(50)</script></p>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '        </article>
';
        $buffer .= $indent . '    </main>
';
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('menuleft')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        if ($partial = $this->mustache->loadPartial('menuright')) {
            $buffer .= $partial->renderInternal($context, $indent . '    ');
        }
        $buffer .= $indent . '
';
        $buffer .= $indent . '</div>
';
        if ($partial = $this->mustache->loadPartial('footer')) {
            $buffer .= $partial->renderInternal($context);
        }
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>-->
';
        $buffer .= $indent . '
';
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
        $buffer .= $indent . '                    <img src="images/pic03.jpg" alt="Person 1" />
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
        $buffer .= $indent . '                    <img src="images/pic04.jpg" alt="Person 2" />
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
        $buffer .= $indent . '                    <img src="images/pic05.jpg" alt="Person 3" />
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
        $buffer .= $indent . '                    <img src="images/pic06.jpg" alt="Person 4" />
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
        $buffer .= $indent . '                    <img src="images/pic01.jpg" alt="Pic 01" />
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
        $buffer .= $indent . '                    <img src="images/pic02.jpg" alt="Pic 02" />
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
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<!-- Scripts -->
';
        $buffer .= $indent . '<script src="assets/js/jquery.min.js"></script>
';
        $buffer .= $indent . '<script src="assets/js/skel.min.js"></script>
';
        $buffer .= $indent . '<script src="assets/js/util.js"></script>
';
        $buffer .= $indent . '<script src="assets/js/main.js"></script>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}
