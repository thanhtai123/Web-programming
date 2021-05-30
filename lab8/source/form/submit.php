<?php
	//upload Database
	$servername = "localhost";
	$username = "root";
	$password = "";
  $dbname="examples";
	$request1 = $_POST['action'];
  if(strcmp($request1,"submitUpd")==0){
    $slOp = $_POST['id'];
    $varname = $_POST['name'];
    $varyear = $_POST['year'];
    if($slOp==0){
      echo'choose the data to update';
      return;
    }  else if(!is_string($varname)){
      echo "invalid name";
      return;
    } elseif(strlen($varname)<5){
      echo "name field is too short";
      return;
    } elseif(strlen($varname)>40){
      echo "name field is too long";
      return;
    } elseif((string)(int)$varyear != $varyear){
      echo "year field is not an integer number";
      return;
    } elseif($varyear>2015){
      echo "too young";
      return;
    } elseif($varyear<1990){
      echo "too old";
      return;
    } else{
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $sql = "UPDATE cars SET name='$varname' WHERE id=$slOp";
        //$sql = "UPDATE cars SET year='$varyear' WHERE id=$slOp";
        // Prepare statement
        $stmt = $conn->prepare($sql);
      
        // execute the query
        $stmt->execute();
        $sql = "UPDATE cars SET year='$varyear' WHERE id=$slOp";
        // Prepare statement
        $stmt = $conn->prepare($sql);
      
        // execute the query
        $stmt->execute();
      
        // echo a message to say the UPDATE succeeded
        echo "success";
      } catch(PDOException $e) {
        echo "failed:";
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
    }
  } else if(strcmp($request1,"submitDel")==0){
    $slOp = $_POST['id'];
    if($slOp==0){
      echo'choose the data to delete';
      return;
    } else{
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // sql to delete a record
        $sql = "DELETE FROM cars WHERE id=$slOp";
      
        // use exec() because no results are returned
        $conn->exec($sql);
        echo 'Record deleted successfully';
      } catch(PDOException $e) {
        echo 'failed:';
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
    } 

  } else if(strcmp($request1,"submitAdd")==0){
    $varid = $_POST['id'];
    $varname = $_POST['name'];
    $varyear = $_POST['year'];
   
    if((string)(int)$varid != $varid){
      echo 'id is not a number';
      return;
    } else if(!is_string($varname)){
      echo "invalid name";
      return;
    } elseif(strlen($varname)<5){
      echo "name is too short";
      return;
    } elseif(strlen($varname)>40){
      echo "name is too long";
      return;
    } elseif((string)(int)$varyear != $varyear){
      echo "year is not a number";
      return;
    } elseif($varyear>2015){
      echo "to young";
      return;
    } elseif($varyear<1990){
      echo "to old";
      return;
    } else{
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO cars (id, name, year)
        VALUES ('$varid', '$varname', '$varyear')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "success";
      } catch(PDOException $e) {
        echo 'failed: ';
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
      
    }
  }
?>