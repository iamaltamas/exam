<?php

session_start();
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdbase');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Exam start</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>  
       <center>
       	<h1>welcome <?php $_SESSION['username']; ?></h1>
       </center>
       <div >
       	<form action="check.php" method="post">
       
       		<?php
       		for ($i=1; $i < 6; $i++) { 
       		
       		
             $q = "select *from questions where qid = $i";
             $query = mysqli_query($con,$q);
             while ($rows = mysqli_fetch_array($query)) {
              ?>
               <div>
               
               		<h4 class="card-header"><?php echo $rows['question']?></h4>

               		<?php

                         $q = "select * from answers where ans_id = $i";
             $query = mysqli_query($con,$q);
             while ($rows = mysqli_fetch_array($query)) {
              ?>

                    <div class="card-body">

                    	<input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]" value="<?php echo $rows['aid']; ?>">
                    	<?php
                         echo $rows['answer'];
                    	?>
                    </div>

               	
               	
               	
               </div>
         <?php

             }
             }
             }
       		?>
       <input type="submit" name="submit" value="submit" class="btn btn-success" class="">
       <br><br>
       	</form>
       </div>
</body>
</html>