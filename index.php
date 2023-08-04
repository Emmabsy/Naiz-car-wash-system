<?php //error_reporting(0);
include('includes/config.php');

if (isset($_POST['book'])) {
    $ptype = $_POST['packagetype'];
    $wpoint = $_POST['washingpoint'];
    $fname = $_POST['fname'];
    $mobile = $_POST['contactno'];
    $date = $_POST['washdate'];
    $time = $_POST['washtime'];
    $message = $_POST['message'];
    $status = 'New';
    $bno = mt_rand(100000000, 999999999);
    $sql = "INSERT INTO tblcarwashbooking(bookingId,packageType,carWashPoint,fullName,mobileNumber,washDate,washTime,message,status) VALUES(:bno,:ptype,:wpoint,:fname,:mobile,:date,:time,:message,:status)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':bno', $bno, PDO::PARAM_STR);
    $query->bindParam(':ptype', $ptype, PDO::PARAM_STR);
    $query->bindParam(':wpoint', $wpoint, PDO::PARAM_STR);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':date', $date, PDO::PARAM_STR);
    $query->bindParam(':time', $time, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {

        echo '<script>alert("Your booking done successfully. Booking number is "+"' . $bno . '")</script>';
        echo "<script>window.location.href ='washing-plans.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Naiz Car Wash management System | Home Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/corousel.php'); ?>
    <!-- About End -->
    <?php include_once('includes/serv.php'); ?>
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

    <?php include_once('includes/footer.php'); ?>

    <!-- Choose Plan End -->
</body>

</html>