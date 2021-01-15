<?php
$host = 'localhost';
$username = 'root';
$passwd = '';
$dbname = 'test';

$mysqli = new mysqli($host, $username, $passwd, $dbname);
if ($mysqli->connect_errno) {
    echo 'Failed to connect to MySQL: (' .  $mysqli->connect_errno . ') ' . $mysqli->connect_error;
    exit();
}

$students = array();
if ($result = $mysqli->query('SELECT * FROM students', MYSQLI_USE_RESULT)) {
    while ($row = $result->fetch_assoc()) {
        array_push($students, $row);
    }
    $result->close();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>Student Database</h1>
        <section>
            <h2>Before sorting</h2>
            <table>
                <thead>
                    <tr>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <td>
                                <?php echo $student['usn']; ?>
                            </td>
                            <td>
                                <?php echo $student['name']; ?>
                            </td>
                            <td>
                                <?php echo $student['address']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>After sorting</h2>
            <table>
                <thead>
                    <tr>
                        <th>USN</th>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($students) - 1; $i++) {
                        $min = $i;
                        for ($j = $i + 1; $j < count($students); $j++) {
                            if ($students[$j]['name'] < $students[$min]['name']) {
                                $min = $j;
                            }
                        }
                        $temp = $students[$min];
                        $students[$min] = $students[$i];
                        $students[$i] = $temp;
                    }

                    foreach ($students as $student) { ?>
                        <tr>
                            <td>
                                <?php echo $student['usn']; ?>
                            </td>
                            <td>
                                <?php echo $student['name']; ?>
                            </td>
                            <td>
                                <?php echo $student['address']; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>
