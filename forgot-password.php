<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Chat App</title>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="icons8-chat-96.png" type="image/x-icon">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row d-flex justify-content-center align-content-center vh-100">
                    <div class="col-lg-4 col-md-6 col-10 card custom-card">
                        <div class="card-body">
                            <h3 class="fw-bold text-center mb-3">
                                Forgot Password
                            </h3>
                            <div class="mb-3">
                                <label for="" class="form-label">E-Mail Address</label>
                                <input type="email" class="form-control" placeholder="abc@example.com" id="email"/>
                            </div> 
                            <div class="mb-2 d-grid py-3">
                                <button class="btn btn-secondary" onclick="forgot_password();">Forgot Passowrd</button>
                            </div> 
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>