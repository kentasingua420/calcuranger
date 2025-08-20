<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Arithmetic Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('download1.jfif'); /* Set the background image */
            background-size: cover; /* Ensure the image covers the entire background */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
        }
        .calculator {
            background: rgba(255, 255, 255, 0.8); /* Light background for contrast */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .calculator input, .calculator select, .calculator button {
            width: 100%; /* Fix width of inputs */
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
        }
        .calculator button {
            background-color: rgb(76, 83, 175);
            color: white;
            border: none;
            cursor: pointer;
        }
        .calculator button:hover {
            background-color: rgb(160, 69, 69);
        }
        .result {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Arithmetic Calculator</h2>
    
    <!-- Form for input -->
    <form method="post">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" placeholder="Enter second number" required>
        
        <select name="operation" required>
            <option value="">Select operation</option>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        
        <button type="submit">Calculate</button>
    </form>
    
    <!-- PHP Calculation Logic -->
    <?php
    // Function to perform the arithmetic operation
    function calculate($num1, $num2, $operation) {
        switch ($operation) {
            case 'add':
                return $num1 + $num2;
            case 'subtract':
                return $num1 - $num2;
            case 'multiply':
                return $num1 * $num2;
            case 'divide':
                // Check for division by zero
                if ($num2 != 0) {
                    return $num1 / $num2;
                } else {
                    return "Error: Division by zero!";
                }
            default:
                return "Please select a valid operation.";
        }
    }

    // Check if the form is submitted and process the input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form input
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        
        // Call the calculate function and store the result
        $result = calculate($num1, $num2, $operation);

        // Display the result
        echo "<div class='result'>Result: $result</div>";
    }
    ?>
</div>

</body>
</html>
