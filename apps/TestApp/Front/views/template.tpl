<!DOCTYPE HTML>
<!--
	iumio Starter by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>iumio Starter Theme</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    {*webassets*}
    <link rel="stylesheet" href="{webassets path='public/css/index.css' }" />
    {fawesome_css min="yes"}
</head>

<body>

<!-- Header -->
<header id="header">
    <div class="inner">
        <a href="#" class="logo">iumio Starter</a>
        <nav id="nav">
            <a href="#">Home</a>
            <a href="#">Generic</a>
            <a href="#">Elements</a>
        </nav>
        <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
    </div>
</header>

<!-- Banner -->
<section id="banner" style="background-image: url('{webassets path='public/images/banner.jpg'}');">
    <h1>Welcome to iumio Starter </h1>
    {block name="parameters"}
        <p>Your parameter is {$sent} </p>
    {/block}

</section>

<!-- One -->
<section id="one" class="wrapper">
    <div class="inner">
        <div class="flex flex-3">
            <article>
                <header>
                    <h3>Magna tempus sed amet<br /> aliquam veroeros</h3>
                </header>
                <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
                <footer>
                    <a href="#" class="button special">More</a>
                </footer>
            </article>
            <article>
                <header>
                    <h3>Interdum lorem pulvinar<br /> adipiscing vitae</h3>
                </header>
                <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
                <footer>
                    <a href="#" class="button special">More</a>
                </footer>
            </article>
            <article>
                <header>
                    <h3>Libero purus magna sapien<br /> sed ullamcorper</h3>
                </header>
                <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu.</p>
                <footer>
                    <a href="#" class="button special">More</a>
                </footer>
            </article>
        </div>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style1 special">
    <div class="inner">
        <header>
            <h2>Ipsum Feugiat</h2>
            <p>Semper suscipit posuere apede</p>
        </header>
        <div class="flex flex-4">
            <div class="box person">
                <div class="image round">
                    <img src="{webassets path='public/images/pic03.jpg'}" alt="Person 1" />
                </div>
                <h3>Magna</h3>
                <p>Cipdum dolor</p>
            </div>
            <div class="box person">
                <div class="image round">
                    <img src="{webassets path='public/images/pic04.jpg'}" alt="Person 2" />
                </div>
                <h3>Ipsum</h3>
                <p>Vestibulum comm</p>
            </div>
            <div class="box person">
                <div class="image round">
                    <img src="{webassets path='public/images/pic05.jpg'}" alt="Person 3" />
                </div>
                <h3>Tempus</h3>
                <p>Fusce pellentes</p>
            </div>
            <div class="box person">
                <div class="image round">
                    <img src="{webassets path='public/images/pic06.jpg'}" alt="Person 4" />
                </div>
                <h3>Dolore</h3>
                <p>Praesent placer</p>
            </div>
        </div>
    </div>
</section>

<!-- Three -->
<section id="three" class="wrapper special">
    <div class="inner">
        <header class="align-center">
            <h2>Nunc Dignissim</h2>
            <p>Aliquam erat volutpat nam dui </p>
        </header>
        <div class="flex flex-2">
            <article>
                <div class="image fit">
                    <img src="{webassets path='public/images/pic01.jpg'}" alt="Pic 01" />
                </div>
                <header>
                    <h3>Praesent placerat magna</h3>
                </header>
                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor lorem ipsum.</p>
                <footer>
                    <a href="#" class="button special">More</a>
                </footer>
            </article>
            <article>
                <div class="image fit">
                    <img src="{webassets path='public/images/pic02.jpg'}" alt="Pic 02" />
                </div>
                <header>
                    <h3>Fusce pellentesque tempus</h3>
                </header>
                <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna non comodo sodales tempus.</p>
                <footer>
                    <a href="#" class="button special">More</a>
                </footer>
            </article>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="footer">
    <div class="inner">
        <div class="flex">
            <div class="copyright">
                &copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a href="https://unsplash.com">Unsplash</a> Modified by iumio.
            </div>
            <ul class="icons">
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-linkedin"><span class="label">linkedIn</span></a></li>
                <li><a href="#" class="icon fa-pinterest-p"><span class="label">Pinterest</span></a></li>
                <li><a href="#" class="icon fa-vimeo"><span class="label">Vimeo</span></a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Scripts -->
{jquery}
<script src="{webassets path='public/js/skel.min.js'}"></script>
<script src="{webassets path='public/js/util.js'}"></script>
<script src="{webassets path='public/js/main.js'}"></script>



</body>
</html>