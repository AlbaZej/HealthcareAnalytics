<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card {
            width: calc(33.33% - 1rem); 
            min-width: 220px; 
            margin: 0.5rem; 
        }

        .card img {
            width: 150px;
            max-width: 300px;
            height: 150px;
            border-radius: 50%;
            display: block;
            margin: 0 auto;
        }

        .card-content {
            text-align: center;
        }
    </style>
</head>
<body class="bg-white">
    <?php include 'header.php'; ?>
<div class="container mx-auto mt-8 px-4">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-4xl font-bold text-blue-500 mb-8">About Us</h1>
        <div class="mb-8 flex flex-wrap items-center">
            <div class="w-1/2 md:w-1/3">
                <img src="assets\img\team.jpg" alt="Mission Image" class="w-full md:w-auto rounded-lg shadow-lg mb-6 md:mb-0">
            </div>
            <div class="w-full md:w-2/3 md:pl-6">
                <h2 class="text-2xl font-semibold text-blue-400 mb-4">Our Mission</h2>
                <p class="text-gray-500 text-sm">Our mission is to provide affordable and accessible healthcare solutions to underserved communities worldwide. Through innovation and collaboration, we aim to improve the quality of life for millions of people by delivering comprehensive healthcare services and products.</p>
            </div>
        </div>
        <div class="mb-8 flex flex-wrap items-center">
            <div class="w-full md:w-2/3 md:pr-6">
                <h2 class="text-2xl font-semibold text-blue-400 mb-4">Our Vision</h2>
                <p class="text-gray-500 text-sm">Our vision is to create a world where everyone has equal access to healthcare resources and opportunities, regardless of their background or socioeconomic status. We envision a future where preventable diseases are eradicated, health disparities are minimized, and every individual can lead a healthy and fulfilling life.</p>
            </div>
            <div class="w-1/2 md:w-1/3">
                <img src="assets\img\team1.jpeg" alt="Vision Image" class="w-full md:w-auto rounded-lg shadow-lg mb-6 md:mb-0">
            </div>
        </div>

                <h2 class="text-2xl font-semibold text-blue-400 mb-4">Our Team</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-12">
                    <div class="card bg-white rounded-lg p-6 shadow-lg">
                        <img src="assets\img\jane.jpg" alt="Image 1">
                        <div class="card-content">
                            <h3 class="text-xl font-semibold text-gray-500 mb-2">Albana Zejnullahi</h3>
                            <p class="text-blue-500">Co-founder & CEO</p>
                        </div>
                    </div>
                    <div class="card bg-white rounded-lg p-6 shadow-lg">
                        <img src="assets\img\alex.jpg" alt="Image 2">
                        <div class="card-content">
                            <h3 class="text-xl font-semibold text-gray-500 mb-2">Jane Smith</h3>
                            <p class="text-blue-500">Co-founder & CTO</p>
                        </div>
                    </div>
                    <div class="card bg-white rounded-lg p-6 shadow-lg">
                        <img src="assets\img\bob.jpg" alt="Image 3">
                        <div class="card-content">
                            <h3 class="text-xl font-semibold text-gray-500 mb-2">Alex Johnson</h3>
                            <p class="text-blue-500">Lead Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
