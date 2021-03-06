<!doctype html>
<html lang="en">

<head>
    <title>Ex5</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jvs.js"></script>
</head>

<body>
    <div class="container">
        <div class="container sp"></div>
        <div class="container content" id="content1">
            <form action="sv.php" method="GET">
                <label for="firstOperand">Type first operand (a) below:</label><br>
                <input type="text" name="firstOperand" id="firstOperand" value="<?php echo $_GET["firstOperand"]; ?>"><br><br>
                <label for="secondOperand">Type second openrand (b) below:</label><br>
                <input type="text" name="secondOperand" id="secondOperand" value="<?php echo $_GET["secondOperand"]; ?>"><br><br>
                <label for="rs">Result:</label><br>
                <input
                  type="text" name="rs" id="rs" 
                  value=
                  "<?php
                    if(isset($_GET["add"])){
                      $a=$_GET["firstOperand"];
                      $b=$_GET["secondOperand"];
                      echo $a+$b;
                    } elseif(isset($_GET["sub"])){
                      $a=$_GET["firstOperand"];
                      $b=$_GET["secondOperand"];
                      echo $a-$b;
                    } elseif(isset($_GET["mul"])){
                      $a=$_GET["firstOperand"];
                      $b=$_GET["secondOperand"];
                      echo $a*$b;
                    } elseif(isset($_GET["div"])){
                      $a=$_GET["firstOperand"];
                      $b=$_GET["secondOperand"];
                      echo $a/$b;
                    } elseif(isset($_GET["power"])){
                      $a=$_GET["firstOperand"];
                      $b=$_GET["secondOperand"];
                      $rs=1;
                      if($b>=0){
                        for($i=0;$i<$b;$i++){
                          $rs*=$a;
                        }
                      }
                      else {
                        for($i=0;$i<-$b;$i++){
                          $rs*=$a;
                        }
                        $rs=1/$rs;
                      }
                      echo $rs;
                    } elseif(isset($_GET["invert"])){
                      $a=$_GET["firstOperand"];
                      echo 1/$a;
                    } else{
                      echo "result";
                    }

                  ?>"
                >
                <br><br>
                <button type="submit" class="btn btn-primary" name="add">Add a+b</button>
                <button type="submit" class="btn btn-primary" name="sub">Sub a-b</button>
                <button type="submit" class="btn btn-primary" name="mul">Mul a*b</button>
                <button type="submit" class="btn btn-primary" name="div">Div a/b</button>
                <button type="submit" class="btn btn-primary" name="power">Power a^b</button>
                <button type="submit" class="btn btn-primary" name="invert">Invert 1/a</button>
            </form>
        </div>
    </div>
</body>

</html>