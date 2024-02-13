<div id="header-fix" class="header fixed-top transperant">
            <nav class="navbar navbar-toggleable-md navbar-expand-lg navbar-light py-lg-0 py-4">
                <a class="navbar-brand mr-4 mr-md-5" href="index.html"><img src="/images/logo-v1.png" alt=""></a> 
                <!-- Mobile Menu -->
                <div id="dl-menu" class="dl-menuwrapper d-block d-lg-none float-right">
                    <button>Open Menu</button>
                    <ul class="dl-menu">

                        <li class="nav-item active dropdown">
                            <a class="nav-link" href="#"  aria-expanded="false">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#tags"  aria-expanded="false">Tags</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#bookmarks"  aria-expanded="false">Bookmarks</a>
                        </li>
                        <li> <a href="add-listing.html" ><i class="fa fa-plus pr-1"></i> Add Tag</a></li>
                        
                    </ul>
                </div>
                <!-- END Mobile Menu -->
                
                <!-- Desktop Menu -->
                <div class="collapse navbar-collapse d-none d-lg-block" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" aria-expanded="false">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#tags"  aria-expanded="false">Tags</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#bookmarks"  aria-expanded="false">Bookmarks</a>
                        </li>
                        
                    </ul>
                    
                    <a href="add-listing.html" class="btn btn-outline-light btn-sm ml-0 ml-lg-4 mt-3 mt-lg-0"><i class="fa fa-plus pr-1"></i> Add Bookmark</a>
                    <?= $this->Form->create('Search', array('action'=>'isFeatured'));
                </div>
                <!-- END Desktop Menu -->
            </nav>                    
        </div>
        <?= $this->element('pageInner')?>