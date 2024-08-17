<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing Up - Chat App</title>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="icons8-chat-96.png" type="image/x-icon">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row d-flex justify-content-center align-content-center vh-100">
                    <div class="col-10 col-lg-6 col-md-6 card custom-card">
                        <div class="card-body">
                            <h3 class="fw-bold text-center mb-3">
                                Sing Up
                            </h3>
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <label for="f_name" class="form-label col-6">First Name</label>
                                    <input type="text" class="form-control" id="f_name"/>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="l_name" class="form-label col-6">Last Name</label>
                                    <input type="text" class="form-control" id="l_name"/>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label col-6">E-mail Address</label>
                                <input type="email" class="form-control" id="email"/>
                            </div>
                            <div class="col-12">
                                <label for="mobile" class="form-label col-6">Mobile</label>
                                <input type="text" class="form-control" id="mobile"/>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="password" class="form-label col-6">Password</label>
                                <input type="password" class="form-control" id="password"/>
                            </div>
                            <div class="d-grid mb-3">
                                <button class="btn btn-secondary " onclick="signup();">Sing Up</button>
                            </div>
                            <div class="col-p12 text-center mb-2">
                                <span>Already have an account?<a href="index.php" class="link-secondary link-underline-opacity-0"> Sign In</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                       
            </div>
        </div>
    </div>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>
</html>