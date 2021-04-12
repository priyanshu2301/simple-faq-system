<?php 

//connecting to databse.
include("config/config.php");
$conn = getDbConn();

?>


<!DOCTYPE html> 

    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <a class="btn btn-outline-dark ml-5" href="question.php"> Back </a>
        <!-- the actual question -->

        <h3 class="mx-5 mt-5">The Question</h3>

        <?php


        
            $q_id = $_GET["q_id"];
            /*
            $sql = dbSelectM('faq', 'q_id', $q_id);
            $row = mysqli_fetch_assoc($sql);
            $as = $row['que_desc'];
            echo $as; */
            $as = "";
            $sql = "SELECT * FROM `faq_` WHERE q_id = ".$q_id;
         
            $in = $conn->query($sql);
            $row = mysqli_fetch_assoc($in);

            ?>

            
            <div class="container border border-dark mt-5">

            <div class="card">
                <div class="card-header">
                    <?php echo $row["que_title"]; ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $row["que_desc"]; ?></p>
                    <h6 class="mx-5 mt-3">Date: <?php echo $row["date"]; ?></h6>
                </div>
            </div>


            </div>

                

            <!-- the answers shown -->
            <h3 class="mx-5 mt-5"> The Answers</h3>
            <?php 

                $sql = "SELECT * FROM `faq_ans_` WHERE q_id =" .$q_id;
                $in = $conn->query($sql);
                $q_id = 0;

                while($row = mysqli_fetch_assoc($in)){
                    $id = $row["q_id"];
                    //echo $id;

                    
            ?>
                <div class="container border border-dark mt-5">

                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><?php echo $row["answer"]; ?></p>
                        <h2> date: <?php  echo $row["date"]; ?></h2>
                    </div>
                </div>


                </div>

                <?php 
                $q_id = $q_id + 1;
                }
                ?>

        
    </body>



</html>