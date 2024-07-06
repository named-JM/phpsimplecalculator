<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <!-- sanitize data. the output of your code -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">

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
        

    }
    
    
    ?>
    
</body>
</html>