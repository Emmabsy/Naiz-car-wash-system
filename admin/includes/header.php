<style>
    .nav-logo {
        font-weight: 600;
        /*font-size: 1.2rem;*/
        color: rgb(252, 249, 249);
    }

    .logo-color {
        color: yellow;
    }
</style>

<nav class="fixed top-0 z-50 bg-green-900 w-full border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">

                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="../index.php" class="nav-logo text-3xl font-bold ">N-<span class="logo-color">aiz</span></a>
            </div>
            <div class="flex items-center ml-3">
                <div class="relative">
                    <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">

                        <img class="w-8 h-8 rounded-full" src="images/avatar.png" alt="user photo">
                    </button>
                    <div class="absolute right-0 z-50 hidden mt-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">

                        <ul>
                            <!--
						<li>
							<a href="dashboard.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
						</li>
-->
                            <li>
                                <a href="change-password.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>
</nav>
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-60 h-screen pt-10 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-green-900 dark:bg-gray-800">


        <ul class="space-y-2 font-medium">
            <li>
                <a href="dashboard.php" class="flex items-center p-2 mt-4 text-red-300 rounded-lg dark:text-white hover:-green-600 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Home</span>
                </a>
            </li>
            <li>
                <div class="group">
                    <a href="managecar-washingpoints.php" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-red-900" id="car-wash-center">
                        <span class="flex-1 ml-3 whitespace-nowrap">Wash centers</span>
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </a>
                    <ul class="hidden ml-6 text-sm" id="car-center-submenu">
                        <li><a href="addcar-washpoint.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">Add</a></li>
                        <li><a href="managecar-washingpoints.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">Manage</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <div class="group">
                    <a href="new-booking.php" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-yellow-500" id="car-wash-link">
                        <span class="flex-1 ml-3 whitespace-nowrap">Wash bookings</span>
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </a>
                    <ul class="hidden ml-6 text-sm" id="car-wash-submenu">
                        <li><a href="new-booking.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">New</a></li>
                        <li><a href="completed-booking.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">Completed</a></li>
                        <li><a href="all-bookings.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">All</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="add-booking.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Add booking</span>
                </a>
            </li>
            <li>
                <a href="manage-enquires.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-green-500 dark:hover:bg-green-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Enquiries</span>
                </a>
            </li>
            <li>
                <a href="#" id="pages" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Pages</span>

                    <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </a>
                <ul class="hidden ml-6 text-sm" id="pagesmenu">
                    <li><a href="about.php" class=" block px-4 py-2 text-yellow-200 hover:bg-green-400">About</a></li>
                    <li><a href="contact.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">Contact</a></li>
                </ul>

            </li>
            <li>
                <a href="logout.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
                    <span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<script>
    const carWashCenter = document.getElementById('car-wash-center');
    const carWashCenterSubmenu = document.getElementById('car-center-submenu');
    const carWashLink = document.getElementById('car-wash-link');
    const carWashSubMenu = document.getElementById('car-wash-submenu');
    const pagesLink = document.getElementById('pages');
    const pagesMenu = document.getElementById('pagesmenu');

    const closeSubmenus = () => {
        carWashCenterSubmenu.classList.add('hidden');
        carWashSubMenu.classList.add('hidden');
        pagesMenu.classList.add('hidden');
    };

    const toggleCarWashCenterSubmenu = (e) => {
        e.preventDefault();
        carWashSubMenu.classList.add('hidden');
        pagesMenu.classList.add('hidden');
        carWashCenterSubmenu.classList.toggle('hidden');
    };

    const toggleCarWashSubmenu = (e) => {
        e.preventDefault();
        carWashCenterSubmenu.classList.add('hidden');
        pagesMenu.classList.add('hidden');
        carWashSubMenu.classList.toggle('hidden');
    };

    const togglePagesMenu = (e) => {
        e.preventDefault();
        carWashCenterSubmenu.classList.add('hidden');
        carWashSubMenu.classList.add('hidden');
        pagesMenu.classList.toggle('hidden');
    };

    carWashCenter.addEventListener('click', toggleCarWashCenterSubmenu);
    carWashLink.addEventListener('click', toggleCarWashSubmenu);
    pagesLink.addEventListener('click', togglePagesMenu);

    // Close submenus when clicking outside
    document.addEventListener('click', (e) => {
        const target = e.target;
        const isCarWashCenter = target === carWashCenter || carWashCenter.contains(target);
        const isCarWashLink = target === carWashLink || carWashLink.contains(target);
        const isPagesLink = target === pagesLink || pagesLink.contains(target);
        const isSubmenuLink = target.closest('.submenu') !== null;

        if (!isCarWashCenter && !isCarWashLink && !isPagesLink && !isSubmenuLink) {
            closeSubmenus();
        }
    });
</script>
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












<!--<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-60 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
	<div class="h-full px-3 pb-4 overflow-y-auto bg-green-900 dark:bg-gray-800">
		<ul class="space-y-2 font-medium">
			<li>
				<a href="dashboard.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-red-900 dark:hover:bg-gray-700 group">
					<span class="ml-3 mt-2">Home</span>
				</a>
			</li>
			<li>
				<div class="group">
					<a href="#" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-yellow-500" id="car-wash-center">
						<span class="flex-1 ml-3 whitespace-nowrap">Wash centers</span>
						<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
						</svg>
					</a>
					<ul class="hidden ml-6 text-sm" id="car-center-submenu">
						<li><a href="addcar-washpoint.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">Add</a></li>
						<li><a href="managecar-washingpoints.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">Manage</a></li>
					</ul>
				</div>
			</li>
			<li>
				<div class="group">
					<a href="#" class="flex items-center p-2 text-gray-100 rounded-lg hover:bg-yellow-500" id="car-wash-link">
						<span class="flex-1 ml-3 whitespace-nowrap">Car wash booking</span>
						<svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
						</svg>
					</a>
					<ul class="hidden ml-6 text-sm" id="car-wash-submenu">
						<li><a href="new-booking.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">New</a></li>
						<li><a href="completed-booking.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">Completed</a></li>
						<li><a href="all-bookings.php" class="block px-4 py-2 text-yellow-200 hover:bg-green-400">All</a></li>
					</ul>
				</div>
			</li>
			<li>
				<a href="add-booking.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-gray-700 group">
					<span class="flex-1 ml-3 whitespace-nowrap">Add booking</span>
				</a>
			</li>
			<li>
				<a href="manage-enquires.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
					<span class="flex-1 ml-3 whitespace-nowrap">Enquiries</span>
				</a>
			</li>
			<li>
				<a href="#" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
					<span class="flex-1 ml-3 whitespace-nowrap">Pages</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="flex items-center p-2 text-gray-100 rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
					<span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
				</a>
			</li>
		</ul>
	</div>

	<script>
		const carWashCenter = document.getElementById('car-wash-center');
		const carWashCenterSubmenu = document.getElementById('car-center-submenu');
		const carWashLink = document.getElementById('car-wash-link');
		const carWashSubMenu = document.getElementById('car-wash-submenu');

		carWashCenter.addEventListener('click', (e) => {
			e.preventDefault();
			carWashCenterSubmenu.classList.toggle('hidden');
		});

		carWashLink.addEventListener('click', (e) => {
			e.preventDefault();
			carWashSubMenu.classList.toggle('hidden');
		});
	</script>
</aside>
	-->