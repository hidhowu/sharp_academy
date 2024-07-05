<?php
// Start the session
session_start();

// Check if the user session is active and the user role is 'admin'
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
    // User session is active and user role is 'admin'
    // Perform actions for authorized users here

    // Example: Display a welcome message
    // echo "Welcome, Admin!";


require ('../includes/db.php');
// Assuming you have already established a database connection

// Fetch data from the database
$query = "SELECT title, sent, read_email FROM stat";
$result = mysqli_query($conn, $query);

// Create an empty array to store the table rows
$rows = array();

// Calculate and format the conversion rate for each row
while ($row = mysqli_fetch_assoc($result)) {
    $conversionRate = ($row['read_email'] / $row['sent']) * 100;
    $conversionRate = number_format($conversionRate, 2); // Format the conversion rate with 2 decimal places

    // Add the row data to the array
    $rows[] = [
        'title' => $row['title'],
        'sent' => $row['sent'],
        'email_read' => $row['read_email'],
        'conversion_rate' => $conversionRate
    ];
}

// Close the database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Statistics</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    /* Custom styles for the table */
    .scrollable-table {
      overflow-x: auto;
      border-radius: 10px;
      background-color: #F7FAFC;
    }
  </style>
</head>

<body>
<div class="mt-10 flex justify-center" id="">

<a href="index.php"  id=""
        class="bg-gray-500  ml-5 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
    Back to Dashboard
</a>
</div>
  <div class="container mx-auto p-4">
    <h1 class="text-center text-3xl font-bold mb-4">Email Statistics</h1>

    <div class="scrollable-table">
      <table class="w-full">
        <thead>
          <tr>
            <th class="border sticky left-0  px-4 py-2 bg-white">Email Title</th>
            <th class="border px-4 py-2">Email Sent</th>
            <th class="border px-4 py-2">Email Read</th>
            <th class="border px-4 py-2">Conversion Rate (%)</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row): ?>
      <tr>
        <td class="border px-4 py-2 sticky left-0 bg-white font-medium text-sm lg:text-base"><?php echo $row['title']; ?></td>
        <td class="border px-4 py-2 text-sm lg:text-base"><?php echo $row['sent']; ?></td>
        <td class="border px-4 py-2 text-sm lg:text-base"><?php echo $row['email_read']; ?></td>
        <td class="border px-4 py-2 text-sm lg:text-base"><?php echo $row['conversion_rate']; ?>%</td>
      </tr>
    <?php endforeach; ?>
         
          <!-- Add more rows as needed -->
        </tbody>
      </table>
    </div>
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