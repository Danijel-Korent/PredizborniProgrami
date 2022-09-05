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
<p> <a href="./index.php">Glavna</a> | <b>Gradonacelnik</b> | <a href="./comparison.php">Usporedba</a> </p>

<br/>
<br/>

<p>Gradonacelnik: <b>Darko Darkovic</b></p>
<p>Grad: <b>Darkograd</b></p>

<br/>
<p>Prijavite promjene na slijedecem linku: LINK</p>

<br/>
<br/>
<h2 id="uprava">Gradska uprava i upravljanje</h2>

<table>
    <tr>
        <th>Opis obecanja</th>
        <th>Sazetak obecanja</th>
        <th>Link</th>
        <th>Lokacija</th>
        <th>Rezultat</th>
    </tr>
    <tr>
        <td>Smanjenje broja gradskih ureda sa 27 na petnaestak</td>
        <td>"Gradska uprava mora biti bolje organizirana, s manjim brojem ustrojstvenih jedinica, dogovorenim ciljevima i jasnim linijama odgovornosti. Postojecih 27 gradskih ureda restrukturirat cemo tako da okrupnimo nadleznosti i smanjimo njihov broj na petnaestak."</td>
        <td><a href="https://web.archive.org/web/20210713062826/zagreb.mozemo.hr/program/gospodarstvo-grada-kao-motor-promjene" target="_blank">https://web.archive.org/web/20210713062826/zagreb.mozemo.hr/program/gospodarstvo-grada-kao-motor-promjene</a></td>
        <td>na 7. stranici PDF progama</td>
        <td>Provedeno u predvidenom vremenskom okviru</td>
    </tr>
    <?php

    $listOfPromises = array();

    array_push($listOfPromises, "dummy");
    array_push($listOfPromises, "dummy");
    array_push($listOfPromises, "dummy");


    foreach($listOfPromises as $promise) {
        echo "<tr>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "</tr>";
    }
    ?>
</table>

<br/>
<br/>
<h2 id="ekonomija">Ekonomija i gospodarstvo</h2>

<table>
    <tr>
        <th>Opis obecanja</th>
        <th>Sazetak obecanja</th>
        <th>Link</th>
        <th>Lokacija</th>
        <th>Rezultat</th>
    </tr>
    <tr>
        <td>Biranje menadzmenta gradskih poduzeca na javnim natjecajima</td>
        <td>"Profesionalizirat cemo menadzment gradskih poduzeca i izabrati ga na javnim natjecajima, a njihov rad cemo vrednovati prema kriterijima javnog interesa."</td>
        <td><a href="https://web.archive.org/web/20210713062826/zagreb.mozemo.hr/program/gospodarstvo-grada-kao-motor-promjene" target="_blank">https://web.archive.org/web/20210713062826/zagreb.mozemo.hr/program/gospodarstvo-grada-kao-motor-promjene</a></td>
        <td>na 7. stranici PDF progama</td>
        <td>Djelomicno provedeno u predvidenom vremenskom okviru</td>
    </tr>
    <?php
    foreach($listOfPromises as $promise) {
        echo "<tr>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "<td>Test</td>";
        echo "</tr>";
    }
    ?>
</table>

<br/>
<br/>
<h2 id="ekonomija">Urbanizam i stanovanje</h2>

<table>
    <tr>
        <th>Opis obecanja</th>
        <th>Sazetak obecanja</th>
        <th>Link</th>
        <th>Lokacija</th>
        <th>Rezultat</th>
    </tr>
    <tr>
        <td>Stavljanje u funkciju sve gradske poslovne i stambene prostore</td>
        <td>"Dugorocno cemo staviti u funkciju sve gradske poslovne i stambene prostore cime cemo stvoriti prihod od najma"</td>
        <td><a href="https://web.archive.org/web/20210713062730/zagreb.mozemo.hr/program/" target="_blank">https://web.archive.org/web/20210713062730/zagreb.mozemo.hr/program/</a></td>
        <td>na 9. stranici PDF progama</td>
        <td>Djelomicno provedeno u predvidenom vremenskom okviru</td>
    </tr>
    <?php
    foreach($listOfPromises as $promise) {
        echo "<tr>";
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
