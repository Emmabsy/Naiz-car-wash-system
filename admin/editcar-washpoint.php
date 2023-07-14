<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $id = $_GET['wpid'];
        $wpname = $_POST['washingpointname'];
        $wpaddress = $_POST['address'];
        $wpcnumber = $_POST['contactno'];

        $sql = "update  tblwashingpoints set washingPointName=:wpname,washingPointAddress=:wpaddress,contactNumber=:wpcnumber where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':wpname', $wpname, PDO::PARAM_STR);
        $query->bindParam(':wpaddress', $wpaddress, PDO::PARAM_STR);
        $query->bindParam(':wpcnumber', $wpcnumber, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Car wash point updated successfully');</script>";
        echo "<script>window.location.href ='managecar-washingpoints.php'</script>";
    }


?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz admin| Car Wash Centers</title>
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
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <script src="js/jquery-2.1.4.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">

        <style>
            .breadcrumb ol li:not(:last-child)::after {
                content: "/";
                margin: 0 6px;
                color: #CBD5E0;
            }

            .breadcrumb ol li:last-child {
                color: #1E40AF;
                font-weight: 600;
            }
        </style>
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
                            <span class="text-gray-900 font-bold ">Edit Center</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">
                    <!--Test -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div class="bg-white rounded-md shadow-md p-6 border border-gray-200 lg:col-span-2">
                            <h3 class="text-2xl font-bold mb-3 text-green-700 text-center">Edit Car Wash Center Information</h3>
                            <?php
                            $id = $_GET['wpid'];
                            $sql = "SELECT * FROM tblwashingpoints WHERE id='$id'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            foreach ($results as $result) {
                            ?>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="horizontal-form">
                                        <form class="w-full" name="washingpoint" method="post" enctype="multipart/form-data">
                                            <div class="mb-4">
                                                <label for="washingpointname" class="block text-sm font-medium text-gray-700">Car Wash Point Name</label>
                                                <input type="text" class="form-input mt-1 w-full border border-gray-300 p-3 rounded-md bg-green-100" name="washingpointname" id="washingpointname" value="<?php echo htmlentities($result->washingPointName); ?>" required>
                                            </div>
                                            <div class="mb-4">
                                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                                <textarea class="form-textarea mt-1 w-full border border-gray-300 rounded-md bg-blue-100" name="address" id="address" placeholder="Address" required rows="4"><?php echo htmlentities($result->washingPointAddress); ?></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="contactno" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                                <input type="text" class="form-input mt-1 w-full border border-gray-300 rounded-md bg-yellow-100 p-2" name="contactno" id="contactno" value="<?php echo htmlentities($result->contactNumber); ?>" required>
                                            </div>

                                            <div class="flex justify-end">
                                                <button type="submit" name="submit" class="px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <script src=" js/jquery.nicescroll.js"></script>
                <script src="js/scripts.js"></script>
                <script src="js/bootstrap.min.js"></script>
            </div>
        </div>
    </body>

    </html>

<?php } ?>