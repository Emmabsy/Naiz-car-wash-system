<?php error_reporting(0);
include('includes/config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO tblenquiry(FullName,EmailId,Subject,Description) VALUES(:name,:email,:subject,:message)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':subject', $subject, PDO::PARAM_STR);
    $query->bindParam(':message', $message, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo "<script>alert('Query sent successfully');</script>";
        echo "<script>window.location.href ='contact.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Naiz Car Wash management System | Services</title>
    <!-- Favicon -->
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <?php include_once('includes/header.php'); ?>
    
    


    <div class="page-header">
     
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Services</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="contact.php">Services</a>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('includes/serv.php'); ?>




    <!-- Footer Start -->
    <?php include_once('includes/footer.php'); ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Contact Javascript File -->
    <!--  -->

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>