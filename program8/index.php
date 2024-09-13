<!DOCTYPE html>
<html>
<head>
    <title>Color Change by Day</title>
    <?php
    // Array mapping days of the week to colors
    $daysOfWeek = array(
        'Sunday'    => '#FF5733',
        'Monday'    => '#33FF57',
        'Tuesday'   => '#3357FF',
        'Wednesday' => '#FFFF33',
        'Thursday'  => '#FF33FF',
        'Friday'    => '#33FFFF',
        'Saturday'  => '#FF3333'
    );

    // Get the current day (full textual representation, e.g., "Sunday")
    $currentDay = date('l'); // This will return day names like 'Sunday', 'Monday', etc.
    
    // Default color in case the day is not found
    $backgroundColor = '#FFFFFF'; 

    // Check if the current day exists in the array and get the corresponding color
    if (array_key_exists($currentDay, $daysOfWeek)) {
        $backgroundColor = $daysOfWeek[$currentDay];
    }
    ?>
    <style>
        body {
            background-color: <?php echo $backgroundColor; ?>;
        }
    </style>
</head>
<body>
    <h1>Welcome! Today is <?php echo $currentDay; ?>.</h1>
    <p>The background color changes based on the day of the week.</p>
</body>
</html>
