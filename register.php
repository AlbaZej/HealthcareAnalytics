<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "healthcare2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = [];
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    if (empty($name) || strlen($name) < 3 || strlen($name) > 50) {
        $errors['name'] = 'Name should be between 3 and 50 characters long';
    }


    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }

    if (empty($password) || strlen($password) < 8) {
        $errors['password'] = 'Password should be at least 8 characters long';
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users (name, birthdate, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $birthdate, $email, $hashed_password);

        if ($stmt->execute()) {
            $success_message = "You have successfully registered!";
     
        } else {
            $errors['database'] = 'Error occurred while registering. Please try again later.';
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <?php include('header.php'); ?>

    <div class="flex items-center justify-center min-h-screen bg-white py-3">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden">
            <h2 class="text-3xl font-semibold text-gray-800 text-center py-3 mb-6">Create your account</h2>
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
                    <label for="name" class="block text-sm font-semibold text-gray-600">Full Name</label>
                    <input type="text" id="name" name="name" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Full Name">
                </div>
                <div class="mb-3">
                    <label for="birthdate" class="block text-sm font-semibold text-gray-600">Date of Birth</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
                <div class="mb-3">
                    <label for="email" class="block text-sm font-semibold text-gray-600">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Email Address">
                </div>
                <div class="mb-3">
                    <label for="password" class="block text-sm font-semibold text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="block text-sm font-semibold text-gray-600">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Confirm Password">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Register</button>
            </form>
            <p class="mt-3 text-gray-600 text-sm text-center py-3">Already have an account? <a href="login.php" class="text-blue-500 font-semibold hover:text-blue-700">Log In</a></p>
        </div>
    </div>
</body>
</html>
