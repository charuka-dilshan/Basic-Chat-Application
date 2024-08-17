<?php

session_start();

if(isset($_SESSION["user"])){

    $conn = new mysqli("host", "uname", "password", "chat_db", 3306);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat | Chat App</title>
    <link rel="stylesheet" href="bootstrap.css"/>
    <link rel="stylesheet" href="style.css"/>
</head>
<body onload="loader();">
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-12 text-center">
                <h1 class="text-dark text-center mb-3">Chat App</h1>

                <h4 class="text-center">
                    <?php 
                        echo( "Welcome, " . $_SESSION["user"]["f_name"] ." ". $_SESSION["user"]["l_name"]); 
                    ?>
                </h4>
                <a class="btn btn-danger" href="signout.php">Sign Out</a>
            </div>

            <div class="col-10 col-md-6 col-lg-4 mb-4">
                <select onchange="loadmsg();" class="form-select" id="receiver">
                    <option value="0">Select</option>

                    <?php

                        $rs = $conn->query("SELECT * FROM `users` WHERE `id` != '".$_SESSION["user"]["id"]."'");
                        
                        $num = $rs->num_rows;

                        for($x = 0 ; $x<$num ; $x++){
                            $data = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo($data["id"]); ?>">
                                    <?php echo($data["email"]) ?>
                                </option>
                            <?php
                        }

                    ?>
                </select>                
            </div>

            <div class="row d-flex justify-content-center mb-3">
                <div class="col-11 col-md-8 col-lg-6 card custom-card " style="height:450px;">
                    <div class="card-body" id="msgContainer">

                    </div>
                </div>

                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-6 px-1">
                        <input type="text" placeholder="Type your text" class="form-control" id="msg">
                    </div>
                    
                    <div class="col-1">
                        <button class="btn btn-success" onclick="send();">send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php
        
    }else{
        header("Location: index.php");
    }

?>