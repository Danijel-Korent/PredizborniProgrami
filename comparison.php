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


$listOfMayors = get_all_mayors_comparison();
?>


<body>
<p> <a href="./index.php">Glavna</a> | Gradonacelnik | <b>Usporedba</b> </p>

<br/>
<br/>

<table>
    <tr>
        <th>Gradonacelnik</th>
        <th>Grad</th>
        <th>Ekonomija i gospodarstvo</th>
        <th>Okoliš i zaštita prirode</th>
        <th>Urbanizam i stanovanje</th>
        <th>Promet</th>
        <th>Obrazovanje</th>
        <th>Kultura</th>
        <th>Zdravstvo</th>
        <th>Socijalna politika</th>
        <th>Sigurnost</th>
        <th>Mladi</th>
        <th>Civilno društvo</th>
        <th>Sport</th>
        <th>Mjesna samouprava</th>
        <th>Gradska uprava i upravljanje</th>
    </tr>
    <tr>
        <td><a href="./mayor.php">Darko Darkovic</a></td>
        <td>Darkograd</td>
        <td>1 od 14</td>
        <td>2 od 14</td>
        <td>3 od 14</td>
        <td>4 od 14</td>
        <td>5 od 14</td>
        <td>6 od 14</td>
        <td>7 od 14</td>
        <td>8 od 14</td>
        <td>9 od 14</td>
        <td>10 od 14</td>
        <td>11 od 14</td>
        <td>12 od 14</td>
        <td>13 od 14</td>
        <td>14 od 14</td>
    </tr>
    <tr>
        <td>Marko Markovic</td>
        <td>Markograd</td>
        <td>1 od 14</td>
        <td>2 od 14</td>
        <td>3 od 14</td>
        <td>4 od 14</td>
        <td>5 od 14</td>
        <td>6 od 14</td>
        <td>7 od 14</td>
        <td>8 od 14</td>
        <td>9 od 14</td>
        <td>10 od 14</td>
        <td>11 od 14</td>
        <td>12 od 14</td>
        <td>13 od 14</td>
        <td>14 od 14</td>
    </tr>
    <tr>
        <td>Ivan Ivankovic</td>
        <td>Ivangrad</td>
        <td>1 od 14</td>
        <td>2 od 14</td>
        <td>3 od 14</td>
        <td>4 od 14</td>
        <td>5 od 14</td>
        <td>6 od 14</td>
        <td>7 od 14</td>
        <td>8 od 14</td>
        <td>9 od 14</td>
        <td>10 od 14</td>
        <td>11 od 14</td>
        <td>12 od 14</td>
        <td>13 od 14</td>
        <td>14 od 14</td>
    </tr>

    <?php
    foreach($listOfMayors as $mayor_promises) {
        echo "<tr>";
        echo "<td>$mayor_promises->mayor_name</td>";
        echo "<td>$mayor_promises->city_name</td>";
        // TODO: This hardcoded categories will be raplaced with a loop after "category provider" (that returns list of all categories) is implemented
        echo "<td>" . $mayor_promises->promises["Ekonomija i gospodarstvo"][0] . " od " . $mayor_promises->promises["Ekonomija i gospodarstvo"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Okoliš i zaštita prirode"][0] . " od " . $mayor_promises->promises["Okoliš i zaštita prirode"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Urbanizam i stanovanje"][0] . " od " . $mayor_promises->promises["Urbanizam i stanovanje"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Promet"][0] . " od " . $mayor_promises->promises["Promet"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Obrazovanje"][0] . " od " . $mayor_promises->promises["Obrazovanje"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Kultura"][0] . " od " . $mayor_promises->promises["Kultura"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Zdravstvo"][0] . " od " . $mayor_promises->promises["Zdravstvo"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Socijalna politika"][0] . " od " . $mayor_promises->promises["Socijalna politika"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Sigurnost"][0] . " od " . $mayor_promises->promises["Sigurnost"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Mladi"][0] . " od " . $mayor_promises->promises["Mladi"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Civilno društvo"][0] . " od " . $mayor_promises->promises["Civilno društvo"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Sport"][0] . " od " . $mayor_promises->promises["Sport"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Mjesna samouprava"][0] . " od " . $mayor_promises->promises["Mjesna samouprava"][1] . "</td>";
        echo "<td>" . $mayor_promises->promises["Gradska uprava i upravljanje"][0] . " od " . $mayor_promises->promises["Gradska uprava i upravljanje"][1] . "</td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
