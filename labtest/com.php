<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Commission Calculation</title>
    <style>
        h2 {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Sales Commission Calculation</h2>
    <form action="display.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="month">Month:</label>
        <input type="text" id="month" name="month" required><br><br>

        <label for="sales_amount">Sales Amount:</label>
        <input type="number" id="sales_amount" name="sales_amount" step="0.01" required><br><br>

        <input type="submit" value="Calculate Commission">
    </form>
</body>
</html>
