<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['rid'])) {
        $id = $_GET['rid'];
        $sql = "DELETE FROM tblenquiry WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        echo "<script>alert('Record Deleted');</script>";
        echo "<script>window.location.href ='m-enquiries.php'</script>";
    }
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <title>Naiz | View My Enquiries</title>
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
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
                <div class="bg-gray-100 py-4 mb-4"></div>

                <!-- Breadcrumb -->
                <div class="px-4 py-8">
                    <ol class="breadcrumb flex items-center text-gray-500">
                        <li class="mr-2">
                            <a href="user-dashboard.php" class="text-green-700 hover:text-blue-600 font-bold "> <i class="fas fa-home mr-1"></i>Home </a>
                        </li>
                        <li>
                            <i class="fas fa-angle-right text-gray-600 mx-1"></i>
                            <span class="text-gray-900 font-bold ">View My Enquiries</span>
                        </li>
                    </ol>
                </div>

                <div class="overflow-x-auto">
                    <h2 class="mb-4 text-center text-3xl font-bold text-red-600">My Enquiries</h2>
                    <table id="table" class="w-full border border-gray-300">
                        <thead class="bg-gray-700">
                            <tr class="text-gray-100 text-md ">
                                <th class="p-2 border-b w-24">Ticket ID</th>
                                <th class="p-2 border-b w-20">Name</th>
                                <th class="p-2 border-b">Email</th>
                                <th class="p-2 border-b">Subject</th>
                                <th class="p-2 border-b">Description</th>
                                <th class="p-2 border-b">Posting Date</th>
                                <th class="p-2 border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $userId = $_SESSION['id'];
                            $sql = "SELECT * FROM tblenquiry WHERE UserId = :userId";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':userId', $userId, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {
                            ?>
                                    <tr>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600">#TCKT-<?php echo htmlentities($result->id); ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->FullName); ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600">
                                            <?php echo $result->EmailId; ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->Subject); ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->Description); ?></td>
                                        <td class="p-2 border-b border-solid border-2 border-gray-600"><?php echo htmlentities($result->PostingDate); ?></td>
                                        <?php if ($result->Status == 1) {
                                        ?><td class="p-2 border-b border-solid border-2 border-gray-600 text-blue-400">Read</td>
                                        <?php } else { ?>
                                            <td>
                                                <a href="view-my-enquiries.php?rid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Do you really want to delete')">Delete</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7" class="p-2 border-b border-solid border-2 border-gray-600 text-center">No inquiries found.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="js/jquery.nicescroll.js"></script>
        <script src="js/scripts.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php } ?>