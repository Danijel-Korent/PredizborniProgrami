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

$listOfPromises = get_single_mayor_data("Test", "Test");

echo "<pre>";
//print_r($listOfPromises);
//var_dump($listOfPromises);
echo " </pre>";
?>


<body>
<p> <a href="./index.php">Glavna</a> | <b>Gradonacelnik</b> | <a href="./comparison.php">Usporedba</a> </p>

<br/>
<br/>

<p>Gradonacelnik: <b>Darko Darkovic</b></p>
<p>Grad: <b>Darkograd</b></p>

<br/>
<p>Prijavite promjene na slijedecem linku: LINK</p>



<?php

foreach($listOfPromises as $category => $all_promises_in_category) {

    if (empty($all_promises_in_category)) {
        continue;
    }

    echo "<br/>";
    echo "<br/>";

    echo "<h2 id='category'>$category</h2>";

    $html = <<< HTML
    <table>
        <tr>
            <th>Opis obecanja</th>
            <th>Sazetak obecanja</th>
            <th>Link</th>
            <th>Lokacija</th>
            <th>Rezultat</th>
        </tr>
    HTML;

        echo $html;

        foreach($all_promises_in_category as $promise) {
            echo "<tr>";
            echo "<td>$promise->name</td>";
            echo "<td>$promise->description</td>";
            echo "<td><a href=\"$promise->source_URL\" target=\"_blank\">$promise->source_URL</td>";
            echo "<td>$promise->location</td>";
            echo "<td>$promise->status</td>";
            echo "</tr>";
        }

    echo "</table>";
    }
?>


</body>
</html>
