<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$database = "healthcare2";

$conn = new mysqli($servername, $username, $password, $database);
// Assuming $conn is your database connection
if (!isset($_SESSION['user_id'])) {
    // Handle the case when user is not logged in
    // Redirect them to the login page or display an error message
    // For example:
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE patients SET sex=?, height=?, weight=?, blood_type=?, blood_pressure=?, heart_rate=?, glucose_levels=?, symptoms=?, diagnosis=?, prescription=?, medical_history=?, allergies=?, surgeries=?, medications=?, family_history=? WHERE user_id=?");
    $stmt->bind_param("sssssssssssssssi", $_POST['sex'], $_POST['height'], $_POST['weight'], $_POST['blood_type'], $_POST['blood_pressure'], $_POST['heart_rate'], $_POST['glucose_levels'], $_POST['symptoms'], $_POST['diagnosis'], $_POST['prescription'], $_POST['medical_history'], $_POST['allergies'], $_POST['surgeries'], $_POST['medications'], $_POST['family_history'], $user_id);
    $stmt->execute();
    $stmt->close();
    // Redirect to the same page to refresh data after update
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$stmt = $conn->prepare("SELECT sex, height, weight, blood_type, blood_pressure, heart_rate, glucose_levels, symptoms, diagnosis, prescription, medical_history, allergies, surgeries, medications, family_history FROM patients WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();
$stmt->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100">
<?php include('header.php'); ?>

<div class="container mx-auto px-4 py-8 flex justify-center">
    <div class="flex">
        <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-md mx-4">
            <div class="bg-blue-500 px-4 py-6">
                <h3 class="text-lg font-semibold text-white">User Information</h3>
            </div>
            <div class="p-6">
                <p class="text-gray-700"><strong>Name:</strong> <?php echo $user['name']; ?></p>
                <p class="text-gray-700"><strong>Email:</strong> <?php echo $user['email']; ?></p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-md mx-4">
            <div class="bg-blue-500 px-4 py-6">
                <h3 class="text-lg font-semibold text-white">Patient Information</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-700"><strong>Sex:</strong> <?php echo $patient['sex']; ?></p>
                        <p class="text-gray-700"><strong>Height:</strong> <?php echo $patient['height']; ?></p>
                        <p class="text-gray-700"><strong>Weight:</strong> <?php echo $patient['weight']; ?></p>
                        <p class="text-gray-700"><strong>Blood Type:</strong> <?php echo $patient['blood_type']; ?></p>
                        <p class="text-gray-700"><strong>Blood Pressure:</strong> <?php echo $patient['blood_pressure']; ?></p>
                        <p class="text-gray-700"><strong>Heart Rate:</strong> <?php echo $patient['heart_rate']; ?></p>
                        <p class="text-gray-700"><strong>Glucose Levels:</strong> <?php echo $patient['glucose_levels']; ?></p>
                    </div>
                    <div>
                        <p class="text-gray-700"><strong>Symptoms:</strong> <?php echo $patient['symptoms']; ?></p>
                        <p class="text-gray-700"><strong>Diagnosis:</strong> <?php echo $patient['diagnosis']; ?></p>
                        <p class="text-gray-700"><strong>Prescription:</strong> <?php echo $patient['prescription']; ?></p>
                        <p class="text-gray-700"><strong>Medical History:</strong> <?php echo $patient['medical_history']; ?></p>
                        <p class="text-gray-700"><strong>Allergies:</strong> <?php echo $patient['allergies']; ?></p>
                        <p class="text-gray-700"><strong>Surgeries:</strong> <?php echo $patient['surgeries']; ?></p>
                        <p class="text-gray-700"><strong>Medications:</strong> <?php echo $patient['medications']; ?></p>
                        <p class="text-gray-700"><strong>Family History:</strong> <?php echo $patient['family_history']; ?></p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <a href="edit_patient.php" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>


