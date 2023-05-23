<?php
include 'db.php';

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
function updateUser($id, $firstName, $lastName, $email, $permiso)
{
    global $conn;

    $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, permiso = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssii", $firstName, $lastName, $email, $permiso, $id);
    $stmt->execute();
    $stmt->close();
}

// Function to delete a user record
function deleteUser($id)
{
    global $conn;

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Fetch all user records
$users = fetchUsers();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["update"])) {
        // Update user record
        $userId = $_POST["userId"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $permiso = $_POST["permiso"];
        updateUser($userId, $firstName, $lastName, $email, $permiso);
    } elseif (isset($_POST["delete"])) {
        // Delete user record
        $userId = $_POST["userId"];
        deleteUser($userId);
    }

    //Busqueda de un usuario segun su email
    
}

?>