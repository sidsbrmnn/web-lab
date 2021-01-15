<?php
$filename = "count.txt";

// Read the file contents
$file = fopen($filename, "r");
$hits = fscanf($file, "%d");
fclose($file);

// Increment the count
$hits[0]++;

// Write it to the file
$file = fopen($filename, "w");
fprintf($file, "%d", $hits[0]);
fclose($file);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Count</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>Visitor count</h1>
        <p>This page has been visited <?php echo $hits[0]; ?>
            times</p>
        <button>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" />
            </svg>
            Refresh
        </button>
    </main>

    <script>
        const button = document.querySelector('button');
        button.addEventListener('click', () => {
            location.reload();
        });

    </script>
</body>

</html>
