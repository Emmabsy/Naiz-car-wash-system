<?php
session_start();
include('includes/config.php');

if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('New password and confirm password do not match.');</script>";
    } else {
        // Check if the current password is correct for the logged-in user
        $email = $_SESSION['login'];
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $query = $dbh->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $current_password, PDO::PARAM_STR);
        $query->execute();
        $count = $query->rowCount();

        if ($count > 0) {
            // Update the password for the logged-in user
            $sql = "UPDATE users SET password = :new_password WHERE email = :email";
            $query = $dbh->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':new_password', $new_password, PDO::PARAM_STR);
            $query->execute();

            echo "<script>alert('Password changed successfully.');</script>";
        } else {
            // Invalid current password
            echo "<script>alert('Invalid current password.');</script>";
        }
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Change Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                    <h2 class="text-2xl mb-6 text-center text-red-600 font-bold">Change Password</h2>
                    <form method="post" class="mt-4">

                        <form method="post" class="space-y-3">
                            <div class="mb-4">
                                <label for="current_password" class="block text-gray-900">Current Password</label>
                                <input type="password" name="current_password" id="current_password" required class="w-full p-2 border border-gray-300 rounded">
                            </div>
                            <div class="mb-4">
                                <label for="new_password" class="block text-gray-900">New Password</label>
                                <input type="password" name="new_password" id="new_password" required class="w-full p-2 border border-gray-300 rounded">
                            </div>
                            <div class="mb-4">
                                <label for="confirm_password" class="block text-gray-900">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" required class="w-full p-2 mb-3 border border-gray-300 rounded">
                            </div>
                            <div>
                                <input type="submit" name="change_password" value="Change Password" class="w-full bg-green-900 text-white py-2 px-4 rounded hover:bg-green-600 cursor-pointer">
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>