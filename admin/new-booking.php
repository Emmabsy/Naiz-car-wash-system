<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz admin| New Bookings</title>
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
                            <span class="text-gray-900 font-bold ">New Bookings</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">

                    <h2 class="mb-4 text-center text-3xl font-bold text-red-600">New Bookings</h2>
                    <table id="table" class="w-full border border-gray-300">
                        <thead class="bg-gray-700">
                            <tr class="text-gray-100 text-md ">
                                <th class=" p-2 border-b">Booking No.</th>
                                <th class="p-2 border-b">Name</th>
                                <th class="p-2 border-b">Package Type</th>
                                <th class="p-2 border-b">Washing Point</th>
                                <th class="p-2 border-b">Washing Date/Time</th>
                                <th class="p-2 border-b">Posting Date</th>
                                <th class="p-2 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sql = "SELECT *,tblcarwashbooking.id as bid from tblcarwashbooking
join tblwashingpoints on tblwashingpoints.id=tblcarwashbooking.carWashPoint
 where status='New'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {                ?>
                                    <tr class="bg-green-100 border-solid border-2 border-gray-600">
                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->bookingId); ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->fullName); ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600">
                                            <?php $ptype = $result->packageType;
                                            if ($ptype == 1) : echo "BASIC CLEANING (KES700)";
                                            endif;
                                            if ($ptype == 2) : echo "STANDARD CLEANING (KES1500)";
                                            endif;
                                            if ($ptype == 3) : echo "EXECUTIVE CLEANING (KES2500)";
                                            endif;


                                            ?></td>


                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->washingPointName); ?><br />
                                            <?php echo htmlentities($result->washingPointAddress); ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->washDate . "/" . $result->washTime); ?></td>

                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->postingDate); ?></td>


                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><a class="text-blue-500 font-bold" href="booking-details.php?bid=<?php echo htmlentities($result->bid); ?>&&bookingid=<?php echo htmlentities($result->bookingId); ?>">View</a>
                                        </td>
                                    <?php } ?>
                                    </tr>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="6" style="color:red;">No Record found</td>

                                    </tr>
                                <?php } ?>

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
<?php } ?>