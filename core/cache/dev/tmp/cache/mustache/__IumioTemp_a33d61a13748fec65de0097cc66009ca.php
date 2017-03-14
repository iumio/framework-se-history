<?php

class __IumioTemp_a33d61a13748fec65de0097cc66009ca extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';
        $blocksContext = array();

        $buffer .= $indent . '<!doctype html>
';
        $buffer .= $indent . '<html class="no-js" lang="en">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <head>
';
        $buffer .= $indent . '        <meta charset="utf-8">
';
        $buffer .= $indent . '        <meta http-equiv="x-ua-compatible" content="ie=edge">
';
        $buffer .= $indent . '        <title> ModularAdmin - Free Dashboard Theme | HTML Version </title>
';
        $buffer .= $indent . '        <meta name="description" content="">
';
        $buffer .= $indent . '        <meta name="viewport" content="width=device-width, initial-scale=1">
';
        $buffer .= $indent . '        <link rel="apple-touch-icon" href="apple-touch-icon.png">
';
        $buffer .= $indent . '        <!-- Place favicon.ico in the root directory -->
';
        $buffer .= $indent . '        <link rel="stylesheet" href="css/vendor.css">
';
        $buffer .= $indent . '        <!-- Theme initialization -->
';
        $buffer .= $indent . '        <script>
';
        $buffer .= $indent . '            var themeSettings = (localStorage.getItem(\'themeSettings\')) ? JSON.parse(localStorage.getItem(\'themeSettings\')) :
';
        $buffer .= $indent . '            {};
';
        $buffer .= $indent . '            var themeName = themeSettings.themeName || \'\';
';
        $buffer .= $indent . '            if (themeName)
';
        $buffer .= $indent . '            {
';
        $buffer .= $indent . '                document.write(\'<link rel="stylesheet" id="theme-style" href="css/app-\' + themeName + \'.css">\');
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '            else
';
        $buffer .= $indent . '            {
';
        $buffer .= $indent . '                document.write(\'<link rel="stylesheet" id="theme-style" href="css/app.css">\');
';
        $buffer .= $indent . '            }
';
        $buffer .= $indent . '        </script>
';
        $buffer .= $indent . '    </head>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <body>
';
        $buffer .= $indent . '        <div class="main-wrapper">
';
        $buffer .= $indent . '            <div class="app" id="app">
';
        $buffer .= $indent . '                <header class="header">
';
        $buffer .= $indent . '                    <div class="header-block header-block-collapse hidden-lg-up"> <button class="collapse-btn" id="sidebar-collapse-btn">
';
        $buffer .= $indent . '    			<i class="fa fa-bars"></i>
';
        $buffer .= $indent . '    		</button> </div>
';
        $buffer .= $indent . '                    <div class="header-block header-block-search hidden-sm-down">
';
        $buffer .= $indent . '                        <form role="search">
';
        $buffer .= $indent . '                            <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="Search">
';
        $buffer .= $indent . '                                <div class="underline"></div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </form>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <div class="header-block header-block-buttons">
';
        $buffer .= $indent . '                        <a href="https://github.com/modularcode/modular-admin-html" class="btn btn-oval btn-sm rounded-s header-btn"> <i class="fa fa-github-alt"></i> View on GitHub </a>
';
        $buffer .= $indent . '                        <a href="https://github.com/modularcode/modular-admin-html/releases/download/v1.0.1/modular-admin-html-1.0.1.zip" class="btn btn-oval btn-sm rounded-s header-btn"> <i class="fa fa-cloud-download"></i> Download .zip </a>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <div class="header-block header-block-nav">
';
        $buffer .= $indent . '                        <ul class="nav-profile">
';
        $buffer .= $indent . '                            <li class="notifications new">
';
        $buffer .= $indent . '                                <a href="" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <sup>
';
        $buffer .= $indent . '    			      <span class="counter">8</span>
';
        $buffer .= $indent . '    			    </sup> </a>
';
        $buffer .= $indent . '                                <div class="dropdown-menu notifications-dropdown-menu">
';
        $buffer .= $indent . '                                    <ul class="notifications-container">
';
        $buffer .= $indent . '                                        <li>
';
        $buffer .= $indent . '                                            <a href="" class="notification-item">
';
        $buffer .= $indent . '                                                <div class="img-col">
';
        $buffer .= $indent . '                                                    <div class="img" style="background-image: url(\'assets/faces/3.jpg\')"></div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="body-col">
';
        $buffer .= $indent . '                                                    <p> <span class="accent">Zack Alien</span> pushed new commit: <span class="accent">Fix page load performance issue</span>. </p>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </a>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li>
';
        $buffer .= $indent . '                                            <a href="" class="notification-item">
';
        $buffer .= $indent . '                                                <div class="img-col">
';
        $buffer .= $indent . '                                                    <div class="img" style="background-image: url(\'assets/faces/5.jpg\')"></div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="body-col">
';
        $buffer .= $indent . '                                                    <p> <span class="accent">Amaya Hatsumi</span> started new task: <span class="accent">Dashboard UI design.</span>. </p>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </a>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li>
';
        $buffer .= $indent . '                                            <a href="" class="notification-item">
';
        $buffer .= $indent . '                                                <div class="img-col">
';
        $buffer .= $indent . '                                                    <div class="img" style="background-image: url(\'assets/faces/8.jpg\')"></div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="body-col">
';
        $buffer .= $indent . '                                                    <p> <span class="accent">Andy Nouman</span> deployed new version of <span class="accent">NodeJS REST Api V3</span> </p>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </a>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                    </ul>
';
        $buffer .= $indent . '                                    <footer>
';
        $buffer .= $indent . '                                        <ul>
';
        $buffer .= $indent . '                                            <li> <a href="">
';
        $buffer .= $indent . '    			            View All
';
        $buffer .= $indent . '    			          </a> </li>
';
        $buffer .= $indent . '                                        </ul>
';
        $buffer .= $indent . '                                    </footer>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </li>
';
        $buffer .= $indent . '                            <li class="profile dropdown">
';
        $buffer .= $indent . '                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
';
        $buffer .= $indent . '                                    <div class="img" style="background-image: url(\'https://avatars3.githubusercontent.com/u/3959008?v=3&s=40\')"> </div> <span class="name">
';
        $buffer .= $indent . '    			      John Doe
';
        $buffer .= $indent . '    			    </span> </a>
';
        $buffer .= $indent . '                                <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
';
        $buffer .= $indent . '                                    <a class="dropdown-item" href="#"> <i class="fa fa-user icon"></i> Profile </a>
';
        $buffer .= $indent . '                                    <a class="dropdown-item" href="#"> <i class="fa fa-bell icon"></i> Notifications </a>
';
        $buffer .= $indent . '                                    <a class="dropdown-item" href="#"> <i class="fa fa-gear icon"></i> Settings </a>
';
        $buffer .= $indent . '                                    <div class="dropdown-divider"></div>
';
        $buffer .= $indent . '                                    <a class="dropdown-item" href="login.html"> <i class="fa fa-power-off icon"></i> Logout </a>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </li>
';
        $buffer .= $indent . '                        </ul>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </header>
';
        $buffer .= $indent . '                <aside class="sidebar">
';
        $buffer .= $indent . '                    <div class="sidebar-container">
';
        $buffer .= $indent . '                        <div class="sidebar-header">
';
        $buffer .= $indent . '                            <div class="brand">
';
        $buffer .= $indent . '                                <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> Modular Admin </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                        <nav class="menu">
';
        $buffer .= $indent . '                            <ul class="nav metismenu" id="sidebar-menu">
';
        $buffer .= $indent . '                                <li class="active">
';
        $buffer .= $indent . '                                    <a href="index.html"> <i class="fa fa-home"></i> Dashboard </a>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href=""> <i class="fa fa-th-large"></i> Items Manager <i class="fa arrow"></i> </a>
';
        $buffer .= $indent . '                                    <ul>
';
        $buffer .= $indent . '                                        <li> <a href="items-list.html">
';
        $buffer .= $indent . '    								Items List
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="item-editor.html">
';
        $buffer .= $indent . '    								Item Editor
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                    </ul>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href=""> <i class="fa fa-bar-chart"></i> Charts <i class="fa arrow"></i> </a>
';
        $buffer .= $indent . '                                    <ul>
';
        $buffer .= $indent . '                                        <li> <a href="charts-flot.html">
';
        $buffer .= $indent . '    								Flot Charts
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="charts-morris.html">
';
        $buffer .= $indent . '    								Morris Charts
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                    </ul>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href=""> <i class="fa fa-table"></i> Tables <i class="fa arrow"></i> </a>
';
        $buffer .= $indent . '                                    <ul>
';
        $buffer .= $indent . '                                        <li> <a href="static-tables.html">
';
        $buffer .= $indent . '    								Static Tables
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="responsive-tables.html">
';
        $buffer .= $indent . '    								Responsive Tables
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                    </ul>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href="forms.html"> <i class="fa fa-pencil-square-o"></i> Forms </a>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href=""> <i class="fa fa-desktop"></i> UI Elements <i class="fa arrow"></i> </a>
';
        $buffer .= $indent . '                                    <ul>
';
        $buffer .= $indent . '                                        <li> <a href="buttons.html">
';
        $buffer .= $indent . '    								Buttons
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="cards.html">
';
        $buffer .= $indent . '    								Cards
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="typography.html">
';
        $buffer .= $indent . '    								Typography
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="icons.html">
';
        $buffer .= $indent . '    								Icons
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="grid.html">
';
        $buffer .= $indent . '    								Grid
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                    </ul>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href=""> <i class="fa fa-file-text-o"></i> Pages <i class="fa arrow"></i> </a>
';
        $buffer .= $indent . '                                    <ul>
';
        $buffer .= $indent . '                                        <li> <a href="login.html">
';
        $buffer .= $indent . '    								Login
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="signup.html">
';
        $buffer .= $indent . '    								Sign Up
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="reset.html">
';
        $buffer .= $indent . '    								Reset
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="error-404.html">
';
        $buffer .= $indent . '    								Error 404 App
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="error-404-alt.html">
';
        $buffer .= $indent . '    								Error 404 Global
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="error-500.html">
';
        $buffer .= $indent . '    								Error 500 App
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                        <li> <a href="error-500-alt.html">
';
        $buffer .= $indent . '    								Error 500 Global
';
        $buffer .= $indent . '    							</a> </li>
';
        $buffer .= $indent . '                                    </ul>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                                <li>
';
        $buffer .= $indent . '                                    <a href="https://github.com/modularcode/modular-admin-html"> <i class="fa fa-github-alt"></i> Theme Docs </a>
';
        $buffer .= $indent . '                                </li>
';
        $buffer .= $indent . '                            </ul>
';
        $buffer .= $indent . '                        </nav>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <footer class="sidebar-footer">
';
        $buffer .= $indent . '                        <ul class="nav metismenu" id="customize-menu">
';
        $buffer .= $indent . '                            <li>
';
        $buffer .= $indent . '                                <ul>
';
        $buffer .= $indent . '                                    <li class="customize">
';
        $buffer .= $indent . '                                        <div class="customize-item">
';
        $buffer .= $indent . '                                            <div class="row customize-header">
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label class="title">fixed</label> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label class="title">static</label> </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                            <div class="row hidden-md-down">
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label class="title">Sidebar:</label> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label>
';
        $buffer .= $indent . '    				                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed" >
';
        $buffer .= $indent . '    				                        <span></span>
';
        $buffer .= $indent . '    				                    </label> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label>
';
        $buffer .= $indent . '    				                        <input class="radio" type="radio" name="sidebarPosition" value="">
';
        $buffer .= $indent . '    				                        <span></span>
';
        $buffer .= $indent . '    				                    </label> </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                            <div class="row">
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label class="title">Header:</label> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label>
';
        $buffer .= $indent . '    				                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
';
        $buffer .= $indent . '    				                        <span></span>
';
        $buffer .= $indent . '    				                    </label> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label>
';
        $buffer .= $indent . '    				                        <input class="radio" type="radio" name="headerPosition" value="">
';
        $buffer .= $indent . '    				                        <span></span>
';
        $buffer .= $indent . '    				                    </label> </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                            <div class="row">
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label class="title">Footer:</label> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label>
';
        $buffer .= $indent . '    				                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
';
        $buffer .= $indent . '    				                        <span></span>
';
        $buffer .= $indent . '    				                    </label> </div>
';
        $buffer .= $indent . '                                                <div class="col-xs-4"> <label>
';
        $buffer .= $indent . '    				                        <input class="radio" type="radio" name="footerPosition" value="">
';
        $buffer .= $indent . '    				                        <span></span>
';
        $buffer .= $indent . '    				                    </label> </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                        <div class="customize-item">
';
        $buffer .= $indent . '                                            <ul class="customize-colors">
';
        $buffer .= $indent . '                                                <li> <span class="color-item color-red" data-theme="red"></span> </li>
';
        $buffer .= $indent . '                                                <li> <span class="color-item color-orange" data-theme="orange"></span> </li>
';
        $buffer .= $indent . '                                                <li> <span class="color-item color-green" data-theme="green"></span> </li>
';
        $buffer .= $indent . '                                                <li> <span class="color-item color-seagreen" data-theme="seagreen"></span> </li>
';
        $buffer .= $indent . '                                                <li> <span class="color-item color-blue active" data-theme=""></span> </li>
';
        $buffer .= $indent . '                                                <li> <span class="color-item color-purple" data-theme="purple"></span> </li>
';
        $buffer .= $indent . '                                            </ul>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                    </li>
';
        $buffer .= $indent . '                                </ul>
';
        $buffer .= $indent . '                                <a href=""> <i class="fa fa-cog"></i> Customize </a>
';
        $buffer .= $indent . '                            </li>
';
        $buffer .= $indent . '                        </ul>
';
        $buffer .= $indent . '                    </footer>
';
        $buffer .= $indent . '                </aside>
';
        $buffer .= $indent . '                <div class="sidebar-overlay" id="sidebar-overlay"></div>
';
        $buffer .= $indent . '                <article class="content dashboard-page">
';
        $buffer .= $indent . '                    <section class="section">
';
        $buffer .= $indent . '                        <div class="row sameheight-container">
';
        $buffer .= $indent . '                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-5 stats-col">
';
        $buffer .= $indent . '                                <div class="card sameheight-item stats" data-exclude="xs">
';
        $buffer .= $indent . '                                    <div class="card-block">
';
        $buffer .= $indent . '                                        <div class="title-block">
';
        $buffer .= $indent . '                                            <h4 class="title">
';
        $buffer .= $indent . '            				Stats
';
        $buffer .= $indent . '            			</h4>
';
        $buffer .= $indent . '                                            <p class="title-description"> Website metrics for <a href="http://modularteam.github.io/modularity-free-admin-dashboard-theme-html/">
';
        $buffer .= $indent . '            					your awesome project
';
        $buffer .= $indent . '            				</a> </p>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                        <div class="row row-sm stats-container">
';
        $buffer .= $indent . '                                            <div class="col-xs-12 col-sm-6 stat-col">
';
        $buffer .= $indent . '                                                <div class="stat-icon"> <i class="fa fa-rocket"></i> </div>
';
        $buffer .= $indent . '                                                <div class="stat">
';
        $buffer .= $indent . '                                                    <div class="value"> 5407 </div>
';
        $buffer .= $indent . '                                                    <div class="name"> Active items </div>
';
        $buffer .= $indent . '                                                </div> <progress class="progress stat-progress" value="75" max="100">
';
        $buffer .= $indent . '            					<div class="progress">
';
        $buffer .= $indent . '            						<span class="progress-bar" style="width: 75%;"></span>
';
        $buffer .= $indent . '            					</div>
';
        $buffer .= $indent . '            				</progress> </div>
';
        $buffer .= $indent . '                                            <div class="col-xs-12 col-sm-6 stat-col">
';
        $buffer .= $indent . '                                                <div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>
';
        $buffer .= $indent . '                                                <div class="stat">
';
        $buffer .= $indent . '                                                    <div class="value"> 78464 </div>
';
        $buffer .= $indent . '                                                    <div class="name"> Items sold </div>
';
        $buffer .= $indent . '                                                </div> <progress class="progress stat-progress" value="25" max="100">
';
        $buffer .= $indent . '            					<div class="progress">
';
        $buffer .= $indent . '            						<span class="progress-bar" style="width: 25%;"></span>
';
        $buffer .= $indent . '            					</div>
';
        $buffer .= $indent . '            				</progress> </div>
';
        $buffer .= $indent . '                                            <div class="col-xs-12 col-sm-6  stat-col">
';
        $buffer .= $indent . '                                                <div class="stat-icon"> <i class="fa fa-line-chart"></i> </div>
';
        $buffer .= $indent . '                                                <div class="stat">
';
        $buffer .= $indent . '                                                    <div class="value"> $80.560 </div>
';
        $buffer .= $indent . '                                                    <div class="name"> Monthly income </div>
';
        $buffer .= $indent . '                                                </div> <progress class="progress stat-progress" value="60" max="100">
';
        $buffer .= $indent . '            					<div class="progress">
';
        $buffer .= $indent . '            						<span class="progress-bar" style="width: 60%;"></span>
';
        $buffer .= $indent . '            					</div>
';
        $buffer .= $indent . '            				</progress> </div>
';
        $buffer .= $indent . '                                            <div class="col-xs-12 col-sm-6  stat-col">
';
        $buffer .= $indent . '                                                <div class="stat-icon"> <i class="fa fa-users"></i> </div>
';
        $buffer .= $indent . '                                                <div class="stat">
';
        $buffer .= $indent . '                                                    <div class="value"> 359 </div>
';
        $buffer .= $indent . '                                                    <div class="name"> Total users </div>
';
        $buffer .= $indent . '                                                </div> <progress class="progress stat-progress" value="34" max="100">
';
        $buffer .= $indent . '            					<div class="progress">
';
        $buffer .= $indent . '            						<span class="progress-bar" style="width: 34%;"></span>
';
        $buffer .= $indent . '            					</div>
';
        $buffer .= $indent . '            				</progress> </div>
';
        $buffer .= $indent . '                                            <div class="col-xs-12 col-sm-6  stat-col">
';
        $buffer .= $indent . '                                                <div class="stat-icon"> <i class="fa fa-list-alt"></i> </div>
';
        $buffer .= $indent . '                                                <div class="stat">
';
        $buffer .= $indent . '                                                    <div class="value"> 59 </div>
';
        $buffer .= $indent . '                                                    <div class="name"> Tickets closed </div>
';
        $buffer .= $indent . '                                                </div> <progress class="progress stat-progress" value="49" max="100">
';
        $buffer .= $indent . '            					<div class="progress">
';
        $buffer .= $indent . '            						<span class="progress-bar" style="width: 49%;"></span>
';
        $buffer .= $indent . '            					</div>
';
        $buffer .= $indent . '            				</progress> </div>
';
        $buffer .= $indent . '                                            <div class="col-xs-12 col-sm-6 stat-col">
';
        $buffer .= $indent . '                                                <div class="stat-icon"> <i class="fa fa-dollar"></i> </div>
';
        $buffer .= $indent . '                                                <div class="stat">
';
        $buffer .= $indent . '                                                    <div class="value"> $780.064 </div>
';
        $buffer .= $indent . '                                                    <div class="name"> Total income </div>
';
        $buffer .= $indent . '                                                </div> <progress class="progress stat-progress" value="15" max="100">
';
        $buffer .= $indent . '            					<div class="progress">
';
        $buffer .= $indent . '            						<span class="progress-bar" style="width: 15%;"></span>
';
        $buffer .= $indent . '            					</div>
';
        $buffer .= $indent . '            				</progress> </div>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="col col-xs-12 col-sm-12 col-md-6 col-xl-7 history-col">
';
        $buffer .= $indent . '                                <div class="card sameheight-item" data-exclude="xs">
';
        $buffer .= $indent . '                                    <div class="card-header card-header-sm bordered">
';
        $buffer .= $indent . '                                        <div class="header-block">
';
        $buffer .= $indent . '                                            <h3 class="title">History</h3> </div>
';
        $buffer .= $indent . '                                        <ul class="nav nav-tabs pull-right" role="tablist">
';
        $buffer .= $indent . '                                            <li class="nav-item"> <a class="nav-link active" href="#visits" role="tab" data-toggle="tab">Visits</a> </li>
';
        $buffer .= $indent . '                                            <li class="nav-item"> <a class="nav-link" href="#downloads" role="tab" data-toggle="tab">Downloads</a> </li>
';
        $buffer .= $indent . '                                        </ul>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <div class="card-block">
';
        $buffer .= $indent . '                                        <div class="tab-content">
';
        $buffer .= $indent . '                                            <div role="tabpanel" class="tab-pane active fade in" id="visits">
';
        $buffer .= $indent . '                                                <p class="title-description"> Number of unique visits last 30 days </p>
';
        $buffer .= $indent . '                                                <div id="dashboard-visits-chart"></div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                            <div role="tabpanel" class="tab-pane fade" id="downloads">
';
        $buffer .= $indent . '                                                <p class="title-description"> Number of downloads last 30 days </p>
';
        $buffer .= $indent . '                                                <div id="dashboard-downloads-chart"></div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </section>
';
        $buffer .= $indent . '                    <section class="section">
';
        $buffer .= $indent . '                        <div class="row sameheight-container">
';
        $buffer .= $indent . '                            <div class="col-xl-8">
';
        $buffer .= $indent . '                                <div class="card sameheight-item items" data-exclude="xs,sm,lg">
';
        $buffer .= $indent . '                                    <div class="card-header bordered">
';
        $buffer .= $indent . '                                        <div class="header-block">
';
        $buffer .= $indent . '                                            <h3 class="title">
';
        $buffer .= $indent . '            				Items
';
        $buffer .= $indent . '            			</h3> <a href="item-editor.html" class="btn btn-primary btn-sm rounded">
';
        $buffer .= $indent . '            				Add new
';
        $buffer .= $indent . '            			</a> </div>
';
        $buffer .= $indent . '                                        <div class="header-block pull-right"> <label class="search">
';
        $buffer .= $indent . '            				<input class="search-input" placeholder="search...">
';
        $buffer .= $indent . '            				<i class="fa fa-search search-icon"></i>
';
        $buffer .= $indent . '            			</label>
';
        $buffer .= $indent . '                                            <div class="pagination">
';
        $buffer .= $indent . '                                                <a href="" class="btn btn-primary btn-sm rounded"> <i class="fa fa-angle-up"></i> </a>
';
        $buffer .= $indent . '                                                <a href="" class="btn btn-primary btn-sm rounded"> <i class="fa fa-angle-down"></i> </a>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <ul class="item-list striped">
';
        $buffer .= $indent . '                                        <li class="item item-list-header hidden-sm-down">
';
        $buffer .= $indent . '                                            <div class="item-row">
';
        $buffer .= $indent . '                                                <div class="item-col item-col-header fixed item-col-img xs"></div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-header item-col-title">
';
        $buffer .= $indent . '                                                    <div> <span>Name</span> </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-header item-col-sales">
';
        $buffer .= $indent . '                                                    <div> <span>Sales</span> </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-header item-col-stats">
';
        $buffer .= $indent . '                                                    <div class="no-overflow"> <span>Stats</span> </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-header item-col-date">
';
        $buffer .= $indent . '                                                    <div> <span>Published</span> </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li class="item">
';
        $buffer .= $indent . '                                            <div class="item-row">
';
        $buffer .= $indent . '                                                <div class="item-col fixed item-col-img xs">
';
        $buffer .= $indent . '                                                    <a href="">
';
        $buffer .= $indent . '                                                        <div class="item-img xs rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg)"></div>
';
        $buffer .= $indent . '                                                    </a>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-title no-overflow">
';
        $buffer .= $indent . '                                                    <div>
';
        $buffer .= $indent . '                                                        <a href="" class="">
';
        $buffer .= $indent . '                                                            <h4 class="item-title no-wrap">
';
        $buffer .= $indent . '            									12 Myths Uncovered About IT &amp; Software
';
        $buffer .= $indent . '            								</h4> </a>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-sales">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Sales</div>
';
        $buffer .= $indent . '                                                    <div> 4958 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-stats">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Stats</div>
';
        $buffer .= $indent . '                                                    <div class="no-overflow">
';
        $buffer .= $indent . '                                                        <div class="item-stats sparkline" data-type="bar"></div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-date">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Published</div>
';
        $buffer .= $indent . '                                                    <div> 21 SEP 10:45 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li class="item">
';
        $buffer .= $indent . '                                            <div class="item-row">
';
        $buffer .= $indent . '                                                <div class="item-col fixed item-col-img xs">
';
        $buffer .= $indent . '                                                    <a href="">
';
        $buffer .= $indent . '                                                        <div class="item-img xs rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/_everaldo/128.jpg)"></div>
';
        $buffer .= $indent . '                                                    </a>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-title no-overflow">
';
        $buffer .= $indent . '                                                    <div>
';
        $buffer .= $indent . '                                                        <a href="" class="">
';
        $buffer .= $indent . '                                                            <h4 class="item-title no-wrap">
';
        $buffer .= $indent . '            									50% of things doesn&#x27;t really belongs to you
';
        $buffer .= $indent . '            								</h4> </a>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-sales">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Sales</div>
';
        $buffer .= $indent . '                                                    <div> 192 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-stats">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Stats</div>
';
        $buffer .= $indent . '                                                    <div class="no-overflow">
';
        $buffer .= $indent . '                                                        <div class="item-stats sparkline" data-type="bar"></div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-date">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Published</div>
';
        $buffer .= $indent . '                                                    <div> 21 SEP 10:45 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li class="item">
';
        $buffer .= $indent . '                                            <div class="item-row">
';
        $buffer .= $indent . '                                                <div class="item-col fixed item-col-img xs">
';
        $buffer .= $indent . '                                                    <a href="">
';
        $buffer .= $indent . '                                                        <div class="item-img xs rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/eduardo_olv/128.jpg)"></div>
';
        $buffer .= $indent . '                                                    </a>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-title no-overflow">
';
        $buffer .= $indent . '                                                    <div>
';
        $buffer .= $indent . '                                                        <a href="" class="">
';
        $buffer .= $indent . '                                                            <h4 class="item-title no-wrap">
';
        $buffer .= $indent . '            									Vestibulum tincidunt amet laoreet mauris sit sem aliquam cras maecenas vel aliquam.
';
        $buffer .= $indent . '            								</h4> </a>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-sales">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Sales</div>
';
        $buffer .= $indent . '                                                    <div> 2143 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-stats">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Stats</div>
';
        $buffer .= $indent . '                                                    <div class="no-overflow">
';
        $buffer .= $indent . '                                                        <div class="item-stats sparkline" data-type="bar"></div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-date">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Published</div>
';
        $buffer .= $indent . '                                                    <div> 21 SEP 10:45 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li class="item">
';
        $buffer .= $indent . '                                            <div class="item-row">
';
        $buffer .= $indent . '                                                <div class="item-col fixed item-col-img xs">
';
        $buffer .= $indent . '                                                    <a href="">
';
        $buffer .= $indent . '                                                        <div class="item-img xs rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/why_this/128.jpg)"></div>
';
        $buffer .= $indent . '                                                    </a>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-title no-overflow">
';
        $buffer .= $indent . '                                                    <div>
';
        $buffer .= $indent . '                                                        <a href="" class="">
';
        $buffer .= $indent . '                                                            <h4 class="item-title no-wrap">
';
        $buffer .= $indent . '            									10 tips of Object Oriented Design
';
        $buffer .= $indent . '            								</h4> </a>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-sales">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Sales</div>
';
        $buffer .= $indent . '                                                    <div> 124 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-stats">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Stats</div>
';
        $buffer .= $indent . '                                                    <div class="no-overflow">
';
        $buffer .= $indent . '                                                        <div class="item-stats sparkline" data-type="bar"></div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-date">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Published</div>
';
        $buffer .= $indent . '                                                    <div> 21 SEP 10:45 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li class="item">
';
        $buffer .= $indent . '                                            <div class="item-row">
';
        $buffer .= $indent . '                                                <div class="item-col fixed item-col-img xs">
';
        $buffer .= $indent . '                                                    <a href="">
';
        $buffer .= $indent . '                                                        <div class="item-img xs rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/w7download/128.jpg)"></div>
';
        $buffer .= $indent . '                                                    </a>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-title no-overflow">
';
        $buffer .= $indent . '                                                    <div>
';
        $buffer .= $indent . '                                                        <a href="" class="">
';
        $buffer .= $indent . '                                                            <h4 class="item-title no-wrap">
';
        $buffer .= $indent . '            									Sometimes friend tells it is cold
';
        $buffer .= $indent . '            								</h4> </a>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-sales">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Sales</div>
';
        $buffer .= $indent . '                                                    <div> 10214 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-stats">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Stats</div>
';
        $buffer .= $indent . '                                                    <div class="no-overflow">
';
        $buffer .= $indent . '                                                        <div class="item-stats sparkline" data-type="bar"></div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-date">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Published</div>
';
        $buffer .= $indent . '                                                    <div> 21 SEP 10:45 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                        <li class="item">
';
        $buffer .= $indent . '                                            <div class="item-row">
';
        $buffer .= $indent . '                                                <div class="item-col fixed item-col-img xs">
';
        $buffer .= $indent . '                                                    <a href="">
';
        $buffer .= $indent . '                                                        <div class="item-img xs rounded" style="background-image: url(https://s3.amazonaws.com/uifaces/faces/twitter/pankogut/128.jpg)"></div>
';
        $buffer .= $indent . '                                                    </a>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-title no-overflow">
';
        $buffer .= $indent . '                                                    <div>
';
        $buffer .= $indent . '                                                        <a href="" class="">
';
        $buffer .= $indent . '                                                            <h4 class="item-title no-wrap">
';
        $buffer .= $indent . '            									New ways of conceptual thinking
';
        $buffer .= $indent . '            								</h4> </a>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-sales">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Sales</div>
';
        $buffer .= $indent . '                                                    <div> 3217 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-stats">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Stats</div>
';
        $buffer .= $indent . '                                                    <div class="no-overflow">
';
        $buffer .= $indent . '                                                        <div class="item-stats sparkline" data-type="bar"></div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                                <div class="item-col item-col-date">
';
        $buffer .= $indent . '                                                    <div class="item-heading">Published</div>
';
        $buffer .= $indent . '                                                    <div> 21 SEP 10:45 </div>
';
        $buffer .= $indent . '                                                </div>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </li>
';
        $buffer .= $indent . '                                    </ul>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="col-xl-4">
';
        $buffer .= $indent . '                                <div class="card sameheight-item sales-breakdown" data-exclude="xs,sm,lg">
';
        $buffer .= $indent . '                                    <div class="card-header">
';
        $buffer .= $indent . '                                        <div class="header-block">
';
        $buffer .= $indent . '                                            <h3 class="title">
';
        $buffer .= $indent . '             				Sales breakdown
';
        $buffer .= $indent . '             			</h3> </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <div class="card-block">
';
        $buffer .= $indent . '                                        <div class="dashboard-sales-breakdown-chart" id="dashboard-sales-breakdown-chart"></div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </section>
';
        $buffer .= $indent . '                    <section class="section map-tasks">
';
        $buffer .= $indent . '                        <div class="row sameheight-container">
';
        $buffer .= $indent . '                            <div class="col-md-8">
';
        $buffer .= $indent . '                                <div class="card sameheight-item" data-exclude="xs,sm">
';
        $buffer .= $indent . '                                    <div class="card-header">
';
        $buffer .= $indent . '                                        <div class="header-block">
';
        $buffer .= $indent . '                                            <h3 class="title">
';
        $buffer .= $indent . '            	            Sales by countries
';
        $buffer .= $indent . '            	        </h3> </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <div class="card-block">
';
        $buffer .= $indent . '                                        <div id="dashboard-sales-map" style="width: 100%; height: 400px;"></div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="col-md-4">
';
        $buffer .= $indent . '                                <div class="card tasks sameheight-item" data-exclude="xs,sm">
';
        $buffer .= $indent . '                                    <div class="card-header bordered">
';
        $buffer .= $indent . '                                        <div class="header-block">
';
        $buffer .= $indent . '                                            <h3 class="title">
';
        $buffer .= $indent . '                           Tasks
';
        $buffer .= $indent . '                        </h3> </div>
';
        $buffer .= $indent . '                                        <div class="header-block pull-right"> <a href="" class="btn btn-primary btn-sm rounded pull-right">
';
        $buffer .= $indent . '                            Add new
';
        $buffer .= $indent . '                        </a> </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <div class="card-block">
';
        $buffer .= $indent . '                                        <div class="tasks-block">
';
        $buffer .= $indent . '                                            <ul class="item-list">
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                checked="checked"> 
';
        $buffer .= $indent . '                                                <span>Meeting with embassador</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                checked="checked"> 
';
        $buffer .= $indent . '                                                <span>Confession</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                > 
';
        $buffer .= $indent . '                                                <span>Time to start building an ark</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                > 
';
        $buffer .= $indent . '                                                <span>Beer time with dudes</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                checked="checked"> 
';
        $buffer .= $indent . '                                                <span>Meeting new girls</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                > 
';
        $buffer .= $indent . '                                                <span>Remember damned home address</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                > 
';
        $buffer .= $indent . '                                                <span>Get home before you got sleep</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                checked="checked"> 
';
        $buffer .= $indent . '                                                <span>Meeting with embassador</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                checked="checked"> 
';
        $buffer .= $indent . '                                                <span>Confession</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                > 
';
        $buffer .= $indent . '                                                <span>Time to start building an ark</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                > 
';
        $buffer .= $indent . '                                                <span>Beer time with dudes</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                checked="checked"> 
';
        $buffer .= $indent . '                                                <span>Meeting new girls</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                                <li class="item">
';
        $buffer .= $indent . '                                                    <div class="item-row">
';
        $buffer .= $indent . '                                                        <div class="item-col item-col-title"> <label>
';
        $buffer .= $indent . '                                                <input class="checkbox" type="checkbox"
';
        $buffer .= $indent . '                                                > 
';
        $buffer .= $indent . '                                                <span>Remember damned home address</span>
';
        $buffer .= $indent . '                                            </label> </div>
';
        $buffer .= $indent . '                                                        <div class="item-col fixed item-col-actions-dropdown">
';
        $buffer .= $indent . '                                                            <div class="item-actions-dropdown">
';
        $buffer .= $indent . '                                                                <a class="item-actions-toggle-btn"> <span class="inactive">
';
        $buffer .= $indent . '                                                        <i class="fa fa-cog"></i>
';
        $buffer .= $indent . '                                                    </span> <span class="active">
';
        $buffer .= $indent . '                                                    <i class="fa fa-chevron-circle-right"></i>
';
        $buffer .= $indent . '                                                    </span> </a>
';
        $buffer .= $indent . '                                                                <div class="item-actions-block">
';
        $buffer .= $indent . '                                                                    <ul class="item-actions-list">
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal"> <i class="fa fa-trash-o "></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="check" href="#"> <i class="fa fa-check"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                        <li>
';
        $buffer .= $indent . '                                                                            <a class="edit" href="item-editor.html"> <i class="fa fa-pencil"></i> </a>
';
        $buffer .= $indent . '                                                                        </li>
';
        $buffer .= $indent . '                                                                    </ul>
';
        $buffer .= $indent . '                                                                </div>
';
        $buffer .= $indent . '                                                            </div>
';
        $buffer .= $indent . '                                                        </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </li>
';
        $buffer .= $indent . '                                            </ul>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                    </section>
';
        $buffer .= $indent . '                </article>
';
        $buffer .= $indent . '                <footer class="footer">
';
        $buffer .= $indent . '                    <div class="footer-block buttons"> <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=modularcode&repo=modular-admin-html&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe> </div>
';
        $buffer .= $indent . '                    <div class="footer-block author">
';
        $buffer .= $indent . '                        <ul>
';
        $buffer .= $indent . '                            <li> created by <a href="https://github.com/modularcode">ModularCode</a> </li>
';
        $buffer .= $indent . '                            <li> <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a> </li>
';
        $buffer .= $indent . '                        </ul>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </footer>
';
        $buffer .= $indent . '                <div class="modal fade" id="modal-media">
';
        $buffer .= $indent . '                    <div class="modal-dialog modal-lg">
';
        $buffer .= $indent . '                        <div class="modal-content">
';
        $buffer .= $indent . '                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
';
        $buffer .= $indent . '    					<span aria-hidden="true">&times;</span>
';
        $buffer .= $indent . '    					<span class="sr-only">Close</span>
';
        $buffer .= $indent . '    				</button>
';
        $buffer .= $indent . '                                <h4 class="modal-title">Media Library</h4> </div>
';
        $buffer .= $indent . '                            <div class="modal-body modal-tab-container">
';
        $buffer .= $indent . '                                <ul class="nav nav-tabs modal-tabs" role="tablist">
';
        $buffer .= $indent . '                                    <li class="nav-item"> <a class="nav-link" href="#gallery" data-toggle="tab" role="tab">Gallery</a> </li>
';
        $buffer .= $indent . '                                    <li class="nav-item"> <a class="nav-link active" href="#upload" data-toggle="tab" role="tab">Upload</a> </li>
';
        $buffer .= $indent . '                                </ul>
';
        $buffer .= $indent . '                                <div class="tab-content modal-tab-content">
';
        $buffer .= $indent . '                                    <div class="tab-pane fade" id="gallery" role="tabpanel">
';
        $buffer .= $indent . '                                        <div class="images-container">
';
        $buffer .= $indent . '                                            <div class="row"> </div>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                    <div class="tab-pane fade active in" id="upload" role="tabpanel">
';
        $buffer .= $indent . '                                        <div class="upload-container">
';
        $buffer .= $indent . '                                            <div id="dropzone">
';
        $buffer .= $indent . '                                                <form action="/" method="POST" enctype="multipart/form-data" class="dropzone needsclick dz-clickable" id="demo-upload">
';
        $buffer .= $indent . '                                                    <div class="dz-message-block">
';
        $buffer .= $indent . '                                                        <div class="dz-message needsclick"> Drop files here or click to upload. </div>
';
        $buffer .= $indent . '                                                    </div>
';
        $buffer .= $indent . '                                                </form>
';
        $buffer .= $indent . '                                            </div>
';
        $buffer .= $indent . '                                        </div>
';
        $buffer .= $indent . '                                    </div>
';
        $buffer .= $indent . '                                </div>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> <button type="button" class="btn btn-primary">Insert Selected</button> </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                        <!-- /.modal-content -->
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <!-- /.modal-dialog -->
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <!-- /.modal -->
';
        $buffer .= $indent . '                <div class="modal fade" id="confirm-modal">
';
        $buffer .= $indent . '                    <div class="modal-dialog" role="document">
';
        $buffer .= $indent . '                        <div class="modal-content">
';
        $buffer .= $indent . '                            <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
';
        $buffer .= $indent . '    					<span aria-hidden="true">&times;</span>
';
        $buffer .= $indent . '    				</button>
';
        $buffer .= $indent . '                                <h4 class="modal-title"><i class="fa fa-warning"></i> Alert</h4> </div>
';
        $buffer .= $indent . '                            <div class="modal-body">
';
        $buffer .= $indent . '                                <p>Are you sure want to do this?</p>
';
        $buffer .= $indent . '                            </div>
';
        $buffer .= $indent . '                            <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button> <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button> </div>
';
        $buffer .= $indent . '                        </div>
';
        $buffer .= $indent . '                        <!-- /.modal-content -->
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <!-- /.modal-dialog -->
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <!-- /.modal -->
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <!-- Reference block for JS -->
';
        $buffer .= $indent . '        <div class="ref" id="ref">
';
        $buffer .= $indent . '            <div class="color-primary"></div>
';
        $buffer .= $indent . '            <div class="chart">
';
        $buffer .= $indent . '                <div class="color-primary"></div>
';
        $buffer .= $indent . '                <div class="color-secondary"></div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <script src="js/vendor.js"></script>
';
        $buffer .= $indent . '        <script src="js/app.js"></script>
';
        $buffer .= $indent . '    </body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }
}
