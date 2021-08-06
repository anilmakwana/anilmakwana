<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Rubik:300,400,500,700,900" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link href="images/favicon.ico" rel="icon" type="image/x-icon" />
</head>

<body class="fixed-left">
<section class="login-sign-up-wrapper">
    <div class="container">
        <div class="row align-items-center full-height">
            <div class="col-12 col-xl-6 mx-auto m-w-600">
                <div class="bg-white rounded pt-15 pt-lg-30">
                    <div class="logo-wrapper text-center mb-15 mb-lg-30 mt-10 mt-lg-5 px-15 px-md-30"><a href="index.html" title="Redefine Team"><img src="images/logo-dark.png" alt="Redefine Team" /></a></div>
                    <div class="title-style-1 title-with-border title-with-small-border px-30 px-md-30">Login Form</div>
                    <div class="p-30 px-md-80">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group position-relative">
                                <label for=""> Email</label>
                                <input class="form-control" name="email" placeholder="Enter your username" type="text">
                                <div class="pre-icon"> <i class="far fa-user-circle"></i></div>
                            </div>
                            <div class="form-group position-relative">
                                <label for=""> Password</label>
                                <input class="form-control" name="password" placeholder="Enter your password" type="password">
                                <div class="pre-icon fingerprint"><i class="fas fa-fingerprint"></i></div>
                            </div>
                           
                            <div class="buttons-w"> 
                                <button class="btn btn-info">Login</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> 
<script type="text/javascript" src="js/bootstrap/popper.min.js"></script> 
<script type="text/javascript" src="js/bootstrap/bootstrap.min.js"></script> 
<script type="text/javascript" src="js/fontawesome/fontawesome.js"></script> 
<script type="text/javascript" src="js/fontawesome/solid.js"></script> 
<script type="text/javascript" src="js/fontawesome/brands.js"></script> 
<script type="text/javascript" src="js/fontawesome/regular.js"></script> 
<script type="text/javascript" src="js/detect/detect.js"></script> 
<script type="text/javascript" src="js/jquery-slimScroll/jquery.slimscroll.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>