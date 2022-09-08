﻿<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="Mylord@steb">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="vendor/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="css/style.css?time=<?php echo time(); ?>" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
   <div id="preloader" style="display: none;">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<?php

			include('menu.php')

		?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-primary">Nouveau message</h3>
                                <hr style="color: #aaa;">
                                <div class="email-right-box ms-0 ms-sm-4 ms-sm-0">
                                    <div class="toolbar mb-4" role="toolbar">
                                        <div class="btn-group mb-1">
                                            <button type="button" class="btn btn-primary light px-3"><i class="fa fa-archive"></i></button>
                                            <button type="button" class="btn btn-primary light px-3"><i class="fa fa-exclamation-circle"></i></button>
                                            <button type="button" class="btn btn-primary light px-3"><i class="fa fa-trash"></i></button>
                                        </div>
                                        
                                        <div class="btn-group mb-1">
                                            <button type="button" class="btn btn-primary light dropdown-toggle px-3" data-bs-toggle="dropdown">
												<i class="fa fa-tag"></i> <b class="caret m-l-5"></b>
                                            </button>
                                            <div class="dropdown-menu"> 
												<a class="dropdown-item" href="javascript: void(0);">Updates</a> 
												<a class="dropdown-item" href="javascript: void(0);">Social</a> 
												<a class="dropdown-item" href="javascript: void(0);">Promotions</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Forums</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="compose-content">
                                        <form action="#">
                                            <div class="mb-3">
                                                <input type="text" class="form-control bg-transparent" placeholder=" A :">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control bg-transparent" placeholder=" Sujet :">
                                            </div>
                                            <div class="mb-3">
                                                <textarea id="email-compose-editor" class="textarea_editor form-control bg-transparent" rows="15" placeholder="Entrez texte ..."></textarea>
                                            </div>
                                        </form>
                                        <h5 class="mb-4"><i class="fa fa-paperclip"></i> Attatchez fichier</h5>
										<form action="#" class="dropzone">
											<div class="fallback">
												<input name="file" type="file" multiple="">
											</div>
										</form>
                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="button"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Envoyer</button>
                                        <button class="btn btn-danger light btn-sl-sm" type="button"><span class="me-2"><i class="fa fa-times"></i></span>Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">StebDesign</a> 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendor/dropzone/dist/dropzone.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
	
</body>
</html>