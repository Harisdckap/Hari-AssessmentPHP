<?php
session_start();

if (isset($_SESSION['message_type']) && $_SESSION['message_type'] === 'success' && isset($_SESSION['message'])) {
    echo '<div class="bg-green-500 text-white p-4 rounded-md text-center">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DV-Website</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="overflow-hidden">
    <!-- header Component -->
    <?php include '../layouts/header.php';?>
    
    <!-- main Component -->
    <?php include '../layouts/main.php';?>

    <!-- footer Component -->
    <?php include '../layouts/footer.php';?>
</body>
</html>
