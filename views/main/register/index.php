<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/MVC_PHONG/public/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/css/util.css">
    <link rel="stylesheet" type="text/css" href="/MVC_PHONG/public/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('/MVC_PHONG/public/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                <form action="" method="POST" class="login100-form validate-form">

                    <span class="login100-form-title p-b-49">
                        Register
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Type your email">
                        <span class="focus-input100" data-symbol="&#9993;"></span>
                    </div>


                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Type your username">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>



                    <div class="wrap-input100 validate-input m-b-23" data-validate="First is required">
                        <span class="label-input100">First Name</span>
                        <input class="input100" type="text" name="first_name" placeholder="Type your first name">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Last name is required">
                        <span class="label-input100">Last name</span>
                        <input class="input100" type="text" name="last_name" placeholder="Type your last name">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Age is required">
                        <span class="label-input100">Age</span>
                        <input class="input100" type="text" name="age" placeholder="Type your age">
                        <span class="focus-input100" data-symbol="&#9881;"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Phone number is required">
                        <span class="label-input100">Phone number</span>
                        <input class="input100" type="text" name="phone_number" placeholder="Type your phone number">
                        <span class="focus-input100" data-symbol="&#9742;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span style="color: rgb(0, 0, 0);" class="focus-input100" data-symbol="&#9919;"></span>
                    </div>

                    <!--Remember to Check password with retype password is match with password -->
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Retype-Password</span>
                        <input class="input100" type="retype_password" name="retype_password" placeholder="Retype your password">
                        <span class="focus-input100" data-symbol="&#9919;"></span>
                    </div>

                    <div class="form-check" style="padding-left: 0;">
                        <div class="row">
                            <label class="col-md-3 col-form-label">Giới tính:</label>
                        </div>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 1cm;">
                        <input class="form-check-input" type="radio" name="gender" value="1">
                        <label class="form-check-label">Nam</label>
                    </div>

                    <div class="form-check form-check-inline" style="padding-left: 0.5cm;">
                        <input class="form-check-input" type="radio" name="gender" value="0">
                        <label class="form-check-label">Nữ</label>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Sign up
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            <a href="#"><u>Sign In</u></a>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/MVC_PHONG/public/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/MVC_PHONG/public/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/MVC_PHONG/public/vendor/bootstrap/js/popper.js"></script>
    <script src="/MVC_PHONG/public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/MVC_PHONG/public/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/MVC_PHONG/public/vendor/daterangepicker/moment.min.js"></script>
    <script src="/MVC_PHONG/public/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/MVC_PHONG/public/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="/MVC_PHONG/public/js/main.js"></script>

</body>

</html>