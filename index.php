<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pracenje predizbornih obecanja</title>

    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even) {
        background-color: #dddddd;
      }
    </style>
</head>


<?php
require_once "data_provider.php";

$listOfMayors = get_all_mayors_overview();

echo "<pre>";

if (0)
{
    $filename = 'test_data/test_data.tsv';
    $file = fopen($filename, 'r');

    if ($file) {
        while (($row = fgetcsv($file, 0, "\t")) !== false) {
            // $row is an array of the values in the current row
            // do something with the values, such as print them
            print_r($row);
        }
        fclose($file);
    }
}

//print_r($listOfMayors);
echo " </pre>";
?>


<body>
<p> <b>Glavna</b> | Gradonacelnik | <a href="./comparison.php">Usporedba</a></p>

<br/>
<br/>

<h2>Opis projekta</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et nisl at urna ultrices hendrerit eu sit amet turpis. In hac habitasse platea dictumst. Quisque diam erat, interdum a viverra quis, imperdiet non ipsum. Vestibulum commodo vitae leo quis efficitur. Vivamus diam dui, blandit id lorem et, fringilla aliquet ex. Vivamus commodo nunc eget arcu varius rhoncus non eu ante. Mauris gravida mauris sed facilisis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse sit amet posuere arcu.</p>

<h2>Metodologija projekta</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et nisl at urna ultrices hendrerit eu sit amet turpis. In hac habitasse platea dictumst. Quisque diam erat, interdum a viverra quis, imperdiet non ipsum. Vestibulum commodo vitae leo quis efficitur. Vivamus diam dui, blandit id lorem et, fringilla aliquet ex. Vivamus commodo nunc eget arcu varius rhoncus non eu ante. Mauris gravida mauris sed facilisis dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse sit amet posuere arcu.</p>

<br/>
<br/>

<table>
    <tr>
        <th>Gradonacelnik</th>
        <th>Grad</th>
        <th>Ispunjenih obecanja</th>
    </tr>
    <?php
    foreach($listOfMayors as $mayor) {
        echo "<tr>";
        echo "<td><a href=\"./mayor.php/?name=$mayor->mayor_name&city=$mayor->city_name\">$mayor->mayor_name</a></td>";
        echo "<td>$mayor->city_name</td>";
        echo "<td>$mayor->num_of_fulfilled_promises / $mayor->num_of_promises</td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
