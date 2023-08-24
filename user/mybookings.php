<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}


// Include the config file
include('includes/config.php');

// Fetch the logged-in user's email from the session
$userEmail = $_SESSION['login'];

// Code for Deletion
if (isset($_GET['rid'])) {
    $id = $_GET['rid'];
    $sql = "DELETE FROM tblcarwashbooking WHERE id=:id AND userEmail = :userEmail";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Record Deleted');</script>";
    echo "<script>window.location.href ='allbookings.php'</script>";
}

// Fetch bookings for the logged-in user only
$sql = "SELECT * FROM tblcarwashbooking WHERE userEmail = :userEmail";
$query = $dbh->prepare($sql);
$query->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Naiz | View My Bookings</title>
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
                        <a href="user-dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                    </li>
                    <li>
                        <i class="fas fa-angle-right text-gray-600 mx-1"></i>
                        <span class="text-gray-900 font-bold ">View My Bookings</span>
                    </li>
                </ol>
            </div>

            <div class="overflow-x-auto">
                <h2 class="mb-4 text-center text-3xl font-bold text-red-600">View Bookings</h2>
                <table id="table" class="w-full border border-gray-300">
                    <thead class="bg-gray-700">
                        <tr class="text-gray-100 text-md ">
                            <th>#</th>
                            <th class=" p-2 border-b">Booking No.</th>
                            <th class="p-2 border-b">Package Type</th>
                            <th class="p-2 border-b">Car Wash Point</th>
                            <th class="p-2 border-b">Full Name</th>
                            <th class="p-2 border-b">Mobile Number</th>
                            <th class="p-2 border-b">Wash Date</th>
                            <th class="p-2 border-b">Wash Time</th>
                            <th class="p-2 border-b">Message</th>
                            <th class="p-2 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * from tblcarwashbooking";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $result) {
                                $ptype = $result->packageType;
                                $ptypeName = "";
                                if ($ptype == 1) {
                                    $ptypeName = "BASIC CLEANING (KES 700)";
                                } elseif ($ptype == 2) {
                                    $ptypeName = "STANDARD CLEANING (KES 1500)";
                                } elseif ($ptype == 3) {
                                    $ptypeName = "EXECUTIVE CLEANING (KES 2500)";
                                }

                                // Fetch car wash point name based on ID
                                $carWashPointID = $result->carWashPoint;
                                $sql2 = "SELECT * FROM tblwashingpoints WHERE id=:carWashPointID";
                                $query2 = $dbh->prepare($sql2);
                                $query2->bindParam(':carWashPointID', $carWashPointID, PDO::PARAM_INT);
                                $query2->execute();
                                $carWashPointData = $query2->fetch(PDO::FETCH_ASSOC);
                                $carWashPointName = $carWashPointData['washingPointName'];
                        ?>
                                <tr class="bg-blue-100 border-solid border-2 border-gray-600">
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($cnt); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->bookingId); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($ptypeName); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($carWashPointName); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->fullName); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->mobileNumber); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->washDate); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->washTime); ?></td>
                                    <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->message); ?></td>
                                    <td>
                                        <a class="font-bold text-green-900" href="edit-booking.php?bookingId=<?php echo htmlentities($result->bookingId); ?>">Edit</a>


                                </tr>
                        <?php
                                $cnt = $cnt + 1;
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>