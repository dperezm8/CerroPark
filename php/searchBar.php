<?php 
if (isset($_POST['searchBar'])) {
    $searchBar = $_POST['searchBar'];
    $query = "SELECT * FROM users WHERE email LIKE '%$searchBar%' or 
                                        first_name LIKE '%$searchBar%'or
                                        last_name LIKE '%$searchBar%'";
    $result = $conn->query($query);
    $users = $result->fetch_all(MYSQLI_ASSOC);
}