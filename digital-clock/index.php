<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="1">

    <title>Digital Clock</title>

    <link rel="stylesheet" href="/digital-clock/style.css">
</head>

<body>
    <?php date_default_timezone_set("Asia/Kolkata"); ?>
    <main>
        <h1>
            <?php echo date("h:i:s A") ?>
        </h1>
    </main>
</body>

</html>
