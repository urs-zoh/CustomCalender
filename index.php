<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yearly Calendar</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Enter a Year to Display the Calendar</h1>
    <form method="POST" action="calendar.php">
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required>
        <button type="submit">Show Calendar</button>
    </form>
</body>

</html>