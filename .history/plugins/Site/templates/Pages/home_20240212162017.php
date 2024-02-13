<body>
        <?= $this->element('bookmarkCard')?> 
        <div class="container">


            <div id="modal" class="popupContainer" style="display: none;">
                <header class="popupHeader">
                    <span class="header_title">Login</span>
                    <span class="modal_close"><i class="fa fa-times"></i></span>
                </header>

                
            </div>
        </div>
        <!-- End Login /Register Form-->



        <!-- jQuery -->
        <?= $this->Html->script(["/js/plugins.min.js","/js/common.js"]) ?>
    </body>