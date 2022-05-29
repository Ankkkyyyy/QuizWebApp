


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<div class="container text-center" >
     	<br><br>
    	<h1 class="text-center text-primary text-uppercase animateuse" > The Quiz Web APP</h1>
    	<br><br><br><br>
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	<tr>
          <td>
		      		Questions Attempted
		      	</td>

                  <?php

$conn = mysqli_connect('localhost','root','','quizdbase');
$result = 0;
$i = 1;
if(isset($_POST['submit']))
{
    if(!empty($_POST['quizcheck']))
    {
        $count = count($_POST['quizcheck']);
    
      ?>
         <td>
        <?php

            echo "Out of 5, You have attempt ".$count." option."; ?>

            </td>

        

        <?php
            if(!empty($_POST['quizcheck']))
    {
        $count = count($_POST['quizcheck']);
        // echo "Out of 5, you have selected ".$count."options";
        $result = 0;
        $i = 1; // this i is the answer that we checkin comparing with checked option
        $selected = $_POST['quizcheck'];
        $sql = "select * from questions";
        $query = mysqli_query($conn,$sql);
        while($rows = mysqli_fetch_array($query))
       {

            $checked = $rows['ans_id'] ==$selected[$i];
            if($checked)
            {
               
                $count++;
                $result++;
            }
            else{
                
                $count++;

            }
            $i++;
        // echo "<br> Total Score is : ".$result;

    }
}

    ?>
    <tr>
    			<td>
    				Your Total score
    			</td>
    			<td colspan="2">
	    	<?php 
	            echo " Your score is ". $result .".";
	            }
	            else{
	            echo "<b>Please Select Atleast One Option.</b>";
	            }
	            } 
	          ?>
	          </td>
            </tr>
    





</body>
</html>