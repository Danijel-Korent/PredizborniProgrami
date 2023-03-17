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


$Comparison_Data = get_all_mayors_comparison();
?>


<body>
<p> <a href="./index.php">Glavna</a> | Gradonacelnik | <b>Usporedba</b> </p>

<br/>
<br/>

<table>
    <tr>
        <th>Gradonacelnik</th>
        <th>Grad</th>
        <?php
          foreach($Comparison_Data->list_of_categories as $category) {
            echo "<th>" . $category . "</th>";
          }
        ?>
    </tr>

    <?php
    foreach($Comparison_Data->list_of_mayors as $mayor_promises) {
        echo "<tr>";
        echo "<td>$mayor_promises->mayor_name</td>";
        echo "<td>$mayor_promises->city_name</td>";

        foreach($Comparison_Data->list_of_categories as $category) {
          if (array_key_exists($category, $mayor_promises->promises)) {
            echo "<td>" . $mayor_promises->promises[$category][0] . " od " . $mayor_promises->promises[$category][1] . "</td>";
          } else {
            echo "<td> n/a </td>";
          }
        }

        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
