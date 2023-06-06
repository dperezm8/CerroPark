<?php
require_once 'php/db.php';

// Saca la informacion de todos los usuarios
function fetchUsers()
{
    global $conn;

    $query = "SELECT * FROM users";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    return [];
}

// Actualiza el permiso de cada usuario
function updateUser($id, $permiso)
{
    global $conn;

    $query = "UPDATE users SET permiso = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $permiso, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: usersInfo");
    exit();
}

// Function to delete a user record
function deleteUser($id)
{
    global $conn;

    //Eliminar los coches en la que la idUsuarioCoche sea igual a la id seleccionada, 
    //es decir, la id del usuario que eliminemos
    $deleteCarsQuery = "DELETE FROM coches WHERE idUsuarioCoche = ?";
    $stmtDeleteCars = $conn->prepare($deleteCarsQuery);
    $stmtDeleteCars->bind_param("i", $id);
    $stmtDeleteCars->execute();
    $stmtDeleteCars->close();

    // Elimina al usuario
    $deleteUserQuery = "DELETE FROM users WHERE id = ?";
    $stmtDeleteUser = $conn->prepare($deleteUserQuery);
    $stmtDeleteUser->bind_param("i", $id);

    if ($stmtDeleteUser->execute()) {
        // Si tiene exito al borrar, esto se refleja en el url
        header("Location: usersInfo.php?Usuario_eliminado_con_exito");
        exit();
    } else {
        // Si hay un error eliminando el usuario, redirigue al menu y cambia el url
        header("Location: usersInfo.php?error_eliminando_usuario");
    }

    $stmtDeleteUser->close();

    header("Location: usersInfo");
    exit();
}

// Fetch all user records
$users = fetchUsers();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["update"])) {
        // Update user record
        $userId = mysqli_real_escape_string($conn, $_POST["userId"]);
        $permiso = mysqli_real_escape_string($conn, $_POST["permiso"]);
        updateUser($userId, $permiso);
    } elseif (isset($_POST["delete"])) {
        // Delete user record
        $userId = $_POST["userId"];
        deleteUser($userId);
    }
}

?>