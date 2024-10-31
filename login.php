<?php
session_start();

ob_start();
include('header.php');
$header_content = ob_get_clean();

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
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    if (empty($email) || empty($password)) {
        $errors[] = "Email and password are required";
    } else {
        $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header("Location: dashboard.php");
                exit();
            } else {
                $errors[] = "Invalid email or password";
            }
        } else {
            $errors[] = "Invalid email or password";
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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <?= $header_content ?>

    <div class="flex items-center justify-center min-h-screen bg-white">
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden">
            <h2 class="text-3xl font-semibold text-gray-800 text-center py-3 mb-6">Login</h2>
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
                    <label for="email" class="block text-sm font-semibold text-gray-600">Email Address</label>
                    <input type="email" id="email" name="email" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Email Address">
                </div>
                <div class="mb-3">
                    <label for="password" class="block text-sm font-semibold text-gray-600">Password</label>
                    <input type="password" id="password" name="password" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Password">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">Login</button>
            </form>
            <p class="mt-3 text-gray-600 text-sm text-center py-3">Don't have an account? <a href="register.php" class="text-blue-500 font-semibold hover:text-blue-700">Sign Up</a></p>
        </div>
    </div>
</body>
</html>
