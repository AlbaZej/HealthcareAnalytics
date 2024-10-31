<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <!-- Navigation -->
    <?php include 'header.php'; ?>

    <!-- Main content -->
    <div class="container mx-auto mt-8 flex flex-col md:flex-row items-center justify-center">
        <!-- Form -->
        <div class="md:w-1/2 p-6">
            <div class="bg-white rounded-lg shadow-xl p-6">
                <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Contact Us</h2>
                <p class="text-gray-600">Have questions or concerns? Feel free to reach out to us using the form below:</p>
                
                <!-- Contact form -->
                <form action="process_contact.php" method="post" class="mt-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-semibold text-gray-600">Name</label>
                        <input type="text" id="name" name="name" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder=" Your name" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold text-gray-600">Email</label>
                        <input type="email" id="email" name="email" class="form-input mt-1 block w-full h-10 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder=" Your email" required>
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-semibold text-gray-600">Message</label>
                        <textarea id="message" name="message" rows="4" class="form-textarea mt-1 block w-full border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder=" Your message" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300"> Send Message</button>
                </form>
            </div>
        </div>
        <!-- Image -->
        <div class="md:w-1/2 p-6">
            <img src="assets/img/docs.png" alt="Contact Image" class="w-full h-auto rounded-lg">
        </div>
    </div>

    <!-- Footer -->
    <?php include 'footer.php'; ?>
</body>
</html>
