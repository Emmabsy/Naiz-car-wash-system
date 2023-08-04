<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $wpname = $_POST['washingpointname'];
        $wpaddress = $_POST['address'];
        $wpcnumber = $_POST['contactno'];

        $sql = "INSERT INTO tblwashingpoints(washingPointName,washingPointAddress,contactNumber) VALUES(:wpname,:wpaddress,:wpcnumber)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':wpname', $wpname, PDO::PARAM_STR);
        $query->bindParam(':wpaddress', $wpaddress, PDO::PARAM_STR);
        $query->bindParam(':wpcnumber', $wpcnumber, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>alert('Car wash point added successfully');</script>";
            echo "<script>window.location.href ='addcar-washpoint.php'</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again.');</script>";
        }
    }

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz admin| New Wash Center</title>
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
            <div class="w-1/5 bg-gray-100">
                <?php include('includes/sidebar.php'); ?>
            </div>

            <div class="w-4/5 bg-white py-4 px-5">
                <div class="bg-gray-100 py-4 mb-5">
                </div>
                <!-- Breadcrumb -->
                <div class="px-4 py-8">
                    <ol class="breadcrumb flex items-center text-gray-500">
                        <li class="mr-2">
                            <a href="dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                        </li>
                        <li>
                            <i class="fas fa-angle-right text-gray-600 mx-1"></i>
                            <span class="text-gray-900 font-bold ">Add Center</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">
                    <!--Test -->
                    <!-- Modal -->
                    <div class="mb-9">
                        <h2 class="text-3xl text-center font-bold text-green-600">Car Wash Center</h2>
                        <div class="mt-5 flex items-center justify-between">
                            <!-- <h2 class="text-3xl text-center font-bold text-red-600">Car Wash Booking</h2>
        -->
                        </div>
                        <div class="mt-6">
                            <form method="post" class="space-y-6">

                                <div class="flex items-center">
                                    <label for="carwashpount" class="block text-sm font-medium text-gray-900 w-40">Car Wash Point Name</label>
                                    <input type="text" name="washingpointname" id="washingpointname" class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" required placeholder="Washing Point Name">
                                </div>
                                <div class="flex items-center">
                                    <label for="address" class="block text-sm font-medium text-gray-900 w-40">Address</label>
                                    <textarea name="address" id="address" class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" placeholder="Message if any"></textarea>
                                </div>
                                <div class="flex items-center">
                                    <label for="contactno" class="block text-sm font-medium text-gray-900 w-40">Contact Number</label>
                                    <input type="text" name="contactno" id="contactno" class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Contact Number">
                                </div>

                                <div class="row flex justify-center">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="submit" class="py-1 px-8 bg-green-900 text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600">Add</button>

                                        <button type="reset" class="py-1 px-8 bg-gray-500 text-white rounded-lg hover:bg-gray-200 focus:outline-none focus:bg-gray-600"">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!--Test -->

                </div>
            </div>
        </div>


    </body>

    </html>
<?php } ?>