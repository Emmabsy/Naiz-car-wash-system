<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $wpaddress = $_POST['address'];
        $wpcnumber = $_POST['contactno'];
        $ophrs = $_POST['openinghrs'];
        $email = $_POST['emailid'];

        $sql = "update tblpages set detail=:wpaddress,openignHrs=:ophrs,phoneNumber=:wpcnumber,emailId=:email where type='contact'";
        $query = $dbh->prepare($sql);
        $query->bindParam(':ophrs', $ophrs, PDO::PARAM_STR);
        $query->bindParam(':wpaddress', $wpaddress, PDO::PARAM_STR);
        $query->bindParam(':wpcnumber', $wpcnumber, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Details updates successfully');</script>";
        echo "<script>window.location.href ='contact.php'</script>";
    }

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz admin| Complete Bookings</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
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
                <div class="px-2 py-5">
                    <ol class="breadcrumb flex items-center text-gray-500">
                        <li class="mr-2">
                            <a href="dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                        </li>
                        <li>
                            <i class="fas fa-angle-right text-gray-600 "></i>
                            <span class="text-gray-900 font-bold ">Update About Page</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">


                    <!-- Grid -->
                    <div class="container mx-auto px-4 py-8">
                        <h3 class="text-2xl font-bold text-center text-green-900">Update Contact Information</h3>
                        <?php
                        $sql = "SELECT * FROM tblpages WHERE type='contact'";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        foreach ($results as $result) {
                        ?>

                            <div class="tab-pane active" id="horizontal-form">
                                <form class="w-full name=" washingpoint" method="post" enctype="multipart/form-data">
                                    <div>
                                        <label for="address" class="block text-sm font-medium text-gray-700 font-bold mb-2">Address</label>
                                        <textarea class="form-textarea mt-1 block w-full form-input w-full border border-gray-300 rounded-md bg-gray-100" name="address" id="address" placeholder="Address" required rows="3"><?php echo $result->detail; ?></textarea>
                                    </div>
                                    <div>
                                        <label for="openinghrs" class="block text-sm font-medium text-gray-700 font-bold mt-3 mb-2">Opening Hours</label>
                                        <input type="text" class="form-input p-3 block w-full form-input mt-1 w-full border border-gray-300 rounded-md bg-gray-100" name="openinghrs" id="openinghrs" placeholder="Opening Hour" value="<?php echo $result->openignHrs; ?>" required>
                                    </div>
                                    <div>
                                        <label for="emailid" class="block text-sm mt-3 font-medium text-gray-700 font-bold mb-2">Email ID</label>
                                        <input type="email" class="form-input block w-full form-input mt-1 w-full border border-gray-300 rounded-md bg-gray-100 p-3" name="emailid" id="emailid" placeholder="Email Id" required value="<?php echo $result->emailId; ?>">
                                    </div>
                                    <div>
                                        <label for="contactno" class="block text-sm mt-3 font-medium text-gray-700 font-bold mb-2">Contact Number</label>
                                        <input type="text" class="form-input mt-1 block w-full form-input mt-1 w-full border border-gray-300 rounded-md bg-gray-100 p-3" name="contactno" id="contactno" placeholder="Contact Number" required value="<?php echo $result->phoneNumber; ?>">
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="submit" name="update" class="mt-3 px-8 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Update</button>
                                    </div>
                                </form>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Footer -->
                    <div class="panel-footer"></div>
                </div>
            </div>

            <!--js -->
            <script src="js/jquery.nicescroll.js"></script>
            <script src="js/scripts.js"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>
    </body>

    </html>

<?php } ?>