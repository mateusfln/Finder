<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/4/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CakePHP: the rapid development PHP framework:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['main.min.css', 'plugins.min.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
        <!-- header -->
        <div id="header-fix" class="header fixed-top transperant">
            <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-light py-lg-0 py-4">
                <a class="navbar-brand mr-4 mr-md-5" href="index.html"><img src="dist/images/logo-v1.png" alt=""></a> 

                <div id="dl-menu" class="dl-menuwrapper d-block d-lg-none float-right">
                    <button>Open Menu</button>
                    <ul class="dl-menu">

                        <li class="nav-item active dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">teste</a>
                            <ul class="dl-submenu">
                                <li class="dl-back"><a href="#">back</a></li>
                                 <li><a href="index.html">teste 1</a></li>
<li><a href="index-2.html">Home 2</a></li>
<li><a href="index-3.html">Home Video</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Explore</a>
                            <ul class="dl-submenu">
                                <li class="dl-back"><a href="#">back</a></li>
                                <li><a href="listing-explore-place-profile.html">Explore Place</a></li>
                                <li><a href="listing-explore-event-profile.html">Explore Event</a></li>
                                <li><a href="listing-explore-property-profile.html">Explore Property</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Listing</a>
                            <ul class="dl-submenu">
                                <li class="dl-back"><a href="#">back</a></li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Listing By Categories</a>
                                    <ul class="dl-submenu">
                                        <li class="dl-back"><a href="#">back</a></li>
                                        <li><a href="listing-categories-style1.html">Category 1</a></li>
                                        <li><a href="listing-categories-style2.html">Category 2</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Listing No Map</a>
                                    <ul class="dl-submenu">
                                        <li class="dl-back"><a href="#">back</a></li>
                                        <li><a href="listing-no-map-sidebar.html">With Sidebar</a></li>
                                        <li><a href="listing-no-map-fullwidth.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Half Screen Map</a>
                                    <ul class="dl-submenu">
                                        <li class="dl-back"><a href="#">back</a></li>
                                        <li><a href="half-screen-search-sidebar-place.html">With Search Place</a></li>
                                        <li><a href="half-screen-search-sidebar-event.html">With Search Event</a></li>
                                        <li><a href="half-screen-search-sidebar-property.html">With Search Property</a></li>
                                        <li><a href="half-screen-with-categories-sidebar.html">With Categories Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Pages</a>
                            <ul class="dl-submenu">
                                <li class="dl-back"><a href="#">back</a></li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Blog</a>
                                    <ul class="dl-submenu">
                                        <li class="dl-back"><a href="#">back</a></li>
                                        <li><a href="blog-grid.html"> Blog Grid</a></li>
                                        <li><a href="blog-listing.html"> Blog Listing</a></li>
                                        <li><a href="blog-single.html"> Single Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"> Contact</a></li>
                                <li><a href="user-profile.html"> User Profile</a></li>
                                <li><a href="faq.html"> Faq</a></li>
                                <li><a href="pricing.html"> Pricing Table</a></li>
                                <li><a href="coming-soon.html"> Coming Soon</a></li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">404 Error</a>
                                    <ul class="dl-submenu">
                                        <li class="dl-back"><a href="#">back</a></li>
                                        <li><a href="error-dark.html"> 404 Error Dark</a></li>
                                        <li><a href="error-light.html"> 404 Error Light</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li><a href="#modal" class="text-white login_form"><i class="fa fa-sign-in pr-2"></i> Sign In | Register</a></li>

                        <li> <a href="add-listing.html" ><i class="fa fa-plus pr-1"></i> Add Listing</a></li>



                    </ul>
                </div>


                <div class="collapse navbar-collapse d-none d-lg-block" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">oi <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                 <li><a href="index.html">Home 1</a></li>
<li><a href="index-2.html">Home 2</a></li>
<li><a href="index-3.html">Home Video</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Explore <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="listing-explore-place-profile.html">Explore Place</a></li>
                                <li><a href="listing-explore-event-profile.html">Explore Event</a></li>
                                <li><a href="listing-explore-property-profile.html">Explore Property</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Listing <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Listing By Categories</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="listing-categories-style1.html">Category 1</a></li>
                                        <li><a href="listing-categories-style2.html">Category 2</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Listing No Map</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="listing-no-map-sidebar.html">With Sidebar</a></li>
                                        <li><a href="listing-no-map-fullwidth.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Half Screen Map</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="half-screen-search-sidebar-place.html">With Search Place</a></li>
                                        <li><a href="half-screen-search-sidebar-event.html">With Search Event</a></li>
                                        <li><a href="half-screen-search-sidebar-property.html">With Search Property</a></li>
                                        <li><a href="half-screen-with-categories-sidebar.html">With Categories Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Pages <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog-grid.html"> Blog Grid</a></li>
                                        <li><a href="blog-listing.html"> Blog Listing</a></li>
                                        <li><a href="blog-single.html"> Single Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"> Contact</a></li>
                                <li><a href="user-profile.html"> User Profile</a></li>
                                <li><a href="faq.html"> Faq</a></li>
                                <li><a href="pricing.html"> Pricing Table</a></li>
                                <li><a href="coming-soon.html"> Coming Soon</a></li>
                                <li class="dropdown-submenu"><a tabindex="-1" href="#">404 Error</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="error-dark.html"> 404 Error Dark</a></li>
                                        <li><a href="error-light.html"> 404 Error Light</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-unstyled my-2 my-lg-0">
                        <li class="text-white"><i class="fa fa-sign-in pr-2"></i> <a href="#modal" class="text-white login_form">Sign In | Register</a></li>
                    </ul>
                    <a href="add-listing.html" class="btn btn-outline-light btn-sm ml-0 ml-lg-4 mt-3 mt-lg-0"><i class="fa fa-plus pr-1"></i> Add Listing</a>
                </div>
            </nav>                    
        </div>
        <!--End header -->

        <!-- Page Inner -->
        <section class="image-bg lis-grediant grediant-tb">
            <div class="background-image-maker"></div>
            <div class="holder-image">
                <img src="dist/images/bg1.jpg" alt="" class="img-fluid d-none">
            </div>
            <div class="container">
                <div class="row justify-content-center pt-5">
                    <div class="col-12 col-md-10 text-center wow fadeInUp">
                        <div class="heading pb-5">
                            <h1 class="display-4">Find Nearby Spots</h1>
                            <h4 class="font-weight-normal mb-0">Expolore top-rated attractions, activities and more</h4>
                        </div>
                        <ul class="nav nav-tabs flex-column flex-sm-row" id="myTab" role="tablist">
                            <li class="nav-item mr-md-1">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-map-marker pr-1"></i> Places</a>
                            </li>
                            <li class="nav-item mr-md-1">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-microphone pr-1"></i> Events</a>
                            </li>
                            <li class="nav-item mr-md-1">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fa fa-home pr-1"></i> Property</a>
                            </li>
                        </ul>
                        <div class="tab-content bg-white p-5 rounded-bottom rounded-right" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4" placeholder="What are you looking for?" />
                                            <div class="lis-search">
                                                <i class="fa fa-search lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4" placeholder="Location" />
                                            <div class="lis-search">
                                                <i class="fa fa-map-o lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4">
                                                <option> All Categories</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <div class="lis-search">
                                                <i class="fa fa-tags lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <a href="#" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search pr-1"></i> Search</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4" placeholder="What are you looking for?" />
                                            <div class="lis-search">
                                                <i class="fa fa-search lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4" placeholder="Location" />
                                            <div class="lis-search">
                                                <i class="fa fa-map-o lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4">
                                                <option> All Categories</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <div class="lis-search">
                                                <i class="fa fa-tags lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <a href="#" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search pr-1"></i> Search</a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4" placeholder="What are you looking for?" />
                                            <div class="lis-search">
                                                <i class="fa fa-search lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4" placeholder="Location" />
                                            <div class="lis-search">
                                                <i class="fa fa-map-o lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-4">
                                        <div class="form-group">
                                            <select class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4">
                                                <option> All Categories</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                            <div class="lis-search">
                                                <i class="fa fa-tags lis-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <a href="#" class="btn btn-primary btn-block btn-lg"><i class="fa fa-search pr-1"></i> Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Page Inner -->

        <!-- Categories -->
        <section class="lis-grediant grediant-tb-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2 class="f-weight-500">Discover Our Featured Categories.</h2>
                            <h5 class="lis-light">Find the best places</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-lg-2 wow fadeInUp mb-4 mb-lg-0 text-center">
                        <a href="#" class="text-white">
                            <div class="lis-categories lis-bg1 rounded lis-font-poppins py-4">
                                <div class="text-white mb-2 h2"><i class="icofont icofont-hotel-alt"></i></div> Hotel
                                <div class="categories-listing lis-absolute lis-left-0 lis-right-0 invisible lis-font-roboto">
                                    11 Listing
                                </div>
                            </div> 
                        </a>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-2 wow fadeInUp mb-4 mb-lg-0 text-center">
                        <a href="#" class="text-white">
                            <div class="lis-categories lis-bg2 rounded lis-font-poppins py-4">
                                <div class="text-white mb-2 h2"><i class="icofont icofont-beer"></i></div>
                                Bar & Club
                                <div class="categories-listing lis-absolute lis-left-0 lis-right-0 invisible lis-font-roboto">
                                    12 Listing
                                </div>
                            </div> 
                        </a>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-2 wow fadeInUp mb-4 mb-lg-0 text-center">
                        <a href="#" class="text-white">
                            <div class="lis-categories lis-bg3 rounded lis-font-poppins py-4">
                                <div class="text-white mb-2 h2"><i class="icofont icofont-radio-mic"></i></div>
                                Entertainment
                                <div class="categories-listing lis-absolute lis-left-0 lis-right-0 invisible lis-font-roboto">
                                    13 Listing
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-2 wow fadeInUp mb-4 mb-sm-0 text-center">
                        <a href="#" class="text-white">
                            <div class="lis-categories lis-bg4 rounded lis-font-poppins py-4">
                                <div class="text-white mb-2 h2"><i class="icofont icofont-fast-food"></i></div>
                                Restaurant 
                                <div class="categories-listing lis-absolute lis-left-0 lis-right-0 invisible lis-font-roboto">
                                    14 Listing
                                </div>
                            </div> 
                        </a>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-2 wow fadeInUp mb-4 mb-sm-0 text-center">
                        <a href="#" class="text-white">
                            <div class="lis-categories lis-bg5 rounded lis-font-poppins py-4">
                                <div class="text-white mb-2 h2"><i class="icofont icofont-travelling"></i></div>
                                Tour & Travels
                                <div class="categories-listing lis-absolute lis-left-0 lis-right-0 invisible lis-font-roboto">
                                    15 Listing
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-4 col-lg-2 wow fadeInUp text-center">
                        <a href="#" class="text-white">
                            <div class="lis-categories lis-bg6 rounded lis-font-poppins py-4">
                                <div class="text-white mb-2 h2"><i class="icofont icofont-medical-sign-alt"></i></div>
                                Medical
                                <div class="categories-listing lis-absolute lis-left-0 lis-right-0 invisible lis-font-roboto">
                                    16 Listing
                                </div>
                            </div> 
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center mt-5">
                        <a href="#" class="btn btn-success btn-default">View More Featured Categories</a>
                    </div>
                </div>
            </div>
        </section>
        <!--End Categories -->

        <!-- Visited Places -->
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2 class="f-weight-500">Most Visited Places</h2>
                            <h5 class="lis-light">Discover & connect with top-rated local businesses</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-0">
                <div class="fullwidth-carousel-container center slider">
                    <div>
                        <div class="card lis-brd-light text-center text-lg-left">
                            <a href="#">
                                <div class="lis-grediant grediant-tb-light2 lis-relative modImage rounded-top">
                                    <img src="dist/images/img1.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>     
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="dist/images/card-logo.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
                                    <div class="media-body align-self-start mt-2">
                                        <h6 class="mb-0 lis-font-weight-600"><A href="#" class="lis-dark">Chico Express Car Taxi and Limo Service</A></h6>
                                    </div>
                                </div>
                                <ul class="list-unstyled my-4 lis-line-height-2">
                                    <li><i class="fa fa-phone pr-2"></i> +88 25 5894 2589</li>
                                    <li><i class="fa fa-map-o pr-2"></i> First Street, New York, USA</li>
                                </ul>
                                <div class="clearfix">
                                    <div class="float-none float-lg-left mb-3 mb-lg-0 mt-1">
                                        <A href="#" class="text-white"><i class="icofont icofont-travelling px-2 lis-bg5 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="lis-id-info lis-light p-2 lis-rounded-circle-50 lis-f-14">1 More...</A>
                                    </div>
                                    <div class="float-none float-lg-right mt-1">
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-envelope-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-green-light text-white text-white p-2 lis-rounded-circle-50 lis-f-14 lis-line-height-2"><i class="fa fa-star"></i> 4.0</A>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card lis-brd-light text-center text-lg-left">
                            <a href="#">
                                <div class="lis-grediant grediant-tb-light2 lis-relative modImage rounded-top">
                                    <img src="dist/images/img2.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>

                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Closed</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="dist/images/card-logo2.png" alt="" class="lis-mt-minus-15  img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
                                    <div class="media-body align-self-start mt-2">
                                        <h6 class="mb-0 lis-font-weight-600"><A href="#" class="lis-dark">Bodega Garage - Filipino Night Club</A></h6>
                                    </div>
                                </div>
                                <ul class="list-unstyled my-4 lis-line-height-2">
                                    <li><i class="fa fa-phone pr-2"></i> +88 25 5894 2589</li>
                                    <li><i class="fa fa-map-o pr-2"></i> First Street, New York, USA</li>
                                </ul>
                                <div class="clearfix">
                                    <div class="float-none float-lg-left mb-3 mb-lg-0 mt-1">
                                        <A href="#" class="text-white"><i class="icofont icofont-radio-mic px-2 lis-bg3 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="text-white"><i class="icofont icofont-beer px-2 lis-bg2 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="lis-id-info lis-light p-2 lis-rounded-circle-50 lis-f-14">1 More...</A>
                                    </div>
                                    <div class="float-none float-lg-right mt-1">
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-envelope-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-green-light text-white p-2 lis-rounded-circle-50 lis-f-14"><i class="fa fa-star"></i> 5.0</A>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card lis-brd-light text-center text-lg-left">
                            <a href="#">
                                <div class="lis-grediant grediant-tb-light2 lis-relative modImage rounded-top">
                                    <img src="dist/images/img3.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="dist/images/card-logo3.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
                                    <div class="media-body align-self-start mt-2">
                                        <h6 class="mb-0 lis-font-weight-600"><A href="#" class="lis-dark">Regal Cinemas Destiny USA 19 IMAX & RPX</A></h6>
                                    </div>
                                </div>
                                <ul class="list-unstyled my-4 lis-line-height-2">
                                    <li><i class="fa fa-phone pr-2"></i> +88 25 5894 2589</li>
                                    <li><i class="fa fa-map-o pr-2"></i> First Street, New York, USA</li>
                                </ul>
                                <div class="clearfix">
                                    <div class="float-none float-lg-left mb-3 mb-lg-0 mt-1">
                                        <A href="#" class="text-white"><i class="icofont icofont-radio-mic px-2 lis-bg3 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="lis-id-info lis-light p-2 lis-rounded-circle-50 lis-f-14">1 More...</A>
                                    </div>
                                    <div class="float-none float-lg-right mt-1">
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-envelope-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-green-light text-white p-2 lis-rounded-circle-50 lis-f-14"><i class="fa fa-star"></i> 4.5</A>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card lis-brd-light text-center text-lg-left">
                            <a href="#">
                                <div class="lis-grediant grediant-tb-light2 lis-relative modImage rounded-top">
                                    <img src="dist/images/img4.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Closed</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="dist/images/card-logo4.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
                                    <div class="media-body align-self-start mt-2">
                                        <h6 class="mb-0 lis-font-weight-600"><A href="#" class="lis-dark">Pembridge Palace Hotel and Resort</A></h6>
                                    </div>
                                </div>
                                <ul class="list-unstyled my-4 lis-line-height-2">
                                    <li><i class="fa fa-phone pr-2"></i> +88 25 5894 2589</li>
                                    <li><i class="fa fa-map-o pr-2"></i>First Street, New York, USA</li>
                                </ul>
                                <div class="clearfix">
                                    <div class="float-none float-lg-left mb-3 mb-lg-0 mt-1">
                                        <A href="#" class="text-white"><i class="icofont icofont-hotel-alt px-2 lis-bg1 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="text-white"><i class="icofont icofont-fast-food px-2 lis-bg2 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="lis-id-info lis-light p-2 lis-rounded-circle-50 lis-f-14">2 More...</A>
                                    </div>
                                    <div class="float-none float-lg-right mt-1">
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-envelope-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-green-light text-white p-2 lis-rounded-circle-50 lis-f-14"><i class="fa fa-star"></i> 4.5</A>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card lis-brd-light text-center text-lg-left">
                            <a href="#">
                                <div class="lis-grediant grediant-tb-light2 lis-relative modImage rounded-top">
                                    <img src="dist/images/img5.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="dist/images/card-logo5.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
                                    <div class="media-body align-self-start mt-2">
                                        <h6 class="mb-0 lis-font-weight-600"><A href="#" class="lis-dark">Vintage Italian Beer Bar & Restaurant</A></h6>
                                    </div>
                                </div>
                                <ul class="list-unstyled my-4 lis-line-height-2">
                                    <li><i class="fa fa-phone pr-2"></i> +88 25 5894 2589</li>
                                    <li><i class="fa fa-map-o pr-2"></i> First Street, New York, USA</li>
                                </ul>
                                <div class="clearfix">
                                    <div class="float-none float-lg-left mb-3 mb-lg-0 mt-1">
                                        <A href="#" class="text-white"><i class="icofont icofont-travelling px-2 lis-bg5 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="lis-id-info lis-light p-2 lis-rounded-circle-50 lis-f-14">1 More...</A>
                                    </div>
                                    <div class="float-none float-lg-right mt-1">
                                        <a href="#" class="lis-light lis-f-14"><i class="fa fa-envelope-o lis-id-info  lis-rounded-circle-50 text-center"></i></a>
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-green-light text-white p-2 lis-rounded-circle-50 lis-f-14"><i class="fa fa-star"></i> 4.0</A>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card lis-brd-light text-center text-lg-left">
                            <a href="#">
                                <div class="lis-grediant grediant-tb-light2 lis-relative modImage rounded-top">
                                    <img src="dist/images/img12.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="dist/images/card-logo6.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
                                    <div class="media-body align-self-start mt-2">
                                        <h6 class="mb-0 lis-font-weight-600"><A href="#" class="lis-dark">Vintage Italian Beer Bar & Restaurant</A></h6>
                                    </div>
                                </div>
                                <ul class="list-unstyled my-4 lis-line-height-2">
                                    <li><i class="fa fa-phone pr-2"></i> +88 25 5894 2589</li>
                                    <li><i class="fa fa-map-o pr-2"></i> First Street, New York, USA</li>
                                </ul>
                                <div class="clearfix">
                                    <div class="float-none float-lg-left mb-3 mb-lg-0 mt-1">
                                        <A href="#" class="text-white"><i class="icofont icofont-travelling px-2 lis-bg5 py-2 lis-rounded-circle-50 lis-f-14"></i></A>
                                        <A href="#" class="lis-id-info lis-light p-2 lis-rounded-circle-50 lis-f-14">1 More...</A>
                                    </div>
                                    <div class="float-none float-lg-right mt-1">
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-envelope-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></A>
                                        <A href="#" class="lis-green-light text-white p-2 lis-rounded-circle-50 lis-f-14"><i class="fa fa-star"></i> 4.0</A>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Visited Places -->

        <!-- Features -->
        <section class="image-bg lis-grediant grediant-full">
            <div class="background-image-maker"></div>
            <div class="holder-image">
                <img src="dist/images/bg2.jpg" alt="" class="img-fluid d-none">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2>Get Associated With Us</h2>
                            <h5 class="font-weight-normal">Expolore top-rated attractions, activities and more</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 text-center wow fadeInUp mb-5 mb-md-0">
                        <div class="lis-features-box lis-brd-light border rounded px-4 py-5">
                            <div  class="h1"><i class="fa fa-address-card-o h1"></i></div>
                            <h5>Add Your Listing</h5>
                            Maecs tempus, tellus eget rhoncus, sem condimentum quam semper libero.
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center wow fadeInUp mb-5 mb-md-0">
                        <div class="lis-features-box lis-brd-light border rounded px-4 py-5">
                            <div  class="h1"><i class="fa fa-bullhorn h1"></i></div>
                            <h5>Advertise & Promote</h5>
                            Maecs tempus, tellus eget rhoncus, sem condimentum quam semper libero.
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center wow fadeInUp">
                        <div class="lis-features-box lis-brd-light border rounded px-4 py-5">
                            <div  class="h1"><i class="fa fa-handshake-o h1"></i></div>
                            <h5>Partner With Us</h5>
                            Maecs tempus, tellus eget rhoncus, sem condimentum quam semper libero.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Features -->

        <!-- Upcoming Events -->
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2>Upcoming Events</h2>
                            <h5 class="font-weight-normal lis-light">Discover & connect with top-rated local businesses</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-5 mb-lg-0">
                        <div class="card lis-brd-light bg-transparent">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded-top">
                                    <img src="dist/images/img6.jpg" alt="" class="img-fluid rounded-top w-100">
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Oct 18-20</div>
                                </div>
                            </a>    
                            <div class="card-body">
                                <div class="media d-block d-sm-flex text-center text-sm-left">
                                    <div class="d-block d-sm-flex">
                                        <ul class="list-unstyled my-0">
                                            <li class="lis-font-weight-600 mb-2 h6"><a href="#" class="lis-dark">Enchanted Valley Carnival</a></li>
                                            <li><i class="fa fa-map-o pr-2"></i> Bishop Avenue, New York</li>
                                        </ul>
                                    </div>
                                    <div class="media-body align-self-center text-center text-sm-right mt-3 mt-sm-0">
                                        <a href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-5 mb-lg-0">
                        <div class="card lis-brd-light bg-transparent">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded-top">
                                    <img src="dist/images/img7.jpg" alt="" class="img-fluid rounded-top w-100">
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Nov 13-15</div>
                                </div>
                            </a>     
                            <div class="card-body">
                                <div class="media d-block d-sm-flex text-center text-sm-left">
                                    <div class="d-block d-sm-flex">
                                        <ul class="list-unstyled my-0">
                                            <li class="lis-font-weight-600 mb-2 h6"><a href="#" class="lis-dark">Timeout 72 Hours</a></li>
                                            <li><i class="fa fa-map-o pr-2"></i> North Street, New York, USA</li>
                                        </ul>
                                    </div>
                                    <div class="media-body align-self-center text-center text-sm-right mt-3 mt-sm-0">
                                        <a href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-4 mb-lg-0">
                        <div class="card lis-brd-light bg-transparent">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded-top">
                                    <img src="dist/images/img8.jpg" alt="" class="img-fluid rounded-top w-100">
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Dec 28-31</div>
                                </div>
                            </a>    
                            <div class="card-body">
                                <div class="media d-block d-sm-flex text-center text-sm-left">
                                    <div class="d-block d-sm-flex">
                                        <ul class="list-unstyled my-0">
                                            <li class="lis-font-weight-600 mb-2 h6"><a href="#" class="lis-dark">VH1 Supersonic 2018</a></li>
                                            <li><i class="fa fa-map-o pr-2"></i> Bishop Avenue, New York</li>
                                        </ul>
                                    </div>
                                    <div class="media-body align-self-center text-center text-sm-right mt-3 mt-sm-0">
                                        <a href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></a>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Upcoming Events -->

        <!-- Featured Property -->
        <section class="lis-bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2>Featured Properties</h2>
                            <h5 class="font-weight-normal lis-light">Discover & connect with top-rated local businesses</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-5 mb-lg-0">
                        <div class="card lis-brd-light">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded-top">
                                    <img src="dist/images/img9.jpg" alt="" class="img-fluid rounded-top w-100">
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">For Sale</div>
                                </div>
                            </a>    
                            <div class="card-body">
                                <h6 class="lis-font-weight-600 mb-2"><a href="#" class="lis-dark">Villa in Melbourne City</a></h6>
                                <ul class="list-unstyled mt-0">
                                    <li><i class="fa fa-map-o pr-2"></i>1903 Hollywood, NJ 85624, USA</li>
                                </ul>
                                <div class="media pt-2">
                                    <div class="d-flex">
                                        <h5 class="lis-primary mb-0"><span class="lis-f-14 lis-dark">Price:</span> $13,80,000 </h5>
                                    </div>
                                    <div class="media-body align-self-center text-right">
                                        <a href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></a>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="lis-devider"></div>
                            <ul class="list-inline mb-0 text-center lis-property-meta">
                                <li class="list-inline-item lis-brd-right lis-brd-light lis-meta-block float-left"><i class="fa fa-object-group pr-1"></i> 5842 m2</li>
                                <li class="list-inline-item lis-brd-right lis-brd-light lis-meta-block float-left"><i class="fa fa-bed pr-1"></i> 4 Bed</li>
                                <li class="list-inline-item lis-meta-block float-left"><i class="fa fa-bath pr-1"></i> 3 Bath</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-5 mb-lg-0">
                        <div class="card lis-brd-light">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded-top">
                                    <img src="dist/images/img10.jpg" alt="" class="img-fluid rounded-top w-100">
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">For Rent</div>
                                </div>
                            </a>    
                            <div class="card-body">
                                <h6 class="lis-font-weight-600 mb-2"><A href="#" class="lis-dark">Family House in Omaha</A></h6>
                                <ul class="list-unstyled mt-0">
                                    <li><i class="fa fa-map-o pr-2"></i>15421 Southwest, NJ 32568, USA</li>
                                </ul>
                                <div class="media pt-2">
                                    <div class="d-flex">
                                        <h5 class="lis-primary mb-0"><span class="lis-f-14 lis-dark">Price:</span> $2,500 <small class="lis-light">/month</small> </h5>
                                    </div>
                                    <div class="media-body align-self-center text-right">
                                        <a href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></a>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="lis-devider"></div>
                            <ul class="list-inline mb-0 text-center lis-property-meta">
                                <li class="list-inline-item lis-brd-right lis-brd-light lis-meta-block float-left"><i class="fa fa-object-group pr-1"></i> 2018 m2</li>
                                <li class="list-inline-item lis-brd-right lis-brd-light lis-meta-block float-left"><i class="fa fa-bed pr-1"></i> 2 Bed</li>
                                <li class="list-inline-item lis-meta-block float-left"><i class="fa fa-bath pr-1"></i> 1 Bath</li>
                            </ul>
                        </div> 
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-5 mb-lg-0">
                        <div class="card lis-brd-light">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded-top">
                                    <img src="dist/images/img11.jpg" alt="" class="img-fluid rounded-top w-100">
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">For Rent</div>
                                </div>
                            </a>   
                            <div class="card-body">
                                <h6 class="lis-font-weight-600 mb-2"><A href="#" class="lis-dark">Park Avenue Apartment </A></h6>
                                <ul class="list-unstyled mt-0">
                                    <li><i class="fa fa-map-o pr-2"></i>14228 Townshire Drive, NJ 06589, USA</li>
                                </ul>
                                <div class="media pt-2">
                                    <div class="d-flex">
                                        <h5 class="lis-primary mb-0"><span class="lis-f-14 lis-dark">Price:</span> $3,100 <small class="lis-light">/month</small> </h5>
                                    </div>
                                    <div class="media-body align-self-center text-right">
                                        <a href="#" class="lis-light lis-f-14"><i class="fa fa-heart-o lis-id-info  lis-rounded-circle-50 text-center"></i></a>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="lis-devider"></div>
                            <ul class="list-inline mb-0 text-center lis-property-meta">
                                <li class="list-inline-item lis-brd-right lis-brd-light lis-meta-block float-left"><i class="fa fa-object-group pr-1"></i> 3258 m2</li>
                                <li class="list-inline-item lis-brd-right lis-brd-light lis-meta-block float-left"><i class="fa fa-bed pr-1"></i> 4 Bed</li>
                                <li class="list-inline-item lis-meta-block float-left"><i class="fa fa-bath pr-1"></i> 2 Bath</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Featured Property -->

        <!-- Work -->
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2>How Does It Work</h2>
                            <h5 class="font-weight-normal lis-light">Discover & connect with top-rated local businesses</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-4 text-center wow fadeInUp mb-5 mb-md-0">
                        <div class="icon-box box-line box-line-dotted1 lis-relative">
                            <img src="dist/images/icon-1.png" alt="" class="img-fluid mb-4 z-index-99  lis-relative" />
                            <h5>1. Find Interesting Place</h5>
                            <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center wow fadeInUp mb-5 mb-md-0">
                        <div class="icon-box box-line box-line-dotted2 lis-relative">
                            <img src="dist/images/icon-2.png" alt="" class="img-fluid mb-4 z-index-99  lis-relative" />
                            <h5>2. Choose a Category</h5>
                            <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-center wow fadeInUp mb-5 mb-md-0">
                        <div class="icon-box">
                            <img src="dist/images/icon-3.png" alt="" class="img-fluid mb-4 z-index-99  lis-relative" />
                            <h5>3. Contact with Owners</h5>
                            <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Work -->

       

        <!-- Blog -->
        <section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2>Letest Tips &amp; Blog</h2>
                            <h5 class="font-weight-normal lis-light">Discover &amp; connect with top-rated local businesses</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-5 mb-lg-0">
                        <div class="card border-0 lis-relative">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded">
                                    <img src="dist/images/blog1.jpg" alt="" class="img-fluid rounded">
                                </div> 

                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Bar &amp; Club</div>
                                </div>
                            </a>    
                            <div class="pt-4">
                                <span class="lis-light">16 October 2017</span>
                                <a href="#" class="lis-dark"><h6 class="mt-2">Donec vitae sapien ut libero></h6></a>
                                <p>Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus nullam accumsan dui.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp mb-5 mb-lg-0">
                        <div class="card border-0 lis-relative">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded">
                                    <img src="dist/images/blog2.jpg" alt="" class="img-fluid rounded">
                                </div> 
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Bar &amp; Club</div>
                                </div>
                            </a>
                            <div class="pt-4">
                                <span class="lis-light">24 October 2017</span>
                                <a href="#" class="lis-dark"><h6 class="mt-2">Donec vitae sapien ut libero></h6></a>
                                <p>Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus nullam accumsan dui.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 wow fadeInUp">
                        <div class="card border-0 lis-relative">
                            <a href="#">
                                <div class="modImage lis-grediant grediant-tb-light2 lis-relative rounded">
                                    <img src="dist/images/bg2.jpg" alt="" class="img-fluid rounded">
                                </div> 
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Bar &amp; Club</div>
                                </div>
                            </a>    
                            <div class="pt-4">
                                <span class="lis-light">30 October 2017</span>
                                <a href="#" class="lis-dark"><h6 class="mt-2">Donec vitae sapien ut libero></h6></a>
                                <p>Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus nullam accumsan dui.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Blog -->

        <!-- Call To Action -->
        <section class="lis-bg-primary py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 text-center wow fadeInUp">
                        <div class="heading">
                            <h2 class="text-uppercase lis-line-height-1_5 text-white">WE WOULD LOVE TO HEAR ABOUT START YOUR NEW PROJECT?</h2>
                            <a href="#" class="btn btn-outline-light btn-default text-uppercase">Add Your Listing Here</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End Call To Action -->

        <!-- Footer-->
        <section class="image-bg footer lis-grediant grediant-bt pb-0">
            <div class="background-image-maker"></div>
            <div class="holder-image">
                <img src="dist/images/bg3.jpg" alt="" class="img-fluid d-none">
            </div>
            <div class="container">
                <div class="row pb-5">
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                                <h5 class="footer-head">Useful Links</h5>
                                <ul class="list-unstyled footer-links lis-line-height-2_5">
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Add Listing</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Sign In</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Register</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Pricing</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Contact Us</A></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-lg-0">
                                <h5 class="footer-head">My Account</h5>
                                <ul class="list-unstyled footer-links lis-line-height-2_5">
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Dashboard</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Profile</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> My Listing</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Favorites</A></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 mb-4 mb-md-0">
                                <h5 class="footer-head">Pages</h5>
                                <ul class="list-unstyled footer-links lis-line-height-2_5">
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Blog</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Our Partners</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> How It Work</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Privacy Policy</A></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <h5 class="footer-head">Help</h5>
                                <ul class="list-unstyled footer-links lis-line-height-2_5">
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Add Listing</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Sign In</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Register</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Pricing</A></li>
                                    <li><A href="#"><i class="fa fa-angle-right pr-1"></i> Contact Us</A></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="footer-logo">
                            <a href="#"><img src="dist/images/logo-v1.png" alt="" class="img-fluid" /></a> 
                        </div>
                        <p class="my-4">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu in  felis eu pede mollis enim.</p>
                        <a href="#" class="text-white"><u>App Download</u></a> 
                        <ul class="list-inline mb-0 mt-2">
                            <li class="list-inline-item"><A href="#"><img src="dist/images/play-store.png" alt="" class="img-fluid" /></a></li>
                            <li class="list-inline-item"><A href="#"><img src="dist/images/google-play.png" alt="" class="img-fluid" /></a></li>
                            <li class="list-inline-item"><A href="#"><img src="dist/images/windows.png" alt="" class="img-fluid" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom mt-5 py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6 text-center text-md-left mb-3 mb-md-0">
                            <span> &copy; 2017 Lister. Powered by <a href="#" class="lis-primary">PSD2allconversion.</a></span>
                        </div> 
                        <div class="col-12 col-md-6 text-center text-md-right">
                            <ul class="list-inline footer-social mb-0">
                                <li class="list-inline-item pr-3"><A href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="list-inline-item pr-3"><A href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item pr-3"><A href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="list-inline-item pr-3"><A href="#"><i class="fa fa-tumblr"></i></a></li>
                                <li class="list-inline-item"><A href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
        <!--End  Footer-->

        <!-- Top To Bottom-->
        <a href="#" class="scrollup text-center lis-bg-primary lis-rounded-circle-50"> 
            <div class="text-white mb-0 lis-line-height-1_7 h3"><i class="icofont icofont-long-arrow-up"></i></div>
        </a>


        <!-- End Top To Bottom-->

        <!-- Login /Register Form-->
        <div class="container">


            <div id="modal" class="popupContainer" style="display: none;">
                <header class="popupHeader">
                    <span class="header_title">Login</span>
                    <span class="modal_close"><i class="fa fa-times"></i></span>
                </header>

                <div class="popupBody">
                    <!-- Social Login -->						

                    <!-- Username & Password Login form -->
                    <div class="user_login">
                        <form>

                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 " placeholder="username or email address" />
                            <br />


                            <input type="password" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 " placeholder="password" />
                            <br />

                            <div class="checkbox">
                                <input id="remember" type="checkbox" />
                                <label for="remember">Remember me on this computer</label>
                            </div>

                            <div class="action_btns">

                                <a href="#" class="btn btn-primary btn-default mt-3 w-100">Login</a>
                            </div>
                        </form>
                        <br/>
                        Sign in with your social network<br/>
                        <ul class="list-inline my-0">
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-linkedin"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-tumblr"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                        <hr/>
                        Don't have an account <a href="#" class="register_form">Sign Up</a>
                    </div>

                    <!-- Register Form -->
                    <div class="user_register">
                        <form>

                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Username" />
                            <br />


                            <input type="email" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Email Address" />
                            <br />


                            <input type="password" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Password" />
                            <br />

                            <div class="checkbox">
                                <input id="send_updates" type="checkbox" />
                                <label for="send_updates">Send me occasional email updates</label>
                            </div>

                            <div class="action_btns">
                                <a href="#" class="btn btn-primary btn-default mt-3 w-100">Register</a>
                            </div>
                        </form>
                        <br/>
                        Register with your social network<br/>
                        <ul class="list-inline my-0">
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-linkedin"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-tumblr"></i></a></li>
                            <li class="list-inline-item mr-0"><a href="#" class="lis-light lis-social border lis-brd-light text-center lis-line-height-2_3 rounded d-block"><i class="fa fa-pinterest-p"></i></a></li>
                        </ul>
                        <hr/>
                        Already have an account <a href="#" class="login_form">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Login /Register Form-->



        <!-- jQuery -->
        <script src="dist/js/plugins.min.js"></script>
        <script src="dist/js/common.js"></script>
    </body>
</html>
