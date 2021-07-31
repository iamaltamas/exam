<?php
error_reporting(0);
session_start();
$con = mysqli_connect('localhost','root');
mysqli_select_db($con,'quizdbase');

if(isset($_POST['submit'])){

	if (!empty($_POST['quizcheck'])) {

		$count = count($_POST['quizcheck']);

		echo "Out of 5, you have selected ".$count. " options";
        $result = 0;
        $i = 1;
		$selected = $_POST['quizcheck'];

		$q = "select * from questions";
		$query = mysqli_query($con, $q);
		while ($rows = mysqli_fetch_array($query)) {
			$checked = $rows['ans_id'] == $selected[$i];
			if ($checked) {
                   $result++;				 
			}

			$i++ ;
			
		}

		echo "<br><br> your total score is " .$result;
	}
}

?>