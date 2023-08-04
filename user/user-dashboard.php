?>
<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz Dashboard| Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <!-- Include CSS files -->

        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Add Font Awesome CDN link here -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">
    </head>

    <body>
        <!-- Include header -->
        <?php include 'includes/header.php'; ?>
        <div class="flex">
            <!-- Sidebar -->
            <div class="w-1/5 bg-gray-200">
                <?php include('includes/sidebar.php'); ?>
            </div>

            <div class="w-4/5 bg-white py-4 px-5">
                <div class="bg-gray-100 py-4 mb-4">

                </div>
                <!-- Breadcrumb -->

                <div class="overflow-x-auto">


                    <h2 class="mb-4 text-center text-3xl font-bold text-red-600">Naiz Car Wash System</h2>


                    <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Total Bookings Card -->
                        <a href="mybookings.php" class="rounded-lg bg-green-200 overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">Total Bookings</div>
                                    <div class="text-2xl font-bold text-red-600">
                                        <?php
                                        $userId = $_SESSION['id'];
                                        $sql = "SELECT id from tblcarwashbooking WHERE id = :userId";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':userId', $userId, PDO::PARAM_STR);
                                        $query->execute();
                                        $cnt = $query->rowCount();
                                        echo htmlentities($cnt);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- Total Enquiries Card -->
                        <a href="m-enquiries.php" class="rounded-lg  bg-blue-200 overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">Total Enquiries</div>
                                    <div class="text-2xl font-bold text-blue-600">
                                        <?php
                                        $userId = $_SESSION['id'];
                                        $sql = "SELECT id from tblenquiry WHERE userId = :userId";
                                        $query = $dbh->prepare($sql);
                                        $query->bindParam(':userId', $userId, PDO::PARAM_STR);
                                        $query->execute();
                                        $cnt = $query->rowCount();
                                        echo htmlentities($cnt);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- User Profile Card -->
                        <a href="change-pass.php" class="rounded-lg bg-yellow-200 overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">User Profile</div>
                                    <div class="text-2xl font-bold text-green-600">
                                        <?php echo $_SESSION['login']; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


    </body>

    </html>
<?php } ?>