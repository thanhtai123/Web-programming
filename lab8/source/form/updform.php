<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="examples";
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
    
    echo '<form id="carform">
    <input type="text" name="name" placeholder="name" id="nameUpd">
    <input type="text" name="year" placeholder="year" id="yearUpd">
    <input type="button" name="submit" id="submit5" value="submitAdd" class="btn btn-primary" onclick="submit_updform()">
    </form>';
?>