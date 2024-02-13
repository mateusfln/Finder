<body>
        
        <?= $this->element('bookmarkCard')?> 
        <?= $this->element('footer')?>
        <?= $this->element('topToBottom')?>
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