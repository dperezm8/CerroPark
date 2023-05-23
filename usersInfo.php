<?php
include 'php/Usuario.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>
<body>
    <h1>User Information</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Permiso</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['first_name']; ?></td>
                    <td><?php echo $user['last_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php if ($user['permiso'] == 0) {
                                echo 'Usuario';
                                } else if ($user['permiso'] == 1) {
                                    echo 'Administrador';
                                } else {
                                    echo 'Policia';
                                }; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
                            <input type="text" name="firstName" value="<?php echo $user['first_name']; ?>">
                            <input type="text" name="lastName" value="<?php echo $user['last_name']; ?>">
                            <input type="text" name="email" value="<?php echo $user['email']; ?>">
                            <select name="permiso">
                                <option hidden></option>
                                <option value="0" <?php echo ($user['permiso'] == 0) ? 'selected' : ''; ?>>Usuario</option>
                                <option value="1" <?php echo ($user['permiso'] == 1) ? 'selected' : ''; ?>>Adminstrador</option>
                                <option value="2" <?php echo ($user['permiso'] == 2) ? 'selected' : ''; ?>>Policia</option>
                            </select>
                            <button type="submit" name="update">Update</button>
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php">Go Back</a>
</body>
</html>