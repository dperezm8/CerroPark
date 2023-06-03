<?php 
$variableBusqueda1;
$variableBusqueda2;
$variableBusqueda3;

if (isset($_POST['searchBar'])) {
    $searchBar = $_POST['searchBar'];
    $query = "SELECT * FROM coches WHERE $variableBusqueda1 LIKE '%$searchBar%' or 
                                        $variableBusqueda2 LIKE '%$searchBar%'or
                                        $variableBusqueda3 LIKE '%$searchBar%";
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $coches = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $coches = []; // Empty array if no results found
    }
}