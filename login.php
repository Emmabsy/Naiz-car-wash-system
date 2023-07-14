<?php
session_start();
include('includes/config.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email and password match a user in the database
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $count = $query->rowCount();

    if ($count > 0) {
        // User exists, redirect to the desired page
        $_SESSION['login'] = $_POST['email'];
        header("Location: washing-plans.php");
        exit;
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Login</title>
    <!-- Include Tailwind CSS CDN link here -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<?php include('includes/header.php'); ?>

<body class="bg-gray-100">
    <div class="flex items-center mt-8 pt-5 justify-center ">
        <div class="w-full max-w-lg bg-white rounded-lg p-8 bg-gray-200">
            <h2 class="text-2xl mb-6 text-center">Sign In</h2>
            <form method="post" class="space-y-4">
                <div>
                    <label for="email" class="block text-black">Email</label>
                    <input type="email" name="email" id="email" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div>
                    <label for="password" class="block text-black">Password</label>
                    <input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div>
                    <input type="submit" name="login" value="Sign In" class="w-full bg-green-900 text-white py-2 px-4 rounded hover:bg-green-600 cursor-pointer">
                </div>
            </form>
            <div class="mt-4 text-center">
                <p class="text-black">Don't have an account?</p>
                <a href="signup.php" class="text-blue-500">Sign Up</a>
            </div>
        </div>
    </div>
</body>

</html>