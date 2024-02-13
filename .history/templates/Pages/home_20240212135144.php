<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Reributions of files must retain the above copyright notice.
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
                <a class="navbar-brand mr-4 mr-md-5" href="index.html"><?= ?><img src="logo-v1.png" alt=""></a> 

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
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Bookmarks</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown" aria-expanded="false">Tags</a>
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
                <img src="/images/bg1.jpg" alt="" class="img-fluid d-none">
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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-tag pr-1"></i> Tags</a>
                            </li>
                        </ul>
                        <div class="tab-content bg-white p-5 rounded-bottom rounded-right" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0 pl-4" placeholder="Que tag você gostaria de buscar?" />
                                            <div class="lis-search">
                                                <i class="fa fa-search lis-primary"></i>
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
                                    <img src="/images/img1.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>     
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="/images/card-logo.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
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
                                    <img src="/images/img2.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>

                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Closed</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="/images/card-logo2.png" alt="" class="lis-mt-minus-15  img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
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
                                    <img src="/images/img3.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="/images/card-logo3.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
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
                                    <img src="/images/img4.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Closed</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="/images/card-logo4.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
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
                                    <img src="/images/img5.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="/images/card-logo5.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
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
                                    <img src="/images/img12.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                                <div class="lis-absolute lis-right-20 lis-top-20">
                                    <div class="lis-post-meta border border-white text-white rounded lis-f-14">Open</div>
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="/images/card-logo6.png" alt="" class="lis-mt-minus-15 img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
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

        <!-- Footer-->
        <section class="image-bg footer lis-grediant grediant-bt pb-0">
            <div class="background-image-maker"></div>
            <div class="holder-image">
                <img src="/images/bg3.jpg" alt="" class="img-fluid d-none">
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
                            <a href="#"><img src="/images/Finder.png" alt="" class="img-fluid" /></a> 
                        </div>
                        <p class="my-4">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu in  felis eu pede mollis enim.</p>
                        <a href="#" class="text-white"><u>App Download</u></a> 
                        <ul class="list-inline mb-0 mt-2">
                            <li class="list-inline-item"><A href="#"><img src="/images/play-store.png" alt="" class="img-fluid" /></a></li>
                            <li class="list-inline-item"><A href="#"><img src="/images/google-play.png" alt="" class="img-fluid" /></a></li>
                            <li class="list-inline-item"><A href="#"><img src="/images/windows.png" alt="" class="img-fluid" /></a></li>
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
        <script src="/js/plugins.min.js"></script>
        <script src="/js/common.js"></script>
    </body>
</html>
