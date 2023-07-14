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

    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta charset="utf-8">
    <title>Naiz Car Wash management System | Plans</title>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    /* Rest of the CSS remains the same */
</style>


<body>

    <?php include_once('includes/header.php'); ?>
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Washing Plan</h2>
                </div>
                <div class="col-12">
                    <a href="index.php">Home</a>
                    <a href="washing-plans.php">Price</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container bg-white">
        <h2 class="plan-heading text-3xl font-bold mb-5 text-center">Choose Your Plan</h2>
        <div class="flex flex-wrap justify-center">
            <div class="plan-card rounded-lg p-6 shadow-md mb-6 mr-6">
                <div class="plan-card__header mb-4">
                    <h3 class="plan-card__title text-2xl font-bold">Basic</h3>
                    <p class="plan-card__price text-xl text-gray-500">KES 700/wash</p>
                </div>
                <ul class="plan-card__features text-gray-350 mb-4">
                    <li>Seats Washing</li>
                    <li>Interior Cleaning</li>
                    <li>Exterior Cleaning</li>
                </ul>
                <a href="#" class="py-2 px-2 mt-4 bg-green-900 text-m text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600" onclick="showModal()">Book Now</a>
            </div>


            <div class="plan-card rounded-lg p-6 shadow-md mb-6 mr-6">
                <div class="plan-card__header mb-4">
                    <h3 class="plan-card__title text-2xl font-bold">Standard</h3>
                    <p class="plan-card__price text-xl text-gray-500">KES 1500/wash</p>
                </div>
                <ul class="plan-card__features text-gray-350 mb-4">
                    <li>Seats Washing</li>
                    <li>Interior Cleaning</li>
                    <li>Exterior Cleaning</li>
                    <li>Vacuum Cleaning</li>
                    <li>Additional Services</li>
                </ul>
                <a href="#" class="py-2 px-2 mt-4 bg-green-900 text-m text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600" onclick="showModal()">Book Now</a>
            </div>
            <div class="plan-card rounded-lg p-6 shadow-md mb-6 mr-6">
                <div class="plan-card__header mb-4">
                    <h3 class="plan-card__title text-2xl font-bold">Premium</h3>
                    <p class="plan-card__price text-xl text-gray-500">KES 2000/wash</p>
                </div>
                <ul class="plan-card__features text-gray-350 mb-4">
                    <li>Seats Washing</li>
                    <li>Interior Cleaning</li>
                    <li>Exterior Cleaning</li>
                    <li>Vacuum Cleaning</li>
                    <li>Additional Services</li>
                </ul>
                <a href="#" class="py-2 px-2 mt-4 bg-green-900 text-m text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600" onclick="showModal()">Book Now</a>
            </div>
            <div class="plan-card rounded-lg p-6 shadow-md mb-6 mr-2">
                <div class="plan-card__header mb-4">
                    <h3 class="plan-card__title text-2xl font-bold">Executive</h3>
                    <p class="plan-card__price text-xl text-gray-500">KES 4000/wash</p>
                </div>
                <ul class="plan-card__features text-gray-350 mb-4">
                    <li>Seats Washing</li>
                    <li>Interior Cleaning</li>
                    <li>Exterior Cleaning</li>

                    <li>Vacuum Cleaning</li>
                    <li>Additional Services</li>
                    <li>Engine Cleaning</li>
                </ul>
                <a href="#" class="py-2 px-2 mt-4 bg-green-900 text-m text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600" onclick="showModal()">Book Now</a>
            </div>

            <!-- Rest of the plan cards... -->
        </div>

        <!-- Modal -->
        <div class="modal-container mb-9" id="myModal" style="display: none;">

            <div class="modal-background"></div>
            <div class="modal-content bg-gray-200">
                <div class="modal-header">
                    <h2 class="modal-title mt-5 flex items-center justify-between">
                        Car Wash Booking
                        <button type="button" class="close text-red-500" onclick="hideModal()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h2>

                </div>

                <div class="modal-body">
                    <form method="post" class="modal-form">

                        <div class="form-group">
                            <label for="packagetype" class="block text-sm font-medium text-gray-900 w-40">Package Type</label>
                            <select name="packagetype" required class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-900 dark:text-white w-full">

                                <option value="">Package Type</option>
                                <option value="1">BASIC CLEANING (KES 700)</option>
                                <option value="2">PREMIUM CLEANING (KES 1500)</option>
                                <option value="3">COMPLEX CLEANING (KES 2000)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="washingpoint">Select Washing Point</label>
                            <select name="washingpoint" class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" required class="form-control">
                                <option value="">Select Washing Point</option>

                                <?php $sql = "SELECT * from tblwashingpoints";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                foreach ($results as $result) {               ?>
                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->washingPointName); ?> (<?php echo htmlentities($result->washingPointAddress); ?>)</option>
                                <?php } ?>
                                <!-- Add your washing points dynamically here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="fname" class="block text-sm 
                             font-medium text-gray-900 w-40">Full Name</label>
                            <input type="text" name="fname" class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-green-600 dark:border-gray-500 dark:text-white w-full" required placeholder="Full Name">

                        </div>
                        <div class="form-group">
                            <label for="contactno">Mobile No</label>
                            <input type="text" name="contactno" class=" py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" pattern="[0-9]{10}" title="10 numeric characters only" required placeholder="Mobile No.">
                        </div>
                        <div class="form-group">
                            <label for="washdate">Wash Date</label>
                            <input type="date" class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" name="washdate" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="washtime">Wash Time</label>
                            <input type="time" class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" name="washtime" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Message (if any)</label>
                            <textarea name="message" class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full" placeholder="Message if any"></textarea>
                        </div>
                        <div class="form-group text-center p">

                            <input type="submit" class=" py-1 px-10 mt-2 mb-5 bg-gray-700 text-m text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600" name="book" value="Book Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!---->






    <!---->

    <script>
        function showModal() {
            document.getElementById("myModal").style.display = "flex";
        }

        function hideModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
    <?php include_once('includes/footer.php'); ?>


</body>

</html>