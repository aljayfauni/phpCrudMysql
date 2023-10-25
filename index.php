<?php
include "config.php";
include "functions/ItemCRUD.php";

$itemCRUD = new ItemCRUD($db);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["create"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $itemCRUD->create($username, $password, $email);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MySQL CRUD</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <div class="page-container">
        <header>
            <div class="main-header">
                <div class="logo">PHP MySQL CRUD</div>
                <div class="menu">
                    <ul>
                        <li>Home</li>
                        <li>About</li>
                        <li>List</li>
                    </ul>
                </div>
            </div>
        </header>
        <section class="addform">
            <form action="" method="post">
                <input type="text" name="username" class="type text" placeholder="UserName">
                <input type="password" name="password" class="type text" placeholder="Password">
                <input type="email" name="email" class="type text" placeholder="Email">
                <br>
                <button type="submit" name="create">Add User</button>
            </form>
        </section>
        <section>
            <div class="users-table">
                <table class="tbl-users">
                    <tr>
                        <th>ID</th>
                        <th>UserName</th>
                        <th>Email</th>
                    </tr>
                    <?php
                    // Retrieve data from the database and display it in the table
                    $items = $itemCRUD->read();
                    foreach ($items as $item) {
                        echo "<tr>";
                        echo "<td>{$item['id']}</td>";
                        echo "<td>{$item['username']}</td>"; // 'name' corresponds to 'username' in the database
                        echo "<td>{$item['email']}</td>"; // 'description' corresponds to 'email' in the database
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </section>
        <footer>
            <div class="footer">
                &copy; <?php echo date("Y"); ?>
            </div>
        </footer>
    </div>
</body>
</html>
