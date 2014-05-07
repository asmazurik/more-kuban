<?php include("database_connection.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>super-puper title</title>
</head>

<body>

<form method="post">
Enter max price: <input name="askPrice"><br>
Enter min floor: <input name="askMinFloor"><br>
Enter max floor: <input name="askMaxFloor"><br>
<input type="submit" name="ask" value="Найти квартиры">
</form>


<form method="post">
Enter price: <input name="addPrice"><br>
Enter floor: <input name="addFloor"><br>
Enter house floors: <input name="addTotalFloors"><br>
<input type="submit" name="add" value="Добавить квартиру">
</form>

<form method="post">
<input type="submit" name="delete" value="Удалить все">
</form>

<?php

if(isset($_POST['add'])) {
    $a = $_POST['addPrice'];
    $b = $_POST['addFloor'];
    $c = $_POST['addTotalFloors'];
    $query = "INSERT INTO flats (price, floor, total_floors) VALUES($a,$b,$c)";
    $result = mysql_query($query);
    echo "<p>Adding... ".($result ? "OK" : "FAIL")."</p>";
}

if(isset($_POST['delete'])) {
    $query = "DELETE FROM  flats";
    $result = mysql_query($query);
    echo "<p>Deleting... ".($result ? "OK" : "FAIL")."</p>";
}

function formatQueryOutput($query, $prefix = "", $suffix = "") {
    if ($result = mysql_query($query)) {
        echo "<p>$prefix</p>";
        while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
            printf(
                "<p>price: %d  floor: %d total flats: %d</p>",
                $row[0], $row[1], $row[2]);
        }
        echo "<p>$suffix</p>";
        return true;
    } else {
        echo "<p>query $query failed</p>";
        return false;
    }
}


if(isset($_POST['ask'])) {
    $a = $_POST['askPrice'];
    $b = $_POST['askMinFloor'];
    $c = $_POST['askMaxFloor'];
    $query = "SELECT * FROM flats WHERE
        price < $a AND
        floor BETWEEN $b AND $c";
    echo $query;
    formatQueryOutput($query,"Founded:","---------------------------");
}

formatQueryOutput("SELECT * FROM flats", "All variants:");
?>


</body>
</html>
