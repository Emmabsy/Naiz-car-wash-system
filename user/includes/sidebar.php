<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-60 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-blue-900 dark:bg-gray-800">


        <ul class="space-y-2 font-medium">
            <li>
                <a href="user-dashboard.php" class="flex items-center p-2 mt-4 text-red-300 rounded-lg dark:text-white hover:-green-600 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Home</span>
                </a>
            </li>
            <li>
                <a href="addbooking.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Book Washing </span>
                </a>
            </li>



            <li>
                <div class="group">
                    <a href="mybookings.php" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-yellow-500" id="car-wash-link">
                        <span class="flex-1 ml-3 whitespace-nowrap">View bookings</span>
                    </a>

                </div>
            </li>
            <li>
                <a href="m-enquiries.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Enquiries</span>
                </a>
            </li>


            <li>
                <a href="change-pass.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                </a>
            </li>




        </ul>
    </div>
</aside>


<script>
    // Get the hamburger button and the sidebar
    const hamburgerBtn = document.querySelector('[data-drawer-toggle="logo-sidebar"]');
    const sidebar = document.getElementById('logo-sidebar');

    // Add a click event listener to the hamburger button
    hamburgerBtn.addEventListener('click', () => {
        // Toggle the 'hidden' class on the sidebar
        sidebar.classList.toggle('hidden');

        // Remove the gray strip when hiding the sidebar
        if (sidebar.classList.contains('hidden')) {
            sidebar.classList.remove('sm:translate-x-0');
        } else {
            sidebar.classList.add('sm:translate-x-0');
        }
    });
</script>
<script>
    // Dropdown menu functionality
    const dropdownToggle = document.querySelector('[data-dropdown-toggle]');
    const dropdownMenu = document.getElementById('dropdown-user');

    dropdownToggle.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // Close dropdown menu when clicking outside
    document.addEventListener('click', (event) => {
        if (!dropdownToggle.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>