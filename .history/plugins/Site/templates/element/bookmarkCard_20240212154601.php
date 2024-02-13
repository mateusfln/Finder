
<section>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 text-center">
                        <div class="heading pb-4">
                            <h2 class="f-weight-500">Bookmarks</h2>
                            <h5 class="lis-light">Descubra nossos Bookmarks</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-0">
                <div class="fullwidth-carousel-container center slider">
                    <?php
                         foreach($bookmark as $book ):?>
                         <div>
                        <div class="card lis-brd-light text-center text-lg-left">
                            <a href=<php? ?>>
                                <div class="lis-grediant grediant-tb-light2 lis-relative modImage rounded-top">
                                    <img src="/images/img2.jpg" alt="" class="img-fluid rounded-top w-100" />
                                </div>
                            </a>    
                            <div class="card-body pt-0">
                                <div class="media d-block d-lg-flex lis-relative">
                                    <img src="/images/card-logo2.png" alt="" class="lis-mt-minus-15  img-fluid d-lg-flex mx-auto mr-lg-3 mb-4 mb-lg-0 border lis-border-width-2 rounded-circle border-white" width="80" />
                                    <div class="media-body align-self-start mt-2">
                                        <h6 class="mb-0 lis-font-weight-600"><A href="#" class="lis-dark"><?= $book->title ?></A></h6>
                                    </div>
                                </div>
                                <ul class="list-unstyled my-4 lis-line-height-2">
                                    <li><i class="fa fa-star pr-2"></i> <?= $book->description ?></li>
                                    <li class="user-select-all"><i class="fa fa-link pr-2" ></i> <?= $book->url ?></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>