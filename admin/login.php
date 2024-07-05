<?php
session_start();
require('../includes/db.php');
// Assuming you have already started the session and established a database connection

// Function to set the user role in the session
function setAdminSession($userRole) {
    $_SESSION['user_role'] = $userRole;
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the login form inputs (e.g., username and password)
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password (e.g., compare with database)

    // Assuming you have a table named 'user' with columns 'username', 'password', and 'user_role'
    $sql = "SELECT user_role FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $userRole);
    mysqli_stmt_fetch($stmt);

    // Check if the user login is successful
    if ($userRole === 'admin') {
        // Set the admin session
        setAdminSession($userRole);

    // $_SESSION['user_role'];

        // Redirect to the admin page or perform any other action
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials, display an error message
        $errorMessage = "Invalid username or password";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// HTML form for the login page
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded shadow-md lg:w-6/12 w-11/12">
            <h1 class="text-2xl font-bold mb-4">Login</h1>

            <?php if (isset($errorMessage)) : ?>
                <p class="text-red-500 mb-4"><?php echo $errorMessage; ?></p>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-medium mb-2">Username:</label>
                    <input type="text" id="username" name="username" required class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 border border-gray-300 rounded">
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-4 py-2 rounded">Login</button>
            </form>
        </div>
    </div>
</body>
</html>

