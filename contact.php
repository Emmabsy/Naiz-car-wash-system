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
    <title>Naiz | Contact Us</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="overflow-x-hidden">
    <?php include_once('includes/header.php'); ?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contact</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="washing-plans.php">Contact</a>
                </div>
            </div>
        </div>
    </div>





    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center">
                <p>Get In Touch</p>
                <h2>Contact for any query</h2>
            </div>
            <!--
            <div class="flex flex-wrap justify-center">
                <?php
                $sql = "SELECT * from tblpages where type='contact'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                foreach ($results as $result) {
                ?>
                    <div class="w-full md:w-1/2 lg:w-1/3">
                        <div class="contact-info text-center py-0">
                            <h2 class="text-2xl">Quick Contact Info</h2>
                            <div class="contact-info-item mt-3">
                                <div class="contact-info-icon">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-info-text text-center">
                                    <h3 class="text-lg">Address</h3>
                                    <p class="text-gray-700"><?php echo $result->detail; ?></p>
                                </div>
                            </div>
                            <div class="contact-info-item mt-6">
                                <div class="contact-info-icon">
                                    <i class="far fa-clock"></i>
                                </div>
                                <div class="contact-info-text">
                                    <h3 class="text-lg">Opening Hour</h3>
                                    <p class="text-gray-700"><?php echo $result->openignHrs; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                -->
            <div>
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" method="post">
                        <div class="control-group">
                            <input type="text" class="form-control w-full mb-4 px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-indigo-500" id="name" placeholder="Your Name" required="required" name="name" />
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control w-full mb-4 px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-indigo-500" id="email" placeholder="Your Email" name="email" required="required" />
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control w-full mb-4 px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-indigo-500" id="subject" placeholder="Subject" required="required" name="subject" />
                        </div>
                        <div class="control-group">
                            <textarea class="form-control w-full mb-4 px-4 py-2 rounded-md border-gray-300 focus:outline-none focus:border-indigo-500" id="message" placeholder="Message" required="required" name="message"></textarea>
                        </div>
                        <div>
                            <button class="btn btn-custom bb py-2 px-2 mt-2 mb-5 bg-green-900 text-m text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600" type="submit" id="sendMessageButton" name="submit">Send Message</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Contact End -->


    <!-- Footer Start -->
    <?php include_once('includes/footer.php'); ?>


</body>

</html>