<?php
function get_matrix($data)
{
    $segments = preg_split('/\n/', $data);
    $mat = array();
    $i = 0;
    foreach ($segments as $arr) {
        $j = 0;
        $row = preg_split('/\s+/', $arr);
        foreach ($row as $cell) {
            $mat[$i][$j] = $cell;
            $j++;
        }
        $i++;
    }
    return $mat;
}

function display_matrix($data)
{
    $string = "";
    foreach ($data as $row) {
        foreach ($row as $col) {
            $string .= $col . ' ';
        }
        $string .= "<br>";
    }
    return $string;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($_POST['type']) {
        case 'calculator':
            $value1 = $_POST['val1'];
            $value2 = $_POST['val2'];
            $operator = $_POST['operator'];

            switch ($operator) {
                case '+':
                    $output = $value1.' + '.$value2.' = '.($value1 + $value2);
                    break;
                case '-':
                    $output = $value1.' - '.$value2.' = '.($value1 - $value2);
                    break;
                case '*':
                    $output = $value1.' * '.$value2.' = '.($value1 * $value2);
                    break;
                case '/':
                    $output = $value1.' / '.$value2.' = '.($value1 / $value2);
                    break;

                default:
                    $output = 'Invalid operation.';
                    break;
            }
            break;

        case 'transpose':
            $matrix = get_matrix($_POST['matrix']);
            $transpose = array();
            $i = 0;
            foreach ($matrix as $row) {
                $j = 0;
                foreach ($row as $col) {
                    $transpose[$j][$i] = $col;
                    $j++;
                }
                $i++;
            }

            $output = "Input matrix:<br>".display_matrix($matrix)."<br>Transpose matrix:<br>".display_matrix($transpose);
            break;

        case 'addition':
            $matrix1 = get_matrix($_POST['matrix1']);
            $matrix2 = get_matrix($_POST['matrix2']);
            if (count($matrix1) === count($matrix2) && count($matrix1[0]) - 1 === count($matrix2[0]) - 1) {
                $matrix3 = array();

                for ($i = 0; $i < count($matrix1); $i++) {
                    for ($j = 0; $j < count($matrix1[0]) - 1; $j++) {
                        $matrix3[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
                    }
                }

                $output = "Input matrix 1:<br>".display_matrix($matrix1)
                    ."<br>Input matrix 2:<br>".display_matrix($matrix2)
                    ."<br>Matrix sum:<br>".display_matrix($matrix3);
            } else {
                $output = 'Matrix addition is not possible';
            }

            break;

        case 'multiplication':
            $matrix1 = get_matrix($_POST['matrix1']);
            $matrix2 = get_matrix($_POST['matrix2']);
            if (count($matrix1[0]) - 1 === count($matrix2)) {
                $matrix3 = array();

                for ($i = 0; $i < count($matrix1); $i++) {
                    for ($j = 0; $j < count($matrix2[0]) - 1; $j++) {
                        $matrix3[$i][$j] = 0;
                        for ($k=0; $k < count($matrix1[0]) - 1; $k++) {
                            $matrix3[$i][$j]=$matrix3[$i][$j] + ($matrix1[$i][$k] * $matrix2[$k][$j]);
                        }
                    }
                }

                $output = "Input matrix 1:<br>".display_matrix($matrix1)
                    ."<br>Input matrix 2:<br>".display_matrix($matrix2)
                    ."<br>Matrix product:<br>".display_matrix($matrix3);
            } else {
                $output = 'Matrix multiplication is not possible';
            }

            break;

        dmatrix1ault:
            $output = 'Invalid function call.';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <h1>PHP Calculator</h1>
        <?php
            if (isset($output)) {?>
        <section>
            <h2>Output:</h2>
            <p>
                <?php echo $output; ?>
            </p>
        </section>
        <?php }
        ?>

        <section>
            <h2>Simple calculator</h2>
            <form action="" method="POST">
                <input type="hidden" name="type" value="calculator">
                <input type="number" name="val1" id="val1"
                    placeholder="Enter first number" required>
                <input type="number" name="val2" id="val2"
                    placeholder="Enter second number" required>
                <select name="operator" id="operator" required>
                    <option disabled selected>Select an operation</option>
                    <option value="+">Add</option>
                    <option value="-">Subtract</option>
                    <option value="*">Multiply</option>
                    <option value="/">Divide</option>
                </select>
                <button type="submit">Calculate</button>
            </form>
        </section>

        <section>
            <h2>Transpose of a matrix</h2>
            <form action="" method="POST">
                <input type="hidden" name="type" value="transpose">
                <textarea name="matrix" id="matrix" rows="6"
                    placeholder="Enter your matrix" required></textarea>
                <button type="submit">Find transpose</button>
            </form>
        </section>

        <section>
            <h2>Matrix addition/multiplication</h2>
            <form action="" method="POST">
                <textarea name="matrix1" id="matrix1" rows="6"
                    placeholder="Enter matrix 1" required></textarea>
                <textarea name="matrix2" id="matrix2" rows="6"
                    placeholder="Enter matrix 2" required></textarea>
                <select name="type" id="type" required>
                    <option disabled selected>Select an operation</option>
                    <option value="addition">Addition</option>
                    <option value="multiplication">Multiplication</option>
                </select>
                <button type="submit">Calculate</button>
            </form>
        </section>
    </main>
</body>

</html>
