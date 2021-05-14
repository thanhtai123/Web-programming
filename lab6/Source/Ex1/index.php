<!DOCTYPE html>
<html>

<head>
    <title>Ex1</title>
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
            $x=10;
            $y=7;
            echo $x.' + '.$y.' = '.($x+$y);
            echo "<br>";
            echo $x.' - '.$y.' = '.($x-$y);
            echo "<br>";
            echo $x.' * '.$y.' = '.($x*$y);
            echo "<br>";
            echo $x.' / '.$y.' = '.($x/$y);
            echo "<br>";
            echo $x.' % '.$y.' = '.($x%$y);
            echo "<br>";
            
        ?>
    </h3>
</body>

</html>