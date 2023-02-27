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
//print_r($listOfMayors);
//var_dump($listOfMayors);
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
    <tr>
        <td><a href="./mayor.php">Darko Darkovic</a></td>
        <td>Darkograd</td>
        <td>5 / 30</td>
    </tr>
    <tr>
        <td><a href="./mayor.php">Marko Markovic</a></td>
        <td>Markograd</td>
        <td>10 / 30</td>
    </tr>
    <tr>
        <td><a href="./mayor.php">Ivan Ivankovic</a></td>
        <td>Ivangrad</td>
        <td>15 / 30</td>
    </tr>
    <?php
    foreach($listOfMayors as $mayor) {
        echo "<tr>";
        echo "<td><a href=\"./mayor.php\">$mayor->mayor_name</a></td>";
        echo "<td>$mayor->city_name</td>";
        echo "<td>$mayor->num_of_fulfilled_promises / $mayor->num_of_promises</td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
