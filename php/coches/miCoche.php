<?php
require_once 'php/db.php';
session_start();
// Function to fetch all user records
function fetchCochePropio($idUsuarioCoche)
{
    global $conn;

    $query = "SELECT * FROM coches WHERE idUsuarioCoche = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idUsuarioCoche);
    $stmt->execute();
    $result = $stmt->get_result();


    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    return [];
}

// Function to update a user record
function updateCochePropio($idCoches, $paisDeMatricula, $matricula, $marca, $modelo, $validoHasta, 
                    $cocheTemporal, $fechaAlta, $deBaja, $fechaBaja, $idUsuarioCoche)
{
    global $conn;

    // Encrypt the updated license plate using Argon2

    $query = "UPDATE coches SET paisDeMatricula = ?, matricula = ?, marca = ?, modelo = ?, validoHasta = ?, cocheTemporal = ?, fechaAlta = ?, deBaja = ?, fechaBaja = ?, idUsuarioCoche = ? WHERE idCoches = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssssssi", $paisDeMatricula, $matricula, $marca, $modelo, $validoHasta, 
                               $cocheTemporal, $fechaAlta, $deBaja, $fechaBaja, $idUsuarioCoche, $idCoches);
    $stmt->execute();
    $stmt->close();

    header("Location: misCoches.php");
    exit();
}

// Function to delete a user record
function deleteCochePropio($idCoches)
{
    global $conn;

    $query = "DELETE FROM coches WHERE idCoches = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idCoches);
    $stmt->execute();
    $stmt->close();

    header("Location: misCoches.php");
    exit();
}

// Fetch all user records
$userId = $_SESSION['idUsuarioCoche'];
$coches = fetchCochePropio($userId);

// Retrieve matricula from session

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["darDeBaja"])) {
        // Retrieve the values from the form
        $cocheId = $_POST["carId"];
        $baja = 1;
        $bajaDate = $_POST["bajaDate"];

        // Update the 'deBaja' field in the database
        updateDeBaja($cocheId, $baja, $bajaDate);
    }
}

// Function to update the 'deBaja' field in the database
function updateDeBaja($cocheId, $baja, $bajaDate)
{
    global $conn;

    $query = "UPDATE coches SET deBaja = ?, fechaBaja = ? WHERE idCoches = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("iss", $baja, $bajaDate, $cocheId);
    $stmt->execute();
    $stmt->close();

    header("Location: misCoches.php");
    exit();
}
error_reporting(E_ALL & ~E_NOTICE);

?>