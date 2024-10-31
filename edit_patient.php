<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "healthcare2";

$conn = new mysqli($servername, $username, $password, $database);

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("UPDATE patients SET sex=?, height=?, weight=?, blood_type=?, blood_pressure=?, heart_rate=?, glucose_levels=?, symptoms=?, diagnosis=?, prescription=?, medical_history=?, allergies=?, surgeries=?, medications=?, family_history=? WHERE user_id=?");
    $stmt->bind_param("sssssssssssssssi", $_POST['sex'], $_POST['height'], $_POST['weight'], $_POST['blood_type'], $_POST['blood_pressure'], $_POST['heart_rate'], $_POST['glucose_levels'], $_POST['symptoms'], $_POST['diagnosis'], $_POST['prescription'], $_POST['medical_history'], $_POST['allergies'], $_POST['surgeries'], $_POST['medications'], $_POST['family_history'], $user_id);
    $stmt->execute();
    $stmt->close();
    header("Location: account-details.php");
    exit();
}

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
    <title>Edit Patient Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100">
<?php include('header.php'); ?>

<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold mb-4">Edit Patient Information</h2>
    <form action="" method="POST" class="bg-white shadow-md rounded px-6 py-4 mb-4">
        <label class="block mb-2">
            Sex:
            <input type="text" name="sex" value="<?php echo $patient['sex']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Height:
            <input type="text" name="height" value="<?php echo $patient['height']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Weight:
            <input type="text" name="weight" value="<?php echo $patient['weight']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Blood Type:
            <input type="text" name="blood_type" value="<?php echo $patient['blood_type']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Blood Pressure:
            <input type="text" name="blood_pressure" value="<?php echo $patient['blood_pressure']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Heart Rate:
            <input type="text" name="heart_rate" value="<?php echo $patient['heart_rate']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Glucose Levels:
            <input type="text" name="glucose_levels" value="<?php echo $patient['glucose_levels']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Symptoms:
            <input type="text" name="symptoms" value="<?php echo $patient['symptoms']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Diagnosis:
            <input type="text" name="diagnosis" value="<?php echo $patient['diagnosis']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Prescription:
            <input type="text" name="prescription" value="<?php echo $patient['prescription']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Medical History:
            <input type="text" name="medical_history" value="<?php echo $patient['medical_history']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Allergies:
            <input type="text" name="allergies" value="<?php echo $patient['allergies']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Surgeries:
            <input type="text" name="surgeries" value="<?php echo $patient['surgeries']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Medications:
            <input type="text" name="medications" value="<?php echo $patient['medications']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <label class="block mb-2">
            Family History:
            <input type="text" name="family_history" value="<?php echo $patient['family_history']; ?>" class="form-input mt-1 block w-full" required>
        </label>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
    </form>
</div>

</body>
</html>
