<?php 

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

    <a href="FaQ.php" class="btn btn-outline-danger ml-5">Back</a>
        
    

<!-- Questions list -->
<h2 class="mx-5 mt-4"> Recently asked Questions</h2>

<?php 

$sql = "SELECT * FROM `faq_`";
$in = $conn->query($sql);
$q_id = 0;

while($row = mysqli_fetch_assoc($in)){
    $id = $row["q_id"];
    //echo $id;

    
?>
<div class="container border border-dark mt-5">

<div class="card">
    <div class="card-header">
        <?php echo $row["que_title"]; ?>
    </div>
    <div class="card-body">
        <p class="card-text"><?php echo $row["que_desc"]; ?></p>
        <a href="getAnswer.php?q_id=<?php echo $id; ?>" class="btn btn-primary" type="button" name="ans" value="<?php $id; ?>">Answer</a>   
        <a href="answers.php?q_id=<?php echo $id; ?>" type="button" name="ans" class="btn btn-primary">View Answers</a>
        <h6 class="mx-5 mt-3">Date: <?php echo $row["date"]; ?></h6>
    </div>
</div>


</div>

<?php 
$q_id = $q_id + 1;
}
?>

</body>

</html>