
?>
<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
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
                <div class="px-4 py-8">
                    <ol class="breadcrumb flex items-center text-gray-500">
                        <li class="mr-2">
                            <a href="dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                        </li>
                        <li>
                            <i class="fas fa-angle-right text-gray-600 mx-1"></i>
                            <span class="text-gray-900 font-bold ">Complete Bookings</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">


                    <h2 class="mb-4 text-center text-3xl font-bold text-red-600">Naiz Car Wash System</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <a href="all-bookings.php" class="rounded-lg overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">Total Bookings</div>
                                    <div class="text-2xl font-bold text-red-600">
                                        <?php
                                        $sql = "SELECT id from tblcarwashbooking";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $cnt = $query->rowCount();
                                        echo htmlentities($cnt);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="new-booking.php" class="rounded-lg overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">New Bookings</div>
                                    <div class="text-2xl font-bold text-red-600">
                                        <?php
                                        $sql1 = "SELECT id from tblcarwashbooking where status='New'";
                                        $query1 = $dbh->prepare($sql1);
                                        $query1->execute();
                                        $newbookings = $query1->rowCount();
                                        echo htmlentities($newbookings);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="completed-booking.php" class="rounded-lg overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">Completed Bookings</div>
                                    <div class="text-2xl font-bold text-red-600">
                                        <?php
                                        $sql3 = "SELECT id from tblcarwashbooking where status='Completed'";
                                        $query3 = $dbh->prepare($sql3);
                                        $query3->execute();
                                        $completedbookings = $query3->rowCount();
                                        echo htmlentities($completedbookings);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- target="_blank" -->
                        <a href="manage-enquires.php" class="rounded-lg overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">Enquiries</div>
                                    <div class="text-2xl font-bold text-red-600">
                                        <?php
                                        $sql2 = "SELECT id from tblenquiry";
                                        $query2 = $dbh->prepare($sql2);
                                        $query2->execute();
                                        $cnt2 = $query2->rowCount();
                                        echo htmlentities($cnt2);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="managecar-washingpoints.php" class="rounded-lg overflow-hidden shadow-md bg-white hover:bg-gray-100">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <div class="text-lg font-bold">Washing Points</div>
                                    <div class="text-2xl font-bold text-red-600">
                                        <?php
                                        $sql5 = "SELECT id from tblwashingpoints";
                                        $query5 = $dbh->prepare($sql5);
                                        $query5->execute();
                                        $washingpoints = $query5->rowCount();
                                        echo htmlentities($washingpoints);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="flex">
                        <!-- Include sidebar -->
                        <?php include 'includes/sidebar.php'; ?>

                    </div>

                    <!-- Include footer -->
                    <?php include 'includes/footer.php'; ?>



    </body>

    </html>
<?php } ?>