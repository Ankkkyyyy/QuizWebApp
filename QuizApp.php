<?php
$conn = mysqli_connect('localhost','root','','quizdbase');
// if($conn){
//     echo "success";
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">

      <br>  <h2 class="text-center text-primary">Welcome to QUIZ APP</h2> <br>

 <div class-"col-lg-4 m-auto d-block">

 <div class="card"> 
      <div class="text-center card-header">
          <h3>You have to select only 1 out of 4. All the Best :)</h3>
      </div> <br>
   
      <form action="check.php" method="post">
      <?php

      for($i=1;$i<6;$i++){

    //   $sql = "select * from questions where qid=1";
      $sql = "select * from questions where qid=$i";
      $query = mysqli_query($conn,$sql);
    //   using while loop to fetch data one by one...
      while($rows = mysqli_fetch_array($query)){
          ?>
   <div class = "card">
       <h4 class="card-header"><?php  echo $rows['question'] ?> </h4>

       <?php
        // $sql = "select * from answers where ans_id=1";
         $sql = "select * from answers where ans_id=$i";
        $query = mysqli_query($conn,$sql);
       //   using while loop to fetch data one by one...
       while($rows = mysqli_fetch_array($query)){
        ?>

        <div class="card-body">
            <input type="radio" name="quizcheck[<?php echo $rows['ans_id'] ?>]" value="<?php echo $rows['aid'] ?>">
            <?php echo $rows['answer'] ;?>


        </div>

    
    

   

<?php

      }
    }
    }

      ?>

      <input type="submit" name="submit" value = "Submit" class="btn btn-danger" >


</form>

</div>
</div> 
<br> <br>

<div>
    <h5 class="text-center" >&copy; 2022 Deep Ghosh </h5>
</div>

</div>



    </div>


    
</body>
</html>