<?php
session_start();
include('includes/config.php');

if (isset($_POST['alogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_login WHERE username = :username AND password = :password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result !== false) {
        $_SESSION['alogin'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
?>

<!-- Rest of your HTML code -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Naiz Car wash</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <!--navbar-->
    <nav class="fixed top-0 z-50 bg-green-900 w-full border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>
                    <a href="../index.php" class="nav-logo text-3xl font-bold">N-<span class="logo-color">aiz</span></a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">admin</span>
                                <img class="w-8 h-8 rounded-full" src="images/avatar.png" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">

                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                                </li>

                                <li>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

  
    <div class="flex items-center mt-20 pt-8 justify-center ">
        <div class="w-full max-w-lg bg-white rounded-lg p-8 bg-gray-200">
            <h2 class="text-2xl mb-6 text-center">Sign In</h2>
            <form method="post" class="space-y-4 ">
                <div>
                    <label for="username" class="text-sm mb-1 block text-gray-900">Username:</label>
                    <input type="text" name="username" id="username" class="w-full p-2 border border-gray-300 rounded" placeholder="" required="">
                </div>
                <div>
                    <label for="password" class="text-sm mb-1 block text-gray-900">Password:</label>
                    <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded" placeholder="" required="">
                </div>
                <div class="flex justify-center">
                    <input type="submit" class="py-2 px-10 bg-green-900 text-white rounded hover:bg-green-600 cursor-pointer" name="alogin" value="Sign In">
                </div>
            </form>
            <div class="mt-4 mb-4 text-center">
                <a href="../index.php" class="text-green-900 hover:text-green-600 font-bold">Home</a>
            </div>
        </div>
    </div>

</body>

</html>