<?php
require_once 'php/db.php';

// Function to fetch all user records
function fetchCoches()
{
    global $conn;

    $query = "SELECT * FROM coches";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    return [];
}

// Function to update a user record
function updateCoche($idCoches, $paisDeMatricula, $matricula, $marca, $modelo, $validoHasta, 
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

    header("Location: cochesInfo.php");
    exit();
}

// Function to delete a user record
function deleteCoche($idCoches)
{
    global $conn;

    $query = "DELETE FROM coches WHERE idCoches = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $idCoches);
    $stmt->execute();
    $stmt->close();

    header("Location: cochesInfo.php");
    exit();
}

// Fetch all user records
$coches = fetchCoches();

// Retrieve matricula from session

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["update"])) {
        // Update user record
        $cocheId = mysqli_real_escape_string($conn, $_POST["cocheId"]);
        $paisMatricula = mysqli_real_escape_string($conn, $_POST["paisMatricula"]);
        $plate = mysqli_real_escape_string($conn, $_POST["plate"]);
        $make = mysqli_real_escape_string($conn, $_POST["make"]);
        $model = mysqli_real_escape_string($conn, $_POST["model"]);
        $validez = mysqli_real_escape_string($conn, $_POST["validez"]);
        $temporal = mysqli_real_escape_string($conn, $_POST["temporal"]);
        $altaDate = mysqli_real_escape_string($conn, $_POST["altaDate"]);
        $baja = mysqli_real_escape_string($conn, $_POST["baja"]);
        $bajaDate = mysqli_real_escape_string($conn, $_POST["bajaDate"]);
        $usuarioId = mysqli_real_escape_string($conn, $_POST["usuarioId"]);

        updateCoche($cocheId, $paisMatricula, $plate, $make, $model, $validez,
                    $temporal, $altaDate, $baja, $bajaDate, $usuarioId);
    } elseif (isset($_POST["delete"])) {
        // Delete user record
        $cocheId = $_POST["cocheId"];
        deleteCoche($cocheId);
    }
}
?>