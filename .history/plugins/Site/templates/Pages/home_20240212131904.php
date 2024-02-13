<body>
        <!-- header -->
        <?= $this->element('header')?>
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

        <?= $this->element('bookmarkCard')?> 

       

        <!-- Top To Bottom-->
        


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
        <?= $this->Html->script(["/js/plugins.min.js","/js/common.js"]) ?>
    </body>