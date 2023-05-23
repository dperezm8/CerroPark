<?php
require_once 'php/db.php';

?>
<html lang="en">
<head>
    <link rel="stylesheet" href= "styles/styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="scripts/hamburguer.js" defer></script>
    <?php
    require_once("php/db.php");

    if(isset($_GET['id']) && !empty($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
        $id = $_GET['id'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<title>" . $row['name'] . "</title>";
    }
}
        ?>
</head>
    <body>
    <?php
    include 'includes/nav.php';
    ?>

    <?php
    include 'includes/footer.php';
    ?>
    </body>
</html>