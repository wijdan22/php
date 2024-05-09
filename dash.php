<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>زيارات الموقع</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>عدد الزيارات:</h1>
    <p id="counter">
        <?php
            // جلب عدد الزيارات من ملف نصي
            $visits = file_get_contents('visits.txt');
            echo $visits;
        ?>
    </p>

    <script src="script.js"></script>
</body>
</html>