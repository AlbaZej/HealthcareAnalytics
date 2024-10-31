<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "healthcare2";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$errors = [];
$success_message = '';

// Process form submission here
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sex = isset($_POST['sex']) ? trim($_POST['sex']) : '';
    $health_info = isset($_POST['health_info']) ? trim($_POST['health_info']) : '';
    $sickness = isset($_POST['sickness']) ? trim($_POST['sickness']) : '';
    $symptoms = isset($_POST['symptoms']) ? trim($_POST['symptoms']) : '';

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO additional_info (user_id, sex, health_info, sickness, symptoms) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $_SESSION['id'], $sex, $health_info, $sickness, $symptoms);

    if ($stmt->execute()) {
        $success_message = "Additional information saved successfully!";
        // Redirect to dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        $errors['database'] = 'Error occurred while saving information. Please try again later.';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <!-- Header or any other content -->
    
    <div class="flex items-center justify-center min-h-screen bg-white py-3">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden">
            <h2 class="text-3xl font-semibold text-gray-800 text-center py-3 mb-6">Additional Information</h2>
            <?php if (!empty($success_message)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded-md mb-4">
                    <?= $success_message ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($errors)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-md mb-4">
                    <?php foreach ($errors as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form method="post" class="px-6">
                <div class="mb-3">
                    <label for="sex" class="block text-sm font-semibold text-gray-600">Sex</label>
                    <select id="sex" name="sex" class="form-select mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="health_info" class="block text-sm font-semibold text-gray-600">Health Information</label>
                    <textarea id="health_info" name="health_info" rows="4" class="form-textarea mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter your health information"></textarea>
                </div>
                <div class="mb-3">
                    <label for="sickness" class="block text-sm font-semibold text-gray-600">Sickness</label>
                    <input type="text" id="sickness" name="sickness" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter your sickness">
                </div>
                <div class="mb-3">
                    <label for="symptoms" class="block text-sm font-semibold text-gray-600">Symptoms</label>
                    <textarea id="symptoms" name="symptoms" rows="4" class="form-textarea mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Enter your symptoms"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
