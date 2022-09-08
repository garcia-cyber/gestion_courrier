<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="Mylord@steb">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Admin Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/big-wind.png">
	<link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css?time=<?php echo time(); ?>" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
   <div id="preloader" style="display:none;">
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

			include('menu-drcb.php')

		?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <br>
        <div class="content-body">
            <div class="container-fluid">
				
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-primary">Boite de reception</h3>
                                <hr style="color: #aaa;">
                                <div class="email-right-box ms-0 ms-sm-4 ms-sm-0">
                                    <div role="toolbar" class="toolbar ms-1 ms-sm-0">
                                        <div class="btn-group mb-1">
											<div class="form-check custom-checkbox">
												<input type="checkbox" class="form-check-input" id="checkAll">
												<label class="form-check-label" for="checkAll"></label>
											</div>
										</div>
                                        <div class="btn-group mb-1">
                                            <button class="btn btn-primary light px-3" type="button"><i class="ti-reload"></i>
                                            </button>
                                        </div>
                                        <div class="btn-group mb-1">
                                            <button aria-expanded="false" data-bs-toggle="dropdown" class="btn btn-primary px-3 light dropdown-toggle" type="button">Voir plus <span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu"> <a href="javascript: void(0);" class="dropdown-item">Mark as Unread</a> <a href="javascript: void(0);" class="dropdown-item">Add to Tasks</a>
                                                <a href="javascript: void(0);" class="dropdown-item">Add Star</a> <a href="javascript: void(0);" class="dropdown-item">Mute</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="email-list mt-3">
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox2">
															<label class="form-check-label" for="checkbox2"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox3">
															<label class="form-check-label" for="checkbox3"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox4">
															<label class="form-check-label" for="checkbox4"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox5">
															<label class="form-check-label" for="checkbox5"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox6">
															<label class="form-check-label" for="checkbox6"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox7">
															<label class="form-check-label" for="checkbox7"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox8">
															<label class="form-check-label" for="checkbox8"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message unread">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox9">
															<label class="form-check-label" for="checkbox9"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message unread">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox10">
															<label class="form-check-label" for="checkbox10"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox11">
															<label class="form-check-label" for="checkbox11"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox12">
															<label class="form-check-label" for="checkbox12"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox13">
															<label class="form-check-label" for="checkbox13"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox14">
															<label class="form-check-label" for="checkbox14"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message unread">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox15">
															<label class="form-check-label" for="checkbox15"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox16">
															<label class="form-check-label" for="checkbox16"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox17">
															<label class="form-check-label" for="checkbox17"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox18">
															<label class="form-check-label" for="checkbox18"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Ingredia Nutrisha, A collection of textile samples lay spread out on the table - Samsa was a travelling salesman - and above it there hung a picture</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox19">
															<label class="form-check-label" for="checkbox19"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message unread">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox20">
															<label class="form-check-label" for="checkbox20"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="message">
                                            <div>
                                                <div class="d-flex message-single">
                                                    <div class="ps-1 align-self-center">
														<div class="form-check custom-checkbox">
															<input type="checkbox" class="form-check-input" id="checkbox21">
															<label class="form-check-label" for="checkbox21"></label>
														</div>
													</div>
                                                    <div class="ms-2">
                                                        <button class="border-0 bg-transparent align-middle p-0"><i class="fa fa-star" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                                <a href="email-read.html" class="col-mail col-mail-2">
                                                    <div class="subject">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of</div>
                                                    <div class="date">11:49 am</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- panel -->
                                    <div class="row mt-4">
                                        <div class="col-12 ps-3">
                                            <nav>
												<ul class="pagination pagination-gutter pagination-primary pagination-sm no-bg">
													<li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-left"></i></a></li>
													<li class="page-item "><a class="page-link" href="javascript:void()">1</a></li>
													<li class="page-item active"><a class="page-link" href="javascript:void()">2</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void()">3</a></li>
													<li class="page-item"><a class="page-link" href="javascript:void()">4</a></li>
													<li class="page-item page-indicator"><a class="page-link" href="javascript:void()"><i class="la la-angle-right"></i></a></li>
												</ul>
											</nav>
                                        </div>
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
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
	
</body>
</html>