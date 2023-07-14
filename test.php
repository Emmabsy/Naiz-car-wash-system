<form name="package" method="post" enctype="multipart/form-data">
    <div class="mb-4">
        <label for="menu1" class="block text-gray-700 font-medium">Select page</label>
        <select name="menu1" onchange="MM_jumpMenu('parent',this,0)" class="py-2 px-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white w-full">
            <option value="" selected="selected">***Select One***</option>
            <option value="about.php?type=aboutus">About Us</option>
        </select>
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 font-medium MB-2">Selected Page</label>
        <p class="bg-gray-100 py-4 px-4 rounded-lg text-green-800">
            <?php
            switch ($_GET['type']) {
                case "aboutus":
                    echo "About US";
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
                                    $pagetype = $_GET['type'];
                                    $sql = "SELECT detail from tblpages where type=:pagetype";
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
        <button type="submit" name="submit" value="Update" id="submit" class="px-4 py-2 text-white bg-gray-700 rounded-lg hover:bg-blue-600
                                py-2 px-10  text-white rounded-lg hover:bg-blue-900 focus:outline-none focus:bg-gray-600">Update</button>
    </div>
</form>