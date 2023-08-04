<?php //error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Naiz Car Wash management System | About Us Page</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="overflow-x-hidden">
    <?php include_once('includes/header.php'); ?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>About us</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="about.php">About us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About Start -->
    <div class="about">
        <div class="container px-10 flex items-center">
            <div class="flex flex-wrap space-x-3  items-center">
                <div class="w-full lg:w-5/12">
                    <div class="about-img">
                        <img src="img/car1.jpg" alt="Image">
                    </div>
                </div>
                <div class="w-full lg:w-6/12">
                    <div class="section-header text-left">

                        <h2>Car Wash Services</h2>
                    </div>
                    <div class="about-content">
                        <?php
                        $sql = "SELECT type,detail from tblpages where type='aboutus'";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        foreach ($results as $result) {
                        ?>
                            <p>
                                <?php echo $result->detail; ?>
                            </p>
                        <?php } ?>
                        <hr class="my-4 ">
                        <ul class="list-disc pl-5 text-gray-900">
                            <li><i class="far fa-check-circle"></i>Seats washing</li>
                            <li><i class="far fa-check-circle"></i>Vacuum cleaning</li>
                            <li><i class="far fa-check-circle"></i>Interior wet cleaning</li>
                            <li><i class="far fa-check-circle"></i>Window wiping</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('includes/footer.php'); ?>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</body>

</html>