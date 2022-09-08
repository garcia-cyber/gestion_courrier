<!DOCTYPE html>
<html lang="en" class="h-100">

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
    <link href="css/style.css?time=<?php echo time(); ?>" rel="stylesheet">
    <style type="text/css">

        body{
            background-color: #fff;
        }

    </style>

</head>

<body class="vh-100" >
    <div class=" h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content" style="background: #aaaa;">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/big-wind.png" alt="" style="width:120px;height: 120px;border-radius: 100%;"></a>
									</div>
                                    <h3 class="text-center mb-4 ">Connectez vous</h3>
                                    <form action="index.html">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control" value="hello@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Mot de passe</strong></label>
                                            <input type="password" class="form-control" value="Password">
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                           
                                            <div class="mb-3">
                                                <a href="page-forgot-password.php">Mot de passe oublié?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
	<script src="js/styleSwitcher.js"></script>
</body>
</html>