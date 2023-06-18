<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreign Language Platform - Admin Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .admin-actions-list {
            list-style-type: none;
            padding-left: 0;
        }

        .admin-actions-list li {
            margin-bottom: 10px;
        }

        .admin-actions-list li a {
            color: #007bff;
            text-decoration: none;
        }

        .admin-actions-list li a:hover {
            text-decoration: underline;
        }

        .container h3{
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    session_start();

    // Check if the user is logged in and is an admin
    if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] !== 1) {
        // Redirect the user to the login page or show an error message
        header("Location: login.php");
        exit;
    }

    include 'nav.php'; // Include the navigation bar for admin

    // Retrieve the logged-in user's name from the 'user' table in the database
    $servername = "127.0.0.1";
    $username = "root";
    $dbpassword = "";
    $dbname = "osp group project";

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $dbpassword);

    // Prepare the SQL statement to fetch the user's name based on their ID
    $stmt = $pdo->prepare("SELECT name FROM user WHERE id = :user_id LIMIT 1");
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->execute();

    // Check if the user exists
    if ($stmt->rowCount() > 0) {
        $adminName = $stmt->fetchColumn();
    } else {
        // Default name if the admin is not found
        $adminName = "Admin User";
    }

    ?>

    <div class="container">
        <h3>Welcome, <?php echo $adminName; ?> </h3>
        <div class="card">
            <h4>Admin Actions</h4>
            <ul class="admin-actions-list">
                <ul>
            <li>Manage Learning Materials</li>
            <ul>
            <li><a href="Japanese.php">Japanese</a></li>
                <li><a href="Chinese.php">Chinese</a></li>
                <li><a href="Korean.php">Korean</a></li>
                </ul>
                <li><a href="manage_forum.php">Manage Forum</a></li>
            </ul>
            </ul>
        </div>
    </div>

</body>

</html>
