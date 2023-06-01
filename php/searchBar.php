<?php 
$variableBusqueda1;
$variableBusqueda2;
$variableBusqueda3;
$mezclaVariable;

if (isset($_POST['searchBar'])) {
    $searchBar = $_POST['searchBar'];
    $query = "SELECT * FROM users WHERE $variableBusqueda1 LIKE '%$searchBar%' or 
                                        $variableBusqueda2 LIKE '%$searchBar%'or
                                        $variableBusqueda3 LIKE '%$searchBar%' or
                                        $mezclaVariable LIKE '%$searchBar%'";
    $result = $conn->query($query);
    $users = $result->fetch_all(MYSQLI_ASSOC);
}