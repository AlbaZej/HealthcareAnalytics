<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        .service-card {
            transition: transform 0.3s ease-in-out;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <?php include 'header.php'; ?>

    <!-- Main content -->
    <div class="container mx-auto mt-8 px-4 py-6">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-4xl font-bold text-blue-600 mb-8">Our Services</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Check Symptoms -->
                <div class="bg-white rounded-lg shadow-lg p-6 service-card animate__animated animate__fadeIn">
                    <h2 class="text-xl font-semibold text-blue-600 mb-4">Check Symptoms</h2>
                    <p class="text-gray-500 text-sm">Our "Check Symptoms" service allows users to input their symptoms and receive preliminary information about potential health conditions or concerns. It provides a convenient way for individuals to assess their health status and seek appropriate medical attention if necessary.</p>
                </div>
                <!-- Medical History -->
                <div class="bg-white rounded-lg shadow-lg p-6 service-card animate__animated animate__fadeIn">
                    <h2 class="text-xl font-semibold text-blue-600 mb-4">Medical History</h2>
                    <p class="text-gray-500 text-sm">The "Medical History" service enables users to maintain a comprehensive record of their past medical events, including illnesses, surgeries, medications, and allergies. It helps healthcare providers make informed decisions and provide personalized care based on the patient's medical background.</p>
                </div>
                <!-- Prescriptions -->
                <div class="bg-white rounded-lg shadow-lg p-6 service-card animate__animated animate__fadeIn">
                    <h2 class="text-xl font-semibold text-blue-600 mb-4">Prescriptions</h2>
                    <p class="text-gray-500 text-sm">Our "Prescriptions" service allows users to request and manage their medication prescriptions online. It streamlines the prescription process, making it easier for patients to communicate with healthcare providers, refill medications, and stay on track with their treatment plans.</p>
                </div>
                <!-- Service 4 -->
              <!-- Health Education -->
<div class="bg-white rounded-lg shadow-lg p-6 service-card animate__animated animate__fadeIn">
    <h2 class="text-xl font-semibold text-blue-600 mb-4">Health Education</h2>
    <p class="text-gray-500 text-sm">Our "Health Education" service provides valuable resources and information to empower individuals to make informed decisions about their health.</p>
</div>

                <!-- Add more services as needed -->
            </div>
        </div>
    </div>

    <!-- Additional Service -->
<div class="flex items-center justify-between bg-white rounded-lg shadow-lg p-6 ">
    <!-- Text Content -->
    <div class="w-1/2">
        <h2 class="text-5xl font-semibold text-blue-600 mb-4">Exclusive Membership</h2>
        <p class="text-gray-500 text-sm">Unlock premium benefits and personalized healthcare solutions with our Exclusive Membership. Gain access to priority appointments, exclusive discounts on consultations and medications, and tailored health plans designed to meet your unique needs. Join today and elevate your healthcare experience to the next level.</p>
    </div>
    <!-- Image -->
    <div class="w-1/2">
        <img src="assets\img\medical.jpg" alt="Exclusive Membership" class="h-auto w-full rounded-lg shadow-lg">
    </div>
</div>


    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
