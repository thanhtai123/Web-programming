<?php
	//upload Database
	$servername = "localhost";
	$username = "root";
	$password = "";
  $dbname="examples";
	$request1 = $_POST['submit'];
  //style
  echo'<style>table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  td,
  th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
  }</style>';
  echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">';

  if(strcmp($request1,"Get")==0){
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->query("SELECT * FROM cars");
      $stmt->execute();
      $userData_List = array();
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $userData_List[] = $row;	
      }
      //day la begin phan display
      include('index.html');
      $numArr = count($userData_List);
      
      echo'<table>
      <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Year</th>
      </tr>';
      for($index = 0; $index<$numArr;$index++){
        echo '<tr>';
        echo '<td>'.$userData_List[$index]['id'].'</td>';
        echo '<td>'.$userData_List[$index]['name'].'</td>';
        echo '<td>'.$userData_List[$index]['year'].'</td>';
        echo '</tr>';
      }
      
      echo '</table>';
      //day la end phan display
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;

  } else if(strcmp($request1,"Add")==0){
    include("index.html");
    echo '<form action="index2.php" method="POST">
    <input type="text" name="id" placeholder="id">
    <input type="text" name="name" placeholder="name" >
    <input type="text" name="year" placeholder="year" >
    <input type="submit" name="submit" id="submit" value="submitAdd" class="btn btn-primary">
    </form>';
  } else if(strcmp($request1,"Del")==0){
    include("index.html");
   
    echo '<label for="cars">Choose a car:</label>
          <select id="cars" name="carlist" form="carform">';
    echo   '<option value="0">NULL</option>';
    //////////////////////////////////////////////
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->query("SELECT * FROM cars");
      $stmt->execute();
      $userData_List = array();
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $userData_List[] = $row;	
      }
      //day la begin phan display
      $numArr = count($userData_List);
      for($index = 0; $index<$numArr;$index++){
        echo '<option value="'.$userData_List[$index]['id'].'">';
        echo 'id:'.$userData_List[$index]['id'].'...'.'name:'.$userData_List[$index]['name'].'...'.'year:'.$userData_List[$index]['year'];
        echo '</option>';
      }
      
      echo '</table>';
      //day la end phan display
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;


    ///////////////////////////////////////////////

    echo  ' </select>';
    echo '<form action="index2.php" method="POST" id="carform">
    <input type="submit" name="submit" id="submit" value="submitDel" class="btn btn-primary">
    </form>';
  } else if(strcmp($request1,"Upd")==0){
    include("index.html");
    echo '<label for="cars">Choose a car:</label>
          <select id="cars" name="carlist" form="carform">';
    echo   '<option value="0">NULL</option>';
    //////////////////////////////////////////////
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->query("SELECT * FROM cars");
      $stmt->execute();
      $userData_List = array();
      while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        $userData_List[] = $row;	
      }
      //day la begin phan display
      $numArr = count($userData_List);
      for($index = 0; $index<$numArr;$index++){
        echo '<option value="'.$userData_List[$index]['id'].'">';
        echo 'id:'.$userData_List[$index]['id'].'...'.'name:'.$userData_List[$index]['name'].'...'.'year:'.$userData_List[$index]['year'];
        echo '</option>';
      }
      
      echo '</table>';
      //day la end phan display
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $conn = null;


    ///////////////////////////////////////////////

    echo  ' </select>';
    
    echo '<form action="index2.php" method="POST" id="carform">
    <input type="text" name="name" placeholder="name" >
    <input type="text" name="year" placeholder="year" >
    <input type="submit" name="submit" id="submit" value="submitUpd" class="btn btn-primary">
    </form>';
  } else if(strcmp($request1,"submitUpd")==0){
    include("index.html");
    $slOp = $_POST['carlist'];
    $varname = $_POST['name'];
    $varyear = $_POST['year'];
    if($slOp==0){
      echo'<script>alert("choose the data to update")</script>';
      return;
    }  else if(!is_string($varname)){
      echo "<script>alert('invalid name')</script>";
      return;
    } elseif(strlen($varname)<5){
      echo "<script>alert('name field is too short')</script>";
      return;
    } elseif(strlen($varname)>40){
      echo "<script>alert('name field is too long')</script>";
      return;
    } elseif((string)(int)$varyear != $varyear){
      echo "<script>alert('year field is not an integer number')</script>";
      return;
    } elseif($varyear>2015){
      echo "<script>alert('too young')</script>";
      return;
    } elseif($varyear<1990){
      echo "<script>alert('too old')</script>";
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
        echo "<script>alert('success')</script>";
      } catch(PDOException $e) {
        echo "<script>alert('failed')</script>";
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
    }
  } else if(strcmp($request1,"submitDel")==0){
    include("index.html");
    $slOp = $_POST['carlist'];
    if($slOp==0){
      echo'<script>alert("choose the data to delete")</script>';
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
        echo '<script>alert("Record deleted successfully")</script>';
      } catch(PDOException $e) {
        echo '<script>alert("failed")</script>';
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
    } 

  } else if(strcmp($request1,"submitAdd")==0){
    $varid = $_POST['id'];
    $varname = $_POST['name'];
    $varyear = $_POST['year'];
    include("index.html");
    if((string)(int)$varid != $varid){
      echo "<script>alert('id field is not an integer number')</script>";
      return;
    } else if(!is_string($varname)){
      echo "<script>alert('invalid name')</script>";
      return;
    } elseif(strlen($varname)<5){
      echo "<script>alert('name field is too short')</script>";
      return;
    } elseif(strlen($varname)>40){
      echo "<script>alert('name field is too long')</script>";
      return;
    } elseif((string)(int)$varyear != $varyear){
      echo "<script>alert('year field is not an integer number')</script>";
      return;
    } elseif($varyear>2015){
      echo "<script>alert('too young')</script>";
      return;
    } elseif($varyear<1990){
      echo "<script>alert('too old')</script>";
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
        echo "<script>alert('success')</script>";
      } catch(PDOException $e) {
        echo "<script>alert('failed')</script>";
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;
    }
  }
?>