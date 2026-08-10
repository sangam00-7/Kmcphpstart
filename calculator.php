<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>

    <form action="" method="POST">

        <div>
            <input type="text" name="First_number">

            <select name="operation" id="operation">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>

            <input type="text" name="Second_number">
        </div>
        <br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $First_number=$_POST['First_number'];
        $Second_number=$_POST['Second_number'];
        $operation=$_POST['operation'];
        switch($operation){
            case 'add';
            $result=$First_number + $Second_number;
            break;
            case 'subtract';
            $result=$First_number - $Second_number;
            break;
            case 'multiply';
            $result=$First_number * $Second_number;
            break;
            case 'divide';
            $result=($Second_number !=0) ? $First_number /$Second_number :"Can't Divide by Zero";
            break;
            default;
        }
        echo"<br>";
        echo$First_number;
        echo"<br>";
        echo$Second_number;
        echo"<br>";
        echo$operation;
         echo"<br>";
         echo"<br>";
        echo$result;
    
    }
    ?>
    </body>
    </html>