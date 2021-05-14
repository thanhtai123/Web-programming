
<!DOCTYPE html>
<html>

<head>
    <title>Ex2</title>
    <style>
        body {
            max-width: 500px;
            margin: 0 auto;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            align-content: center;
            margin-top: 200px;
        }
        
        #subject {
            height: 50px;
            width: 300px;
            font-size: large;
            padding-left: 20px;
        }
        
        #sb1 {
            width: 100px;
        }
    </style>
</head>

<body>
    <h1>
    <?php
        $value = $_GET["intToChoose"];
        $value = $value % 5;
        switch ($value) {
            case 0:
                echo 'Hello';
                break;
            case 1:
                echo 'How are you?';
                break;
            case 2:
                echo 'I’m doing well, thank you';
                break;
            case 3:
                echo 'See you later';
                break;
            case 4:
                echo 'Good-bye';
                break;
            default:
              echo 'error input';
          }

    ?>
    </h1>
    <form name="form" action="sv.php" method="get">
        <input type="text" name="intToChoose" id="subject" placeholder="Type a positive number">
        <input type="submit" id="sb1">
    </form>
</body>

</html>