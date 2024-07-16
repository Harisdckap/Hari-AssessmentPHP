<nav class="flex justify-center mt-4">
    <ul class="flex list-none">
        <?php
        // Admin Controller to fetch patients for page navigation
        require_once('../controllers/AdminController.php');
        $adminController = new AdminController();

        // Define number of patients per page
        $patients_per_page = 5;
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Fetch patients for the current page
        // $patients = $adminController->getPatientsByPage($current_page, $patients_per_page);
        $total_patients = $adminController->getTotalPatients();
        $total_pages = ceil($total_patients / $patients_per_page);

        // Previous Page navigation
        if ($current_page > 1) {
            echo '<li><a href="?page=' . ($current_page - 1) . '" class="px-3 py-2 mx-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md">Previous Page</a></li>';
        }

        // Page Number navigation loop
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo '<li><span class="px-3 py-2 mx-1 bg-blue-500 text-white rounded-md">' . $i . '</span></li>';
            } else {
                echo '<li><a href="?page=' . $i . '" class="px-3 py-2 mx-1 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md">' . $i . '</a></li>';
            }
        }

        // Next Page navigation
        if ($current_page < $total_pages) {
            echo '<li><a href="?page=' . ($current_page + 1) . '" class="px-3 py-2 mx-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md">Next Page</a></li>';
        }
        ?>
    </ul>
</nav>
