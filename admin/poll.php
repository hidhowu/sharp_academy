<?php
// Start the session
session_start();

// Check if the user session is active and the user role is 'admin'
if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
    // User session is active and user role is 'admin'
    // Perform actions for authorized users here

    // Example: Display a welcome message
    // echo "Welcome, Admin!";

  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Bar Chart Example</title>
    <link
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-gray-100">
  <div class="mt-10 flex justify-center" id="">

<a href="index.php"  id=""
        class="bg-gray-500  ml-5 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded">
    Back to Dashboard
</a>
</div>
    <div class="container mx-auto p-6">
      <div class="grid lg:grid-cols-2 gap-8">
        <div class="bg-white rounded shadow p-6">
          <h2 class="text-lg font-semibold mb-4">
            What platform do you prefer for our classes to take place
          </h2>
          <div id="chart1" class="h-60"></div>
        </div>
        <div class="bg-white rounded shadow p-6">
          <h2 class="text-lg font-semibold mb-4">
            Which time of the day do you prefer
          </h2>
          <div id="chart2" class="h-60"></div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.27.3"></script>
    <script>
      // Fetch data from PHP script
      fetch("data.php")
        .then((response) => response.json())
        .then((data) => {
          //   console.log(data);
          // Create chart 1
          new ApexCharts(document.querySelector("#chart1"), {
            series: [{ data: data[0].map((item) => item.value) }],
            chart: { type: "bar" },
            xaxis: { categories: data[0].map((item) => item.label) },
          }).render();

          // Create chart 2
          new ApexCharts(document.querySelector("#chart2"), {
            series: [{ data: data[1].map((item) => item.value) }],
            chart: { type: "bar" },
            xaxis: { categories: data[1].map((item) => item.label) },
          }).render();
        });
    </script>
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