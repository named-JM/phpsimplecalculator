<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    <title></title>
</head>
<body>
    <!-- sanitize data. the output of your code -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <input type="number" name="num01" id="" placeholder="Number one">
        <select name="operator" id="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">x</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num02" id="" placeholder="Number two">
        <button>Calculate</button>
    </form>
    
    
    <?php
    // submit the form data correctly
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT); //grabbing the data
        $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT); //grabbing the data
        $operator = htmlspecialchars($_POST["operator"]); //grabbing the data

        //error handles
        $errors = false;
        if(empty($num01) || empty($num02) || empty($operator)) {
            echo "<p class='calc-error'>Fill in all fields</p>";
            $errors = true;
        }
        if(!is_numeric($num01) || !is_numeric($num02)){
            echo "<p class='calc-error'>Only write numbers!</p>";
            $errors = true;
        }

        //calculate the numbers if no errors
        if(!$errors){
            $value = 0;
            switch ($operator){
                case "add":
                    $value = $num01 + $num02;
                    break;
                case "subtract":
                    $value = $num01 - $num02;
                    break;
                case "multiply":
                    $value = $num01 * $num02;
                    break;
                case "divide":
                    $value = $num01 / $num02;
                    break;
                default:
                echo "<p class='calc-error'>Something went wrong</p>";
            }

            echo "<p class='calc-result'>Result =" . $value . "</p>";
        }




    }
    
    
    ?>
    
</body>
</html>