<!DOCTYPE html>
<html>

<head>
    <title>Ex4</title>
    <style>
        body {
            max-width: 500px;
            margin: 100px auto;
        }
        table {
          border: 1px solid black;
          border-collapse: collapse;
        }
        td {
          border: 2px solid black;
          border-collapse: collapse;
          height: 30px;
          width: 50px;
          font-size: 20px;
          text-align: center;
          background-color: yellow;
        }  
    </style>
</head>

<body>
  <table>
    <?php
      for($i=1;$i<8;$i++){
        echo "<tr>";
        for($j=$i;$j<7*$i+1;$j=$j+$i){
          echo "<td>";
          echo $j;
          echo "</td>";
        }
        echo "</tr>";
      }
    ?>
  </table>
</body>

</html>