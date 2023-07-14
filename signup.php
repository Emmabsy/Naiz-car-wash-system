<?php
session_start();
include('includes/config.php');

if (isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email is already registered
    $sql = "SELECT * FROM users WHERE email = :email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $count = $query->rowCount();

    if ($count > 0) {
        // Email already exists
        echo "<script>alert('Email already registered. Please login.');</script>";
    } else {
        // Create a new user
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();

        // After successful signup, redirect to login page
        header("Location: login.php");
        exit;
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Sign Up</title>
    <!-- Include Tailwind CSS CDN link here -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="flex items-center mt-2 justify-center ">
        <div class="w-full max-w-lg  rounded-lg p-4 bg-gray-200">
            <h2 class="text-2xl mb-6 text-center">Sign Up</h2>
            <form method="post" class=" space-y-3 ">
                <div>
                    <label for="firstname" class="block text-gray-900">First Name</label>
                    <input type="text" name="firstname" id="first_name" required class="w-full p-1 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="lastname" class="block text-gray-900 ">Last Name</label>
                    <input type="text" name="lastname" id="last_name" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="email" class="block text-gray-900">Email</label>
                    <input type="email" name="email" id="email" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="password" class="block text-gray-900">Password</label>
                    <input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded">
                </div>

                <div>
                    <input type="submit" name="signup" value="Sign Up" class="w-full bg-green-900 text-white py-2 px-4 rounded hover:bg-green-600 cursor-pointer">
                </div>
            </form>
            <div class="mt-4 text-center">
                <p class="text-gray-900">Already have an account?</p>
                <a href="login.php" class="text-blue-500">Sign In</a>
            </div>
        </div>
    </div>
</body>

</html>