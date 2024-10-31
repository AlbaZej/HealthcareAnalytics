<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
$user_logged_in = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
<header class="bg-blue-500 py-4">
    <nav class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="index.php" class="text-white text-xl font-bold">Healthcare.</a>
        <!-- Menu items -->
        <ul class="menu-items lg:flex justify-center flex-grow space-x-4 hidden">
            <li><a href="about-us.php" class="text-white">About Us</a></li>
            <li><a href="services.php" class="text-white">Our Services</a></li>
            <li><a href="contact-us.php" class="text-white">Contact Us</a></li>
        </ul>
        <!-- Account Menu (hidden by default on mobile) -->
        <div class="lg:flex-none hidden lg:block items-center space-x-4">
            <?php if ($user_logged_in) { ?>
                <div class="relative inline-block text-left">
                    <div>
                        <button type="button" class="text-white rounded-lg border border-white px-3 py-1 focus:outline-none" id="accountMenuButton">
                            Account
                        </button>
                    </div>
                    <div class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="accountMenuButton" tabindex="-1" id="accountMenu">
                        <a href="dashboard.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                        <a href="account-details.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Account Details</a>
                        <a href="logout.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Log Out</a>
                    </div>
                </div>
            <?php } else { ?>
                <a href="register.php" class="text-white rounded-lg border border-white px-3 py-1">Sign Up</a>
                <a href="login.php" class="text-white rounded-lg border border-white px-3 py-1">Login</a>
            <?php } ?>
        </div>
        <!-- Mobile menu toggle -->
        <button class="menu-toggle block lg:hidden text-white focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </nav>
    <!-- Mobile menu items (hidden by default on desktop) -->
    <div class="mobile-menu lg:hidden hidden bg-blue-500 text-white">
        <a href="about-us.php" class="block py-2 px-4">About Us</a>
        <a href="services.php" class="block py-2 px-4">Our Services</a>
        <a href="contact-us.php" class="block py-2 px-4">Contact Us</a>
        <!-- Account Menu (visible on mobile) -->
        <?php if ($user_logged_in) { ?>
            <div class="relative inline-block text-left">
                <div>
                    <button type="button" class="text-white rounded-lg border border-white px-3 py-1 focus:outline-none" id="mobileAccountMenuButton">
                        Account
                    </button>
                </div>
                <div class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="mobileAccountMenuButton" tabindex="-1" id="mobileAccountMenu">
                    <a href="dashboard.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                    <a href="account-details.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Account Details</a>
                    <a href="logout.php" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Log Out</a>
                </div>
            </div>
        <?php } else { ?>
            <a href="register.php" class="block py-2 px-4">Sign Up</a>
            <a href="login.php" class="block py-2 px-4">Login</a>
        <?php } ?>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.querySelector('.menu-toggle');
        const mobileMenu = document.querySelector('.mobile-menu');
        const accountMenuButton = document.getElementById('accountMenuButton');
        const accountMenu = document.getElementById('accountMenu');
        const mobileAccountMenuButton = document.getElementById('mobileAccountMenuButton');
        const mobileAccountMenu = document.getElementById('mobileAccountMenu');
        let hoverTimeout;

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Function to close account menu after a delay
        function closeAccountMenuDelayed() {
            hoverTimeout = setTimeout(() => {
                accountMenu.classList.add('hidden');
            }, 1000); // Adjust this delay as needed
        }

        // Function to clear the timeout
        function clearHoverTimeout() {
            clearTimeout(hoverTimeout);
        }

        // Event listener to close account menu after a delay
        accountMenuButton.addEventListener('mouseleave', closeAccountMenuDelayed);
        accountMenuButton.addEventListener('mouseenter', clearHoverTimeout);

        // Toggle account menu on desktop
        accountMenuButton.addEventListener('click', () => {
            accountMenu.classList.toggle('hidden');
        });

        // Toggle account menu on mobile
        mobileAccountMenuButton.addEventListener('click', () => {
            mobileAccountMenu.classList.toggle('hidden');
        });

        // Function to close mobile account menu after a delay
        function closeMobileAccountMenuDelayed() {
            hoverTimeout = setTimeout(() => {
                mobileAccountMenu.classList.add('hidden');
            }, 1000); // Adjust this delay as needed
        }

        // Function to clear the timeout for mobile account menu
        function clearMobileHoverTimeout() {
            clearTimeout(hoverTimeout);
        }

        // Event listener to close mobile account menu after a delay
        mobileAccountMenuButton.addEventListener('mouseleave', closeMobileAccountMenuDelayed);
        mobileAccountMenuButton.addEventListener('mouseenter', clearMobileHoverTimeout);
    });
</script>


</body>
</html>
