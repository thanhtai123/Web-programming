<!DOCTYPE html>
<html>

<head>
    <title>Ex3</title>
    <style>
        body {
            max-width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
  <h3> 
    <?php
      echo "For loop:";
      echo "<br>";
      for($i = 0;$i<=100;$i++){
        if($i%2==1) echo $i.' ';
      }
      echo "<br>";
      echo "<br>";
      echo "<br>";
      echo "while loop:";
      echo "<br>";
      $i=0;
      while($i++<100){
        if($i%2==1) echo $i.' ';
      }
    ?>
  </h3>
</body>

</html>