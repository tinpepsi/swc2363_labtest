<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Commission Result</title>
    <!--CSS-->
    <style>
        h2 {
            text-decoration: underline;
        }
        .result {
            margin-top: 20px;
        }
        .label {
            display: inline-block;
            width: 160px;
            font-weight: bold;
        }
        .value {
            display: inline-block;
        }
    </style>
</head>
<body>

<?php
// Include the database connection
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $month = htmlspecialchars($_POST['month']);
    $sales_amount = (float) $_POST['sales_amount'];

    // Calculate the commission rate 
    if ($sales_amount >= 1 && $sales_amount <= 2000) {
        $commission_rate = 0.03; // 3%
    } elseif ($sales_amount >= 2001 && $sales_amount <= 5000) {
        $commission_rate = 0.04; // 4%
    } elseif ($sales_amount >= 5001 && $sales_amount <= 7000) {
        $commission_rate = 0.07; // 7%
    } else {
        $commission_rate = 0.10; // 10%
    }

    // Calculate commission
    $commission = $sales_amount * $commission_rate;

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO sales_commission (name, month, sales_amount, commission) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $name, $month, $sales_amount, $commission);

    if ($stmt->execute()) {
        echo "<h2>Sales Commission</h2>";
        echo "<div class='result'>";
        echo "<div><span class='label'>Name</span> <span class='value'>: " . $name . "</span></div>";
        echo "<div><span class='label'>Month</span> <span class='value'>: " . $month . "</span></div>";
        echo "<div><span class='label'>Sales Amount</span> <span class='value'>: RM " . number_format($sales_amount, 2) . "</span></div>";
        echo "<div><span class='label'>Sales Commission</span> <span class='value'>: RM " . number_format($commission, 2) . "</span></div>";
        echo "</div>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "No data submitted.";
}
?>

</body>
</html>
