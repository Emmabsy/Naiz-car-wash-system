<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['update'])) {
        $id = $_GET['bid'];
        $ttype = $_POST['txntype'];
        $transactionno = $_POST['transactionno'];
        $message = $_POST['message'];

        $sql = "update  tblcarwashbooking set adminRemark=:message,paymentMode=:ttype,txnNumber=:transactionno,status='Completed' where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':ttype', $ttype, PDO::PARAM_STR);
        $query->bindParam(':transactionno', $transactionno, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();

        echo "<script>alert('Booking Details updated successfully');</script>";
        //echo "<script>window.location.href ='managecar-washingpoints.php'</script>";
    }


?>

    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz | admin Details Bookings</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

            <div class="w-1/5 bg-gray-200">

            </div>


            <div class="w-4/5 bg-white mt-8 py-4 px-2">
                <div class="py-4 mb-8">

                    <div class=" left-content">
                        <div class="mother-grid-inner">
                            <!--header start here-->
                            <div class="clearfix"> </div>
                        </div>
                        <!--heder end here-->
                        <div class="px-4 py-8">
                            <ol class="breadcrumb mb-2 flex items-center text-gray-500">
                                <li class="mr-2">
                                    <a href="dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                                </li>
                                <li>
                                    <i class="fas fa-angle-right text-gray-600 mx-1"></i>
                                    <span class="text-gray-900 font-bold ">Manage Bookings</span>
                                </li>
                            </ol>
                        </div>
                        <div class="agile-grids">
                            <!-- tables -->
                            <div class="agile-tables">
                                <div class="w3l-table-info">
                                    <h2 class="text-2xl mb-4 text-center text-3xl font-bold text-red-600">Bookings Details #<?php echo $_GET['bookingid']; ?></h2>
                                    <table id="table" class="w-full border border-gray-300">
                                        <tbody>
                                            <?php
                                            $bid = $_GET['bid'];
                                            $sql = "SELECT * from tblcarwashbooking join tblwashingpoints on tblwashingpoints.id=tblcarwashbooking.carWashPoint where tblcarwashbooking.id='$bid'";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) { ?>
                                                    <tr>
                                                        <th class="p-2 border-b">Booking Id#</th>
                                                        <td class="p-2 border-b"><?php echo htmlentities($result->bookingId); ?></td>
                                                        <th class="p-2 border-b">Posting Date</th>
                                                        <td class="p-2 border-b"><?php echo htmlentities($result->postingDate); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="p-2 border-b">Name</th>
                                                        <td class="p-2 border-b"><?php echo htmlentities($result->fullName); ?></td>
                                                        <th class="p-2 border-b">Mobile No</th>
                                                        <td class="p-2 border-b"><?php echo htmlentities($result->mobileNumber); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="p-2 border-b">Package Type</th>
                                                        <td class="p-2 border-b">
                                                            <?php
                                                            $ptype = $result->packageType;
                                                            if ($ptype == 1) : echo "BASIC CLEANING (KES700)";
                                                            endif;
                                                            if ($ptype == 2) : echo "PREMIUM CLEANING (KES1500)";
                                                            endif;
                                                            if ($ptype == 3) : echo "COMPLEX CLEANING (KES3000)";
                                                            endif;
                                                            ?>
                                                        </td>
                                                        <th class="p-2 border-b">Washing Point</th>
                                                        <td class="p-2 border-b"><?php echo htmlentities($result->washingPointName); ?><br><?php echo htmlentities($result->washingPointAddress); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="p-2 border-b">Washing Date</th>
                                                        <td class="p-2 border-b"><?php echo htmlentities($result->washDate); ?></td>
                                                        <th class="p-2 border-b">Washing Time</th>
                                                        <td class="p-2 border-b"><?php echo htmlentities($result->washTime); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="p-2 border-b">Message (if Any)</th>
                                                        <td colspan="3" class="p-2 border-b"><?php echo htmlentities($result->message); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="p-2 border-b">Status</th>
                                                        <td colspan="3" class="p-2 border-b"><?php echo htmlentities($result->status); ?></td>
                                                    </tr>
                                                    <?php if ($result->adminRemark == '') : ?>
                                                        <tr>
                                                            <td colspan="3" class="p-2 border-b">
                                                                <button data-modal-target="update-modal" data-modal-toggle="update-modal" class="bg-blue-500 text-white py-2 px-4 rounded">Take Action</button>
                                                            </td>
                                                        </tr>

                                                    <?php else : ?>

                                                        <tr>
                                                            <td colspan="4" class="p-2 text-blue-700 text-2xl text-center font-bold">Admin Details</td>
                                                        </tr>

                                                        <tr>
                                                            <th class="p-2 border-b">Transaction Type</th>
                                                            <td class="p-2 border-b"><?php echo htmlentities($result->paymentMode); ?></td>
                                                            <th class="p-2 border-b">Transaction No.(if any)</th>
                                                            <td class="p-2 border-b"><?php echo htmlentities($result->txnNumber); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="p-2 border-b">Admin Remark</th>
                                                            <td colspan="3" class="p-2 border-b"><?php echo htmlentities($result->adminRemark); ?></td>
                                                        </tr>
                                                    <?php endif; ?>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main modal -->
                    <!-- Main modal -->
                    <div id="update-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="update-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Booking #<?php echo $_GET['bookingid']; ?></h3>

                                    <form method="post" name="update">

                                        <div class="mb-4">
                                            <label for="txntype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction Type</label>
                                            <select name="txntype" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white">
                                                <option value="">Transaction Type</option>
                                                <option value="e-Wallet">e-Wallet</option>
                                                <option value="UPI">UPI</option>
                                                <option value="Debit/Credit Card">Debit/Credit Card</option>
                                                <option value="Cash">Cash</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="transactionno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transaction No.(if any)</label>
                                            <input type="text" name="transactionno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" placeholder="Transaction Number (if any)">
                                        </div>
                                        <div class="mb-4">
                                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admin Remark</label>
                                            <textarea name="message" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white" placeholder="Admin Remark" required></textarea>
                                        </div>
                                        <button type="submit" name="update" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>

                    
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Function to toggle modal visibility
                        function toggleModal(modalId) {
                            const modal = document.getElementById(modalId);
                            modal.classList.toggle('hidden');
                            modal.classList.toggle('flex');
                        }

                        // Attach event listener to modal toggle button
                        const modalToggleButton = document.querySelector('[data-modal-toggle="update-modal"]');
                        modalToggleButton.addEventListener('click', () => {
                            toggleModal('update-modal');
                        });

                        // Attach event listener to modal hide button
                        const modalHideButton = document.querySelector('[data-modal-hide="update-modal"]');
                        modalHideButton.addEventListener('click', () => {
                            toggleModal('update-modal');
                        });
                    </script>


                    <?php include('includes/sidebar.php'); ?>
                </div>


                <script src="js/jquery.nicescroll.js"></script>
                <script src="js/scripts.js"></script>
    </body>

    </html>

<?php } ?>