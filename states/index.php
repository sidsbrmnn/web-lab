<?php
$states = "Mississippi Alabama Texas Massachusetts Kansas";
$list = array();
$keywords = preg_split("/\s+/", $states);

foreach ($keywords as $word) {
    if (preg_match('/xas$/', $word)) {
        $list[0] = $word;
    }
    if (preg_match('/^k.*s$/i', $word)) {
        $list[1] = $word;
    }
    if (preg_match('/^M.*s$/', $word)) {
        $list[2] = $word;
    }
    if (preg_match('/a$/', $word)) {
        $list[3] = $word;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>States</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>States</h1>
        <p>Input text: <br>
            <?php echo $states; ?>
        </p>

        <p>Output list: <br>
            <?php print_r($list); ?>
        </p>
    </main>
</body>

</html>
