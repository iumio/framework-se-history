<?php

class __MyTemplates_4e26a7a1f8f36517f62df8639d8a9c60 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!DOCTYPE html>
';
        $buffer .= $indent . '<html>
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '<meta charset=\'utf8\' >
';
        $buffer .= $indent . '<title>Test</title>
';
        $buffer .= $indent . '<style type="text/css">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '/* Reset
';
        $buffer .= $indent . '-------------------------------------------------------------- */
';
        $buffer .= $indent . 'html,body,div,span,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,code,del,dfn,em,img,q,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td{border:0;font-weight:inherit;font-style:inherit;font-size:100%;font-family:inherit;vertical-align:baseline;margin:0;padding:0;}
';
        $buffer .= $indent . 'table{border-collapse:separate;border-spacing:0;margin-bottom:1.4em;}
';
        $buffer .= $indent . 'caption,th,td{text-align:left;font-weight:400;}
';
        $buffer .= $indent . 'blockquote:before,blockquote:after,q:before,q:after{content:"";}
';
        $buffer .= $indent . 'blockquote,q{quotes:;}
';
        $buffer .= $indent . 'a img{border:none;}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '/* Layout
';
        $buffer .= $indent . '-------------------------------------------------------------- */
';
        $buffer .= $indent . 'img,video{width: auto; max-width: 100%; height: auto; margin: 0 auto 1em;}
';
        $buffer .= $indent . '.container{width:88%;margin-left:auto;margin-right:auto;max-width:1400px;*zoom:1;}
';
        $buffer .= $indent . '.grid-container:after{content:"";display:table;clear:both;}
';
        $buffer .= $indent . '.grid-unit {position: relative;margin-left: 0;width: 100%;float: left;display: inline; margin-bottom: 2em;}
';
        $buffer .= $indent . '.grid:after {content: "";display: table;clear: both;}
';
        $buffer .= $indent . '*, *:after, *:before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'body{
';
        $buffer .= $indent . '	font-size: 100%;
';
        $buffer .= $indent . '	line-height: 1.5;
';
        $buffer .= $indent . '	background-color: #f6f2eb;
';
        $buffer .= $indent . '	color: #524d46;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'h1{
';
        $buffer .= $indent . '	font-size: 2.000em;
';
        $buffer .= $indent . '	text-transform: uppercase;
';
        $buffer .= $indent . '	text-align: center;
';
        $buffer .= $indent . '	letter-spacing: 0.125em;
';
        $buffer .= $indent . '	margin: 0.469em 0 0.469em;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'p{
';
        $buffer .= $indent . '	margin-bottom: 1.250em;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '.site-header, .site-footer{
';
        $buffer .= $indent . '	float: left;
';
        $buffer .= $indent . '	width: 100%;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '.banner-image{
';
        $buffer .= $indent . '	margin-bottom: 1.563em;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '.site-footer .container{
';
        $buffer .= $indent . '	border-top: 0.063em solid rgba(0, 0, 0, 0.1);
';
        $buffer .= $indent . '	border-bottom: 0.063em solid rgba(0, 0, 0, 0.1);
';
        $buffer .= $indent . '	padding: 2.500em 0 1.250em;
';
        $buffer .= $indent . '	text-align: center;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '/* Links & Navigation
';
        $buffer .= $indent . '-------------------------------------------------------------- */
';
        $buffer .= $indent . 'a {
';
        $buffer .= $indent . '	color: #fe694c;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . 'a:hover{
';
        $buffer .= $indent . '	color: #d62a09;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '.site-navigation ul{
';
        $buffer .= $indent . '	text-align: center;
';
        $buffer .= $indent . '	margin-bottom: 0.625em;
';
        $buffer .= $indent . '	float: left;
';
        $buffer .= $indent . '	width: 100%;
';
        $buffer .= $indent . '	list-style-type: none;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '.site-navigation a{
';
        $buffer .= $indent . '	text-decoration: none;
';
        $buffer .= $indent . '	display: inline-block;
';
        $buffer .= $indent . '	text-transform: uppercase;
';
        $buffer .= $indent . '	color: #524d46;
';
        $buffer .= $indent . '	background-color: rgba(0, 0, 0, 0.1);
';
        $buffer .= $indent . '	width: 33.333333%;
';
        $buffer .= $indent . '	float: left;
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '.site-navigation a:hover{
';
        $buffer .= $indent . '	background-color: rgba(0, 0, 0, 0.2);
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '@media screen and (min-width: 700px) {
';
        $buffer .= $indent . '	body{
';
        $buffer .= $indent . '		font-size: 112.5%;
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	.col-3 .grid-unit {
';
        $buffer .= $indent . '		width: 30%;
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	.grid-unit{
';
        $buffer .= $indent . '		margin-right: 5%;
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '	.col-3 .grid-unit:last-child{
';
        $buffer .= $indent . '		margin-right: 0;
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '@media screen and (min-width: 900px) {
';
        $buffer .= $indent . '	body{
';
        $buffer .= $indent . '		font-size: 137.5%;
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '@media screen and (min-width: 1100px) {
';
        $buffer .= $indent . '	body{
';
        $buffer .= $indent . '		font-size: 150%;
';
        $buffer .= $indent . '	}
';
        $buffer .= $indent . '}
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</style>
';
        $buffer .= $indent . '</hea>
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '<header class="site-header">
';
        $buffer .= $indent . '    <div class="container">
';
        $buffer .= $indent . '    <h1> Bienvenue ';
        $value = $this->resolveValue($context->find('fn'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= ' ';
        $value = $this->resolveValue($context->find('ln'), $context);
        $buffer .= call_user_func($this->mustache->getEscape(), $value);
        $buffer .= '</h1>
';
        $buffer .= $indent . '    <nav role="navigation" class="site-navigation">
';
        $buffer .= $indent . '      <ul>
';
        $buffer .= $indent . '        <li><a href="#">Link</a></li>
';
        $buffer .= $indent . '        <li><a href="#">Link</a></li>
';
        $buffer .= $indent . '        <li><a href="#">Link</a></li>
';
        $buffer .= $indent . '      </ul>
';
        $buffer .= $indent . '    </nav>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </header>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '  <section role="main" class="container">
';
        $buffer .= $indent . '    <img src="http://placehold.it/1400x400/ff694d/f6f2eb" class="banner-image"/>
';
        $buffer .= $indent . '    <div class="grid-row col-3">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '      <div class="grid-unit">
';
        $buffer .= $indent . '        <img src="http://placehold.it/650x300/ff694d/f6f2eb"/>
';
        $buffer .= $indent . '        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor. </p>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '      <div class="grid-unit">
';
        $buffer .= $indent . '        <img src="http://placehold.it/650x300/ff694d/f6f2eb"/>
';
        $buffer .= $indent . '        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor. </p>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '      <div class="grid-unit">
';
        $buffer .= $indent . '        <img src="http://placehold.it/650x300/ff694d/f6f2eb"/>
';
        $buffer .= $indent . '        <p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec id elit non mi porta gravida at eget metus. Curabitur blandit tempus porttitor. </p>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </section>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '  <footer class="site-footer" role="contentinfo">
';
        $buffer .= $indent . '    <div class="container">
';
        $buffer .= $indent . '      <p>This basic site is meant to accompany <a href="http://trentwalton.com/2013/01/07/flexible-foundations/">this blog post</a>.</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </footer>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}
