<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['bookingId'])) {
        $bookingId = $_GET['bookingId'];

        // Fetch the booking details based on the bookingId
        $sql = "SELECT * FROM tblcarwashbooking WHERE bookingId = :bookingId";
        $query = $dbh->prepare($sql);
        $query->bindParam(':bookingId', $bookingId, PDO::PARAM_INT);
        $query->execute();
        $booking = $query->fetch(PDO::FETCH_ASSOC);

        // Update the booking in the database when the form is submitted
        if (isset($_POST['update'])) {
            $ptype = $_POST['packagetype'];
            $wpoint = $_POST['washingpoint'];
            $fname = $_POST['fname'];
            $mobile = $_POST['contactno'];
            $date = $_POST['washdate'];
            $time = $_POST['washtime'];
            $message = $_POST['message'];

            // Perform the update
            $sql = "UPDATE tblcarwashbooking SET packageType = :ptype, carWashPoint = :wpoint, fullName = :fname, 
                    mobileNumber = :mobile, washDate = :date, washTime = :time, message = :message 
                    WHERE bookingId = :bookingId";
            $query = $dbh->prepare($sql);
            $query->bindParam(':ptype', $ptype, PDO::PARAM_STR);
            $query->bindParam(':wpoint', $wpoint, PDO::PARAM_STR);
            $query->bindParam(':fname', $fname, PDO::PARAM_STR);
            $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
            $query->bindParam(':date', $date, PDO::PARAM_STR);
            $query->bindParam(':time', $time, PDO::PARAM_STR);
            $query->bindParam(':message', $message, PDO::PARAM_STR);
            $query->bindParam(':bookingId', $bookingId, PDO::PARAM_INT);
            $query->execute();

            // Redirect to the view bookings page after update
            echo "<script>alert('Booking updated successfully.');</script>";
            echo "<script>window.location.href ='mybookings.php'</script>";
        }
    } else {
        header('location:mybookings.php');
    }
?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz | Edit Booking</title>
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
                <div class="bg-gray-100 py-4 mb-4"></div>
                <!-- Breadcrumb -->
                <div class="px-4 py-8">
                    <ol class="breadcrumb flex items-center text-gray-500">
                        <li class="mr-2">
                            <a href="dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                        </li>
                        <li>
                            <i class="fas fa-angle-right text-gray-600 mx-1"></i>
                            <span class="text-gray-900 font-bold ">Edit Booking</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">
                    <!--Test -->
                    <!-- Modal -->
                    <div class="mb-2">
                        <h2 class="text-3xl text-center font-bold text-green-600">Edit Car Wash Booking</h2>
                        <div class="mt-5 flex items-center justify-between">
                            <!-- <h2 class="text-3xl text-center font-bold text-red-600">Car Wash Booking</h2> -->
                        </div>
                        <div class="">
                            <form method="post" class="space-y-6">
                                <div class="flex items-center">
                                    <label for="packagetype" class="block text-sm font-medium text-gray-900 w-40">Package Type</label>
                                    <select name="packagetype" required class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full">
                                        <option value="">Package Type</option>
                                        <option value="1" <?php if ($booking['packageType'] == '1') echo 'selected'; ?>>BASIC CLEANING (KES 700)</option>
                                        <option value="2" <?php if ($booking['packageType'] == '2') echo 'selected'; ?>>PREMIUM CLEANING (KES 1500)</option>
                                        <option value="3" <?php if ($booking['packageType'] == '3') echo 'selected'; ?>>EXECUTIVE CLEANING (KES 2000)</option>
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <label for="washingpoint" class="block text-sm font-medium text-gray-900 w-40">Select Washing Point</label>
                                    <select name="washingpoint" required class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full">
                                        <option value="">Select Washing Point</option>
                                        <?php
                                        $sql = "SELECT * from tblwashingpoints";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($results as $result) :
                                            $selected = ($booking['carWashPoint'] == $result['id']) ? 'selected' : '';
                                        ?>
                                            <option value="<?php echo htmlentities($result['id']); ?>" <?php echo $selected; ?>><?php echo htmlentities($result['washingPointName']); ?> (<?php echo htmlentities($result['washingPointAddress']); ?>)</option>
                                        <?php endforeach; ?>
                                        <!-- Add your washing points dynamically here -->
                                    </select>
                                </div>
                                <div class="flex items-center">
                                    <label for="fname" class="block text-sm font-medium text-gray-900 w-40">Full Name</label>
                                    <input type="text" name="fname" value="<?php echo htmlentities($booking['fullName']); ?>" class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" required placeholder="Full Name">
                                </div>
                                <div class="flex items-center">
                                    <label for="contactno" class="block text-sm font-medium text-gray-900 w-40">Mobile No.</label>
                                    <input type="text" name="contactno" value="<?php echo htmlentities($booking['mobileNumber']); ?>" class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
                                </div>
                                <div class="flex items-center">
                                    <label for="washdate" class="block text-sm font-medium text-gray-900 w-40">Wash Date</label>
                                    <input type="date" name="washdate" value="<?php echo htmlentities($booking['washDate']); ?>" required class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full">
                                </div>
                                <div class="flex items-center">
                                    <label for="washtime" class="block text-sm font-medium text-gray-900 w-40">Wash Time</label>
                                    <input type="time" name="washtime" value="<?php echo htmlentities($booking['washTime']); ?>" required class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full">
                                </div>
                                <div class="flex items-center">
                                    <label for="message" class="block text-sm font-medium text-gray-900 w-40">Message (if any)</label>
                                    <textarea name="message" class="ml-2 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" placeholder="Message if any"><?php echo htmlentities($booking['message']); ?></textarea>
                                </div>

                                <div class="row flex justify-center">
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <button type="submit" name="update" class="py-2 px-8 bg-green-900 text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600">Update</button>
                                        <button type="reset" class="py-2 px-4 bg-gray-500 text-white rounded-lg hover:bg-gray-200 focus:outline-none focus:bg-gray-600">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--Test -->
                </div>
            </div>
        </div>

        <script src=" js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php } ?>