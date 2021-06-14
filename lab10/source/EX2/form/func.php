<?php
  //upload Database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="examples";

  function showList(){
    global $servername,$dbname,$password,$username;
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->query("SELECT * FROM cars");
      $stmt->execute();
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $userData_List[] = $row;	
      }
      //day la begin phan display
      print json_encode($userData_List);
      //day la end phan display
    } catch(PDOException $e) {
      echo json_encode($e->getMessage());
    }
    $conn = null;
  }

  function valider(){
    $slOp = $_POST['id'];
    $varname = $_POST['name'];
    $varyear = $_POST['year'];
    if($slOp==''){
      echo json_encode('invalid id');
      return false;
    }  else if(!is_string($varname)){
      echo json_encode('invalid name');
      return false;
    } elseif(strlen($varname)<5){
      echo json_encode('short name');
      return false;
    } elseif(strlen($varname)>40){
      echo json_encode('long name');
      return false;
    } elseif((string)(int)$varyear != $varyear){
      echo json_encode('invalid year');
      return false;
    } elseif($varyear>2015){
      echo json_encode('long year');
      return false;
    } elseif($varyear<1990){
      echo json_encode('short year');
      return false;
    }
    return true;
  }

  function updateDb(){
    global $servername,$dbname,$password,$username;
    $slOp = $_POST['id'];
    $varname = $_POST['name'];
    $varyear = $_POST['year'];
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
      echo json_encode("success");
    } catch(PDOException $e) {
      echo json_encode($e->getMessage());
    }
    $conn = null;
  }

  function delDb(){
    $slOp = $_POST['id'];
    global $servername,$dbname,$password,$username;
    if($slOp==''){
      echo json_encode('choose the data to delete');
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
        echo json_encode('Record deleted successfully');
      } catch(PDOException $e) {
        echo json_encode($e->getMessage());
      }
      $conn = null;
    }
  }

  function addDb(){
    $varid = $_POST['id'];
    $varname = $_POST['name'];
    $varyear = $_POST['year'];
    global $servername,$dbname,$password,$username;
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "INSERT INTO cars (id, name, year)
      VALUES ('$varid', '$varname', '$varyear')";
      // use exec() because no results are returned
      $conn->exec($sql);
      echo json_encode("success");
    } catch(PDOException $e) {
      echo json_encode($e->getMessage());
    }
    $conn = null;
  }

  $output=explode('func.php/',$_SERVER['REQUEST_URI']);
  $action = $output[1];
  
  switch($action){
    case 'showform':
      showList();
      break;
    case 'updform':
      showList();
      break;
    case 'delform':
      showList();
      break;
    case 'submitAdd':
      $cont=valider();
      if(!$cont){
        break;
      }
      addDb();
      break;
    case 'submitUpd':
      $cont=valider();
      if(!$cont){
        break;
      }
      updateDb();
      break;
    case 'submitDel':
      delDb();
      break;
  }
  
?>