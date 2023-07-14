<?php
session_start();
include('includes/config.php');

if (!isset($_SESSION['alogin'])) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Retrieve the current password from the database
    $username = $_SESSION['alogin'];
    $sql = "SELECT password FROM admin_login WHERE username = :username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result !== false) {
        $stored_password = $result['password'];

        // Verify if the current password matches the stored password
        if ($current_password === $stored_password) {
            // Verify if the new password and confirm password match
            if ($new_password === $confirm_password) {
                // Update the password in the database
                $update_sql = "UPDATE admin_login SET password = :new_password WHERE username = :username";
                $update_query = $dbh->prepare($update_sql);
                $update_query->bindParam(':new_password', $new_password, PDO::PARAM_STR);
                $update_query->bindParam(':username', $username, PDO::PARAM_STR);
                $update_query->execute();

                echo "<script>alert('Password changed successfully');</script>";
            } else {
                echo "<script>alert('New password and confirm password do not match');</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Change Password</title>
    <!-- Include Tailwind CSS CDN link here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <
    <script src="js/jquery-2.1.4.min.js"></script>

    <link href="css/font-awesome.css" rel="stylesheet">
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-1/5 bg-gray-200">
            <?php include('includes/sidebar.php'); ?>
        </div>

        <div class="w-4/5 bg-white py-4 px-5">
            <div class="bg-gray-100 py-4 mb-4">

            </div>

            <!-- Breadcrumb -->
            <div class="px-4 py-8">
                <ol class="breadcrumb flex items-center text-gray-500">
                    <li class="mr-2">
                        <a href="dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                    </li>
                    <li>
                        <i class="fas fa-angle-right text-gray-600 mx-1"></i>
                        <span class="text-gray-900 font-bold ">Change Password</span>
                    </li>
                </ol>
            </div>

            <div class="overflow-x-auto">

              
                <!--<div class="lg:w-full max-w-md mx-auto"> -->
                <div class="container mx-auto px-2 py-8">
                    <h2 class="text-2xl mb-6 text-center font-bold text-red-600">Change Password</h2>
                    <form method="post">
                        <div class="mb-4">
                            <label for="current_password" class="block mb-1">Current Password:</label>
                            <input type="password" name="current_password" id="current_password" required class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="new_password" class="block mb-1">New Password:</label>
                            <input type="password" name="new_password" id="new_password" required class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div class="mb-4">
                            <label for="confirm_password" class="block mb-1">Confirm Password:</label>
                            <input type="password" name="confirm_password" id="confirm_password" required class="w-full p-2 border border-gray-300 rounded">
                        </div>
                        <div>
                            <input type="submit" name="change_password" value="Change Password" class="w-full bg-green-900 text-white py-2 px-4 rounded hover:bg-green-600 cursor-pointer">
                        </div>
                    </form>
                </div>
            </div>
</body>

</html>