<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "healthcare2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Fetch blood_pressure and heart_rate from patients table
$stmt = $conn->prepare("SELECT sex, height, weight, blood_type, blood_pressure, heart_rate, glucose_levels, symptoms, diagnosis, prescription, medical_history, allergies, surgeries, medications, family_history FROM patients WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$health_data = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="bg-blue-100">
    <?php include('header.php'); ?>

    <div class="bg-blue-100 text-black py-4 px-8 flex justify-between items-center">
        <h1 class="text-2xl font-semibold">DASHBOARD</h1>
        <p class="text-sm text-gray-600"><?php echo date("j F Y"); ?></p>
    </div>

    <div class="px-4 lg:pl-8">
        <div class="flex flex-wrap justify-start gap-4 mb-8 py-2">
            <!-- Heart Rate -->
            <div class="bg-pink-300 rounded-lg shadow-md flex items-center justify-between p-4 w-full sm:w-auto mb-4">
                <div class="flex items-center">
                    <img src="assets\img\icons-heart.png" alt="Heart Icon" class="w-8 h-8 mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Heart Rate</h3>
                        <p class="text-gray-700 text-sm">Current: <span class="font-semibold"><?php echo $health_data['heart_rate']; ?> bpm</span></p>
                    </div>
                </div>
            </div>
            <!-- Blood Pressure -->
            <div class="bg-blue-300 rounded-lg shadow-md flex items-center justify-between p-4 w-full sm:w-auto mb-4">
                <div class="flex items-center">
                    <img src="assets/img/blood-pressure-icon1.png" alt="Pressure Icon" class="w-8 h-8 mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Blood Pressure</h3>
                        <p class="text-gray-700 text-sm">Current: <span class="font-semibold"><?php echo $health_data['blood_pressure']; ?> mmHg</span></p>
                    </div>
                </div>
            </div>
            <!-- Glucose Levels -->
            <div class="bg-purple-300 rounded-lg shadow-md flex items-center justify-between p-4 w-full sm:w-auto mb-4">
                <div class="flex items-center">
                    <img src="assets\img\glucometer.png" alt="Glucose Icon" class="w-8 h-8 mr-4">
                    <div>
                        <h3 class="text-lg font-semibold text-white">Glucose Levels</h3>
                        <p class="text-gray-700 text-sm">Current: <span class="font-semibold"><?php echo $health_data['glucose_levels']; ?> mg/dL</span></p>
                    </div>
                </div>
            </div>
            <!-- Patient Information -->
            <div class="bg-yellow-300 rounded-lg shadow-md p-6 w-full sm:w-full lg:w-1/3 xl:w-1/3 mb-4">
                <div>
                    <h3 class="text-lg font-semibold text-white text-center">Patient Information</h3>
                    <div class="grid grid-cols-2 gap-2 mt-4">
                        <p class="text-gray-700 text-sm"><span class="font-semibold">Sex:</span> <?php echo $health_data['sex']; ?></p>
                        <p class="text-gray-700 text-sm"><span class="font-semibold">Height:</span> <?php echo $health_data['height']; ?> cm</p>
                        <p class="text-gray-700 text-sm"><span class="font-semibold">Weight:</span> <?php echo $health_data['weight']; ?> kg</p>
                        <p class="text-gray-700 text-sm"><span class="font-semibold">Blood Type:</span> <?php echo $health_data['blood_type']; ?></p>
                    </div>
                </div>
            </div>
      <!-- Second Row - Additional Information and Chart -->
<div class="flex justify-between mb-8 py-2">
    <!-- Additional Information -->
    <div class="bg-green-300 rounded-lg shadow-md p-6 w-full sm:w-full lg:w-1/2 xl:w-1/2 mb-4 lg:mr-2 xl:mr-2">
        <div>
            <h3 class="text-lg font-semibold text-white text-center">Additional Information</h3>
            <div class="grid grid-cols-2 gap-2 mt-4">
                <p class="text-gray-700 text-sm"><span class="font-semibold">Symptoms:</span> <?php echo $health_data['symptoms']; ?></p>
                <p class="text-gray-700 text-sm"><span class="font-semibold">Diagnosis:</span> <?php echo $health_data['diagnosis']; ?></p>
                <p class="text-gray-700 text-sm"><span class="font-semibold">Prescription:</span> <?php echo $health_data['prescription']; ?></p>
                <p class="text-gray-700 text-sm"><span class="font-semibold">Medical History:</span> <?php echo $health_data['medical_history']; ?></p>
                <p class="text-gray-700 text-sm"><span class="font-semibold">Allergies:</span> <?php echo $health_data['allergies']; ?></p>
                <p class="text-gray-700 text-sm"><span class="font-semibold">Surgeries:</span> <?php echo $health_data['surgeries']; ?></p>
                <p class="text-gray-700 text-sm"><span class="font-semibold">Medications:</span> <?php echo $health_data['medications']; ?></p>
                <p class="text-gray-700 text-sm"><span class="font-semibold">Family History:</span> <?php echo $health_data['family_history']; ?></p>
            </div>
        </div>
    </div>
    <!-- Chart -->
    <div class="bg-white rounded-lg shadow-md p-6 w-full sm:w-full lg:w-1/2 xl:w-1/2 mb-4 lg:ml-2 xl:ml-2">
        <canvas id="myChart"></canvas>
    </div>
</div>


<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Heart Rate', 'Blood Pressure', 'Glucose Levels'],
            datasets: [{
                label: 'Data',
                data: [<?php echo $health_data['heart_rate']; ?>, <?php echo $health_data['blood_pressure']; ?>, <?php echo $health_data['glucose_levels']; ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
  }
    });
</script>

</body>
</html>


