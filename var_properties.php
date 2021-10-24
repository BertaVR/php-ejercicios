

<?php
/*                           Best I could do :(                */

//start table
echo "<table style ='border:solid black; border-collapse: collapse';>";

// variables:
// rows
$vars = ["hehe", true, "hello", 0, "", false, 23424234, 9.0, 0.0];
// columns
$methods = ['is_empty', 'get_boolean', 'is_set', 'is_it_null'];

// methods:
function is_it_null($param) // I wanted to check wether it was easy to add extra columns
{
    return is_null($param) ?: '0';
    // return empty($param) ?'true': 'false';
}

function is_empty($param)
{
    return empty($param) ?: '0';
    // return empty($param) ?'true': 'false';
}

function get_boolean($param)
{
    return boolval($param) ?: '0';
    // return boolval($param) ?'true': 'false';
}

function is_set($param)
{
    return isset($param)  ?: '0';
    // return isset($param) ?'true': 'false';

};
// first row of table (<th>)
echo "<tr style='background-color:#B775EC'><th style ='border:solid black'> variable </th>";

foreach ($methods as $method) {
    echo "<th style ='border:solid black'>$method </th>";

}

echo "</tr>";

//end first row of table

// next rows: dynamic, more methods can be added

foreach ($vars as $var) {
    print '<tr>';

    echo "<td style='border:solid black'>" . json_encode($var) . "</td>";
    foreach ($methods as $method) {
        echo "<td style ='border:solid black'>" . $method($var) . '</td>';
    }

    echo '</tr>';

}


echo "</table>";

?>


