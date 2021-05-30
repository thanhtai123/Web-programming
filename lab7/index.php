<!doctype html>
<html lang="en">

<head>
    <title>Excercise</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action = "index.php" method = "POST">
            <input type="submit" name="submit" id="submit" value="Get Record">
            <input type="submit" name="submit" id="submit" value="Add record">
            <input type="submit" name="submit" id="submit" value="Update record">
            <input type="submit" name="submit" id="submit" value="Delete record">
        </form>
    </div>

    <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "examples";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT id, name, year FROM cars";
        $result = $conn->query($sql);
        if (isset($_POST["submit"]) && $_POST["submit"]=="Get Record"){
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table class = 'records' style='border: 1px solid black'>
                <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year</th>
                </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['year'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
        }
        else if (isset($_POST["submit"]) && $_POST["submit"]=="Add record"){
            echo'
            <form action = "index.php" method = "POST">
                <label for="name">The car name:</label><br>
                <input type="text" id="name" name="name" placeholder = "Mercedes" maxlength=40 minlength=5><br>
                <label for="year">The year:</label><br>
                <input type="number" id="year" name="year" max = 2015 min = 1990><br>
                <input type="submit" name="submit" id="submit" value="Confirm add">
            </form>
            ';
        }
        else if (isset($_POST["submit"]) && $_POST["submit"]=="Confirm add"){
            $next_index = ($result->num_rows)+1;
            if (isset($_POST["name"]) and isset($_POST["year"])){
                $sql = "INSERT INTO cars(id, name, year) VALUE('{$next_index}','{$_POST['name']}','{$_POST['year']}')";
                // echo $sql;
                $conn->query($sql);
                $sql = "SELECT id, name, year FROM cars";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<table class = 'records'>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['year'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
            }
            else {
                echo "
                    <p class = 'alert'>Please fill in both the car name and the year</p>
                ";
            }
        }
        else if (isset($_POST["submit"]) && $_POST["submit"]=="Update record"){
            $sql = "SELECT id, name, year FROM cars";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo'
                    <form action = "index.php" method = "POST">
                    <label for="record">Country:</label>
                    <select name="record" id="record">';
                        
                    while($row = $result->fetch_assoc()) {
                        $temp ="{$row['id']}&{$row['name']}&{$row['year']}"; 
                        echo '<option value="' . $temp . '">' . $temp . '</option>';
                    }
                    echo'
                    </select><br>
                    <label for="name">The Updated car name:</label><br>
                    <input type="text" id="name" name="name" placeholder = "Mercedes" maxlength=40 minlength=5><br>
                    <label for="year">The Updated year:</label><br>
                    <input type="number" id="year" name="year" min = 1990 max = 2015><br>
                    <input type="submit" name="submit" id="submit" value="Confirm update">
                    ';
                } else {
                    echo "0 results";
                }
        }
        else if (isset($_POST["submit"]) && $_POST["submit"]=="Confirm update"){
            if (isset($_POST["record"])&&isset($_POST["name"])&&isset($_POST["year"])&&$_POST["name"]!=""&&$_POST["year"]!=""){
                $str_aray= explode("&",$_POST["record"],3);
                $sql = "UPDATE cars SET name='{$_POST['name']}', year='{$_POST['year']}' WHERE id={$str_aray[0]};";
                // echo $sql;
                $conn->query($sql);
                $sql = "SELECT id, name, year FROM cars";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<table class = 'records'>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['year'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
            }
            else {
                echo "
                    <p class = 'alert'>Please fill in both the car name and the year</p>
                ";
            }
        }
        else if (isset($_POST["submit"]) && $_POST["submit"]=="Delete record"){
            $sql = "SELECT id, name, year FROM cars";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo'
                    <form action = "index.php" method = "POST">
                    <label for="record">Country:</label>
                    <select name="record" id="record">';
                        
                    while($row = $result->fetch_assoc()) {
                        $temp ="{$row['id']}&{$row['name']}&{$row['year']}"; 
                        echo '<option value="' . $temp . '">' . $temp . '</option>';
                    }
                    echo'
                    </select><br>
                    <input type="submit" name="submit" id="submit" value="Confirm delete">
                    ';
                } else {
                    echo "0 results";
                }
        }
        else if (isset($_POST["submit"]) && $_POST["submit"]=="Confirm delete"){
            if (isset($_POST["record"])){
                $str_aray= explode("&",$_POST["record"],3);
                $sql = "DELETE FROM cars WHERE id={$str_aray[0]};";
                // echo $sql;
                $conn->query($sql);
                $sql = "SELECT id, name, year FROM cars";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    echo "<table class = 'records'>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    </tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['year'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
            }
            else {
                echo "
                    <p class = 'alert'>Please fill in both the car name and the year</p>
                ";
            }
        }
        $conn->close();
    ?>
</body>
</html>