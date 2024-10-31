<div class="bg-blue-500 py-52">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-5xl text-white font-bold">Welcome to Healthcare Analytics Platform</h1>
        <div class="mt-6 py-2">
            <form action="search.php" method="GET" id="symptomSearchForm" class="rounded-full overflow-hidden bg-white flex items-center">
                <input type="text" id="symptomInput" name="q" placeholder="Search your symptoms here..." class="py-2 px-2 flex-1 focus:outline-none rounded-l-full">
                <button type="submit" class="bg-blue-900 text-white px-4 py-2 rounded-r-full hover:bg-blue-600 transition duration-300">Search</button>
            </form>
            <div id="searchResults" class="mt-4 text-left"></div>
        </div>
    </div>
</div>
