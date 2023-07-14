<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if ($_POST['submit'] == "Update") {
        $pagetype = $_GET['type'];
        $pagedetails = $_POST['pgedetails'];
        $sql = "UPDATE tblpages SET detail=:pagedetails WHERE type=:pagetype";
        $query = $dbh->prepare($sql);
        $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
        $query->bindParam(':pagedetails', $pagedetails, PDO::PARAM_STR);
        $query->execute();
        $msg = "Page data updated  successfully";
    }

?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz admin| About</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <link href="css/style.css" rel='stylesheet' type='text/css'>
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
                            <span class="text-gray-900 font-bold ">Update About Page</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">

                    <!-- Grid -->
                    <div class="w-4/5 mx-auto bg-gray-200 p-6 rounded-lg shadow">
                        <h3 class="text-2xl font-bold mb-1 text-center text-green-900">Update Page Data</h3>
                        <?php if ($error) { ?>
                            <div class="text-red-500">
                                <strong>ERROR</strong>: <?php echo htmlentities($error); ?>
                            </div>
                        <?php } else if ($msg) { ?>
                            <div class="text-green-500">
                                <strong>SUCCESS</strong>: <?php echo htmlentities($msg); ?>
                            </div>
                        <?php } ?>
                        <form name="package" method="post" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="menu1" class="block text-gray-700 font-medium">Select page</label>
                                <select name="menu1" onchange="updatePageContent(this)" class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full">
                                    <option value="" selected="selected">***Select One***</option>
                                    <option value="aboutus">About Us</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 font-medium MB-2">Selected Page</label>
                                <p class="bg-gray-100 py-4 px-4 rounded-lg text-green-800">
                                    <?php
                                    $selectedPage = $_POST['menu1'];
                                    switch ($selectedPage) {
                                        case "aboutus":
                                            echo "About Us";
                                            break;
                                        default:
                                            echo "";
                                            break;
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="mb-4">
                                <label for="pgedetails" class="block text-gray-700 font-medium ">Package Details</label>
                                <textarea class="form-textarea mt-1 py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" rows="4" cols="50" name="pgedetails" id="pgedetails" placeholder="Package Details" required>
            <?php
            $selectedPage = $_POST['menu1'];
            $pagetype = ($selectedPage == "aboutus") ? "aboutus" : "";
            $sql = "SELECT detail FROM tblpages WHERE type=:pagetype";
            $query = $dbh->prepare($sql);
            $query->bindParam(':pagetype', $pagetype, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
                    echo htmlentities($result->detail);
                }
            }
            ?>
        </textarea>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" name="submit" value="Update" id="submit" class="px-4 py-2 text-white bg-gray-700 rounded-lg hover:bg-blue-600 py-2 px-10  text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600">Update</button>
                            </div>
                        </form>

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