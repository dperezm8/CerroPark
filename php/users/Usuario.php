<?php
require_once 'php/db.php';

// Function to fetch all user records
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

// Function to update a user record
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

    $deleteCarsQuery = "DELETE FROM coches WHERE idUsuarioCoche = ?";
    $stmtDeleteCars = $conn->prepare($deleteCarsQuery);
    $stmtDeleteCars->bind_param("i", $id);
    $stmtDeleteCars->execute();
    $stmtDeleteCars->close();

    // Delete the user
    $deleteUserQuery = "DELETE FROM users WHERE id = ?";
    $stmtDeleteUser = $conn->prepare($deleteUserQuery);
    $stmtDeleteUser->bind_param("i", $id);

    if ($stmtDeleteUser->execute()) {
        // Successful deletion
        header("Location: usersInfo.php");
        exit();
    } else {
        // Error occurred
        echo "Error deleting user: " . $conn->error;
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