<?php 

if (isset($_POST['searchBar'])) {
    $searchBar = $_POST['searchBar'];
    $query = "SELECT * FROM $tabla WHERE $variableBusqueda1 LIKE '%$searchBar%' or 
                                        $variableBusqueda2 LIKE '%$searchBar%'or
                                        $variableBusqueda3 LIKE '%$searchBar%' or
                                        $mezclaVariable LIKE '%$searchBar%'";
    $result = $conn->query($query);
    $users = $result->fetch_all(MYSQLI_ASSOC);
   
    if(empty($searchBar)) {
        
    $urlActual = $_SERVER['PHP_SELF'];
    header("Location: $urlActual");
    } else {
    }
}