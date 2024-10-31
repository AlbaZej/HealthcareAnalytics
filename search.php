<?php
include 'header.php';

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "healthcare2";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination variables
$resultsPerPage = 4;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $resultsPerPage;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["q"])) {
    $symptoms = explode(",", $_GET["q"]); // Split the input into an array of symptoms
    $placeholders = implode(",", array_fill(0, count($symptoms), "?")); // Generate placeholders for each symptom

    // Query the database to get total number of results
    $totalResultsQuery = "SELECT COUNT(*) AS total FROM symptoms_sicknesses WHERE symptom IN ($placeholders)";
    $stmt = $conn->prepare($totalResultsQuery);
    $types = str_repeat("s", count($symptoms));
    $stmt->bind_param($types, ...$symptoms);
    $stmt->execute();
    $totalResults = $stmt->get_result()->fetch_assoc()['total'];

    // Query the database with pagination
    $sql = "SELECT * FROM symptoms_sicknesses WHERE symptom IN ($placeholders) LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types . 'ii', ...array_merge($symptoms, [$offset, $resultsPerPage]));
    $stmt->execute();
    $result = $stmt->get_result();

    // Display search results
    if ($result->num_rows > 0) {
        ?>
        <div class="container mx-auto py-8">
            <form action="search.php" method="GET" class="rounded-full overflow-hidden bg-blue-300 flex items-center">
                <input type="text" name="q" placeholder="Search symptoms here..." class="py-2 px-2 flex-1 focus:outline-none rounded-l-full border border-blue-500">
                <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded-r-full hover:bg-blue-600 transition duration-300">Search</button>
            </form>
        </div>

        <div class="container mx-auto py-8">
            <h2 class="text-xl font-semibold mb-4 text-blue-500">Search Results</h2>
            <div class="grid grid-cols-1 gap-4">
                <?php
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="bg-white shadow rounded-lg p-4">
                        <h3 class="text-xl font-semibold mb-2 text-blue-500"><?php echo $row["sickness"]; ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo $row["description"]; ?></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php
        // Pagination controls
        $totalPages = ceil($totalResults / $resultsPerPage);
        if ($totalPages > 1) {
            ?>
            <div class="container mx-auto py-4">
                <div class="flex justify-center space-x-4">
                    <?php if ($page > 1): ?>
                        <a href="search.php?q=<?php echo urlencode(implode(",", $symptoms)); ?>&page=<?php echo $page - 1; ?>" class="px-4 py-2 bg-gray-400 text-white rounded-full hover:bg-blue-600">Previous</a>
                    <?php endif; ?>

                    <?php
                    $numLinks = 3; // Number of page links to display before and after current page
                    $start = max(1, $page - $numLinks);
                    $end = min($totalPages, $page + $numLinks);

                    if ($start > 1) {
                        echo '<span class="px-4 py-2 bg-gray-400 text-white rounded-full">...</span>';
                    }

                    for ($i = $start; $i <= $end; $i++) {
                        ?>
                        <a href="search.php?q=<?php echo urlencode(implode(",", $symptoms)); ?>&page=<?php echo $i; ?>" class="px-4 py-2 bg-gray-400 text-white rounded-full <?php echo ($i === $page) ? 'bg-blue-900' : 'hover:bg-blue-600'; ?>"><?php echo $i; ?></a>
                        <?php
                    }

                    if ($end < $totalPages) {
                        echo '<span class="px-4 py-2 bg-gray-400 text-white rounded-full">...</span>';
                    }
                    ?>

                    <?php if ($page < $totalPages): ?>
                        <a href="search.php?q=<?php echo urlencode(implode(",", $symptoms)); ?>&page=<?php echo $page + 1; ?>" class="px-4 py-2 bg-gray-400 text-white rounded-full hover:bg-blue-600">Next</a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        }
    } else {
        echo "No results found.";
    }
}
?>

<?php include 'footer.php'; ?>
