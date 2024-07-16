<?php
include '../views/errors/error_log.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
         <button class="bg-blue-300 rounded p-2"><a href="../adminviews/index.php">back</a></button>

        <h1 class="text-2xl font-bold mb-4">List of Patients</h1>

        <!-- Search Form -->
        <form action="#" method="GET" class="mb-4">
            <input type="text" name="search" placeholder="Search by name or reason" class="border rounded py-2 px-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Search</button>
        </form>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-700">
                <tr>
                    <th class="py-2 px-4">ID</th>
                    <th class="py-2 px-4">Name</th>
                    <th class="py-2 px-4">Reason</th>
                    <th class="py-2 px-4">Appointment Time</th>
                    <th class="py-2 px-4">Address</th>
                    <th class="py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                //  search patient information logic

                require("../database/database.php");

                try {
                    $conn = new DatabaseConnection();
                    $sql = $conn->getConnection();
                    
                    // Search functionality
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    if ($search) {
                        $sqlquery = $sql->prepare("SELECT * FROM patients WHERE name LIKE :search OR reason LIKE :search");
                        $sqlquery->execute(['search' => '%' . $search . '%']);
                    } else {
                        $sqlquery = $sql->prepare("SELECT * FROM patients");
                        $sqlquery->execute();
                    }
                    // fetching all patient details in object
                    $patients = $sqlquery->fetchAll(PDO::FETCH_OBJ);

                    // checking the condition is true
                    if ($patients) {
                        // Display each patient's details
                        foreach ($patients as $patient):
                ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4"><?php echo htmlspecialchars($patient->id); ?></td>
                        <td class="py-3 px-4"><?php echo htmlspecialchars($patient->name); ?></td>
                        <td class="py-3 px-4"><?php echo htmlspecialchars($patient->reason); ?></td>
                        <td class="py-3 px-4"><?php echo htmlspecialchars($patient->appointment_time); ?></td>
                        <td class="py-3 px-4"><?php echo htmlspecialchars($patient->address); ?></td>
                        <td class="py-3 px-4">

                            <!-- Check if patient is confirmed is true-->
                            <?php if ($patient->confirmed): ?>
                                <span class="bg-gray-500 text-white py-2 px-4 rounded-md">Confirmed</span>
                            <?php else: ?>

                                <!-- Add confirmation button -->
                                <form action="confirm_patient.php" method="POST" class="inline">
                                    <input type="hidden" name="patient_id" value="<?php echo htmlspecialchars($patient->id); ?>">
                                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md">Confirm</button>
                                </form>
                            <?php endif; ?>

                            <!-- Add call button -->
                            <form action="delete_patient.php" method="POST" class="inline">
                                <input type="hidden" name="patient_id" value="<?php echo htmlspecialchars($patient->id);?>">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php
                        endforeach;
                    } else {
                        // display no results or founded
                        echo '<tr><td colspan="6" class="py-3 px-4 text-center">No patients found</td></tr>';
                    }
                } catch (PDOException $e) {
                    echo '<tr><td colspan="6" class="py-3 px-4 text-center text-red-500">Error: ' . $e->getMessage() . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
        <!-- Include page navigation -->
        <?php include("../adminviews/pageNavigation.php") ?>
    </div>
</body>
</html>
