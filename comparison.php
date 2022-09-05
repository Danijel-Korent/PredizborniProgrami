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

    $listOfPromises = array();

    array_push($listOfPromises, "dummy");
    array_push($listOfPromises, "dummy");
    array_push($listOfPromises, "dummy");


    foreach($listOfPromises as $promise) {
        echo "<tr>";
        echo "<td>Pokusni Gradonacelnik</td>";
        echo "<td>Pokusni Grad</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "</tr>";
    }
    ?>
</table>


</body>
</html>
