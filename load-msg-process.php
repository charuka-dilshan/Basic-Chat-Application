<?php

    session_start();

    $sid = $_SESSION["user"]["id"];
    $rid = $_GET["receiver"];
  
    $conn = new mysqli("host", "uname", "password", "chat_db", 3306);

    $query = 
        "SELECT * FROM `chat` 
        WHERE (`sender_id` = '$rid' OR `receiver_id` = '$rid') AND (`receiver_id` = '$sid' OR `sender_id` = '$sid') ORDER BY `time` DESC";
        // ASC
 
    $rs = $conn->query($query);

    $num = $rs->num_rows;

    for($x = 0 ; $x < $num ; $x++ ){
        $data = $rs->fetch_assoc();

        if($data["sender_id"] == $sid){

            ?>
                <div class="row mb-1 d-flex justify-content-end">
                    <div class="col-6 border bg-success-subtle py-2 px-3 rounded-4">
                        <h6>Me</h6>
                        <span>
                            <?php echo($data["message"]); ?>
                        </span>
                    </div>
                </div>
            <?php

        }else{

            ?>
                <div class="row mb-1">
                    <div class="col-6 border bg-dark-subtle py-2 px-3 rounded-4">
                        <h6>
                            <?php
                                $query2 = "SELECT * FROM `users` WHERE `id` = '".$data["sender_id"]."';";
                                $rs2 = $conn->query($query2);
                                $data2 = $rs2->fetch_assoc();
                                echo($data2["f_name"]);
                            ?>
                        </h6>
                        <span><?php echo($data["message"]); ?></span>
                    </div>
                </div>
            <?php

        }
    }

?>