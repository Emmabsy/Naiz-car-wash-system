<?php error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Naiz Car Wash management System | Car Wash Points</title>

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css">


    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">




</head>

<body class="overflow-x-hidden">

    <!-- Top Bar Start -->
    <?php include_once('includes/header.php'); ?>



    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Washing Centers</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="location.php">Location</a>
                </div>
            </div>
        </div>
    </div>



    <div class="location">
        <div class="container mx-auto px-4 py-10">
            <div class="section-header text-center">
                <h2 class="text-3xl font-bold mb-5">Naiz Car Washpoints &amp; Care Centers</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
                <?php
                $sql = "SELECT * FROM tblwashingpoints";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                foreach ($results as $result) {
                ?>
                    <div class="col-span-1">
                        <div class="location-item flex items-center">
                            <i class="fas fa-map-marker-alt text-blue-500 text-3xl mr-3"></i>
                            <div class="location-text">
                                <h3 class="text-xl font-bold"><?php echo htmlentities($result->washingPointName); ?></h3>
                                <p class="text-gray-600"><?php echo htmlentities($result->washingPointAddress); ?></p>
                                <p class="text-gray-900">
                                    <strong class="text-blue-900">Call: </strong><?php echo htmlentities($result->contactNumber); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Facts Start -->
    <div class="bg-gray-200 py-16 px-8">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center justify-center">
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 px-4 mb-8">
                    <div class="bg-red-300 rounded-lg p-6 text-center shadow">
                        <i class='bx bxs-location-plus text-3xl text-gray-600'></i>
                        <div class="mt-4">
                            <h3 class="text-4xl font-bold text-gray-800 mb-2">10</h3>
                            <p class="text-lg text-gray-600">Service Points</p>
                        </div>
                        <a href="#" class="text-blue-500 mt-4 underline">More</a>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 px-4 mb-8">
                    <div class="bg-blue-300 rounded-lg p-6 text-center shadow">
                        <i class='bx bxs-wrench text-3xl text-gray-600'></i>
                        <div class="mt-4">
                            <h3 class="text-4xl font-bold text-gray-800 mb-2">50</h3>
                            <p class="text-lg text-gray-600">Car Wash Workers</p>
                        </div>
                        <a href="#" class="text-blue-500 mt-4 underline">More</a>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 px-4 mb-8">
                    <div class="bg-yellow-300 rounded-lg p-6 text-center shadow">
                        <i class='bx bxs-smile text-3xl text-gray-600'></i>
                        <div class="mt-4">
                            <h3 class="text-4xl font-bold text-gray-800 mb-2">500</h3>
                            <p class="text-lg text-gray-600">Happy Clients</p>
                        </div>
                        <a href="#" class="text-blue-500 mt-4 underline">More</a>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/4 lg:w-1/4 px-4 mb-8">
                    <div class="bg-green-300 rounded-lg p-6 text-center shadow">
                        <i class='bx bx-check-circle text-3xl text-gray-600'></i>
                        <div class="mt-4">
                            <h3 class="text-4xl font-bold text-gray-800 mb-2">5000</h3>
                            <p class="text-lg text-gray-600">Projects Completed</p>
                        </div>
                        <a href="#" class="text-blue-500 mt-4 underline">More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->



    <?php include_once('includes/footer.php'); ?>



</body>

</html>