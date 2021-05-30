<?php
//upload Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname="examples";
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
?>