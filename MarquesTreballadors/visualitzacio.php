<style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        th {
            background-color: #326690;
            color: white;
            height: 2em;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table {
            position: absolute;
            top: 50%;
            left: 50%;
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            border-collapse: collapse;
            min-width: max-content;
        }

    </style>

<html>
<body>
<input type="text" onkeyup="NameSearcher()" id="name">
<table id="table">
    <tr>
    <td>Nom</td>
    <td>Cognom</td>
    <td>Cognom2</td>
    </tr>
    

<?php

$fileContents = file_get_contents("test.me");
$trebOffset = 0;

while (strpos($fileContents, "treballador", $trebOffset)) {
echo "<tr>";

    $startindex = strpos($fileContents, "!-nom-!", $trebOffset) + 7;
    $endindex = strpos($fileContents, "/!-nom-!", $trebOffset);
    $nom = substr($fileContents, $startindex, $endindex - $startindex);

    echo "<td>$nom</td>";

    $startindex = strpos($fileContents, "!-cognom1-!", $endindex) + 11;
    $endindex = strpos($fileContents, "/!-cognom1-!", $startindex);
    $cognom1 = substr($fileContents, $startindex, $endindex - $startindex);

    echo "<td>$cognom1</td>";

    $startindex = strpos($fileContents, "!-cognom2-!", $endindex) + 11;
    $endindex = strpos($fileContents, "/!-cognom2-!", $startindex);
    $cognom2 = substr($fileContents, $startindex, $endindex - $startindex);

    echo "<td>$cognom2</td>";

    $trebOffset = strpos($fileContents, "treballador", $endindex) + 3;

    echo "</tr>";
}



/*$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode(file_get_contents("test.json"), TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "</tr><tr>";
    } else {
        echo "<td>$val</td>";
    }
}*/
?>


<script>
    function NameSearcher() {

var input, filter, table, tr, td, i, txtValue;
input = document.getElementById("name");
filter = input.value.toUpperCase();
table = document.getElementById("table");
tr = table.getElementsByTagName("tr");

for (i = 1; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
}
</script>
</body>


</html>


