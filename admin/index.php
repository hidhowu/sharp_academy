<?php
// Start the session
session_start();
include '../includes/db.php';

// Check if the user session is active and the user role is 'admin'
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
    // User session is active and user role is 'admin'
    // Perform actions for authorized users here


    if (isset($_POST['logout'])) {
      // Unset all session variables
      $_SESSION = array();
  
      // Destroy the session
      session_destroy();
  
      // Redirect to the login page or perform any other action
      header("Location: login.php");
      exit();
  }


// Assuming you have established a database connection

// Execute the select count query
$sql = "SELECT COUNT(*) AS total_rows FROM members";
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the total number of rows
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total_rows'];

    // Display the total number of rows
    // echo "Total Rows: " . $totalRows;
} else {
    // Query failed, display an error message or handle the error
    echo "Error: " . mysqli_error($conn);
}

// Free the result set
mysqli_free_result($result);


    // Example: Display a welcome message
    // echo "Welcome, Admin!";

  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Button Example</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <style>
      /* Center the buttons */
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
    </style>
  </head>
  <body class="bg-gray-100 ">
    <div class="block lg:flex-col w-11/12">

      <div class="font-bold text-4xl flex-wrap text-center leading-relaxed" id="">
        Welcome to your Mini Admin <br> Oga Sharpkeys🙌🏻
      </div>

      <div class="font-medium text-3xl mt-4 flex-wrap text-center" id="">
       Total Registered Users: <?php echo $totalRows?>
      </div>
  
      <form method="POST" action="">
      <div class="flex flex-col w-7/12 lg:w-auto mx-auto">
        <a href="mailersend.php"
          class="bg-blue-500 text-center hover:bg-blue-700 text-white font-bold py-4 px-8 rounded my-6 block"
        >
          Email Sender
        </a>
        <a  href="stat.php"
          class="bg-green-500 text-center hover:bg-green-700 text-white font-bold py-4 px-8 rounded my-6 block"
        >
          Email Statistics
        </a>
        <a  href="poll.php"
          class="bg-purple-500 text-center hover:bg-purple-700 text-white font-bold py-4 px-8 rounded my-6 block"
        >
          Poll Checker
        </a>
  
        <button
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-4 px-8 rounded my-6 block"   type="submit" name="logout"
        >
        Logout
        </button>
        
      </div>
    </form>
    </div>
  </body>
</html>
<?php

} else {
    // User session is not active or user role is not 'admin'
    // Redirect to the login page or perform any other action
    header("Location: login.php");
    exit();
}
?>