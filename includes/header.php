<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Tailwind CSS CDN link here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Add Font Awesome CDN link here -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Responsive Menu Bar</title>
    <style>
        /* Custom styles for demonstration purposes */
        .nav {
            background: var(--color-bg);
            width: 100%;
            top: 0;
            z-index: 10;
            box-shadow: 0 1rem 1rem rgba(0, 0, 0, 0.2);
            left: 0;
            right: 0;
        }



        .nav__container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .nav__logo {
            font-weight: 600;
            /*font-size: 1.2rem;*/
            color: white;
        }

        .nav__items {
            display: flex;
            gap: 4rem;
        }

        .nav__items li a {
            color: white;
            text-decoration: none;
        }

        .nav__items li:hover a {
            color: yellow;
        }

        .nav__profile {
            position: relative;
            cursor: pointer;
            margin-right: 1rem;
        }

        .avatar {
            width: 2rem;
            height: 2rem;
            aspect-ratio: 1/1;
            border-radius: 50%;
            overflow: hidden;
            border: 0.2rem solid var(--color-yellow);

        }

        .nav__profile ul {
            position: absolute;
            cursor: pointer;
            top: 120%;
            right: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2rem 2rem rgba(0, 0, 0, 0.4);
            visibility: hidden;
            opacity: 0;
            transition: var(--transition);
        }

        .nav__profile:hover>ul {
            visibility: visible;
            opacity: 4;
        }

        .nav__profile ul li a {
            background: var(--color-gray-900);
            display: block;
            padding: 0.5rem;
            width: 100%;
        }

        .nav__profile ul li:last-child a {
            background: var(--color-yellow);
            color: var(--color-bg);
        }

        .admint {
            background: var(--color-gray-900);
        }

        .adminttwo {
            background: var(--color-yellow);

        }

        /* Responsive styles */
        @media (max-width: 640px) {
            .nav__items {
                display: none;
            }

            .nav__profile {
                margin-right: 1rem;
            }

            .nav__profile ul {
                top: 120%;

            }
        }

        @media (min-width: 768px) {
            .nav__items {
                gap: 1.3rem;
            }
        }
    </style>
</head>

<body>
    <nav class="nav sticky lg:pl-2 lg:pr-5 md:p-4 md:pr-2 sm:pl-2 sm:pr-2">
        <div class="container flex items-center justify-between py-5 px-5">
            <a href="index.php" class="nav__logo text-3xl font-bold">N-<span class="logo-color">aiz</span></a>

            <ul class="nav__items flex md:flex items-center gap-10">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link ">About</a>
                </li>
                <li class="nav-item">
                    <a href="services.php" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="location.php" class="nav-link">Wash Centers</a>
                </li>
                <li class="nav-item">
                    <a href="../login.php" class="nav-link">Book</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <!--
                <li class="nav-item">
                    <a href="admin" class="nav-link">Dashboard</a>
                </li>
    -->
                <li class="nav-item">
                    <!--Change-->
                    <div class="relative">
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">

                            <img class="w-8 h-8 rounded-full" src="/img/avatar.png" alt="user photo">
                        </button>

                        <div class=" absolute right-0 z-50 hidden mt-4 text-base list-none bg-green-900 divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">

                            <ul>
                                <li>
                                    <a href="admin" class="admint block px-4 py-2 text-sm text-white hover:bg-gray-700 dark:text-green-900 dark:hover:bg-gray-400 dark:hover:text-white">Admin</a>
                                </li>

                                <li>
                                    <a href="../login.php" class=" adminttwo block px-2 py-2 text-sm hover:bg-gray-500 ddark:hover:bg-gray-600 dark:hover:text-white text-center">Login</a>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!--Change-->

                    <!--<li class="nav__profile relative">
                    <div class="avatar">
                        <img src="/img/avatar.png" alt="Avatar">
                    </div>
                    <ul>
                        <li><a href="admin">Dashboard</a></li>
                        <li><a href=" logout.html">Logout</a></li>
                    </ul>
                </li>
    -->
            </ul>

            <button id="open__nav-btn" class="lg:hidden md:hidden md:pl-2 text-3xl mr-0 font-bold text-yellow-400">
                <i class="fa fa-bars"></i>
            </button>

        </div>
    </nav>

    <ul id="mobile__nav" class=" hidden sm:hidden mobprofile">
        <li class="nav-item">
            <a href="index.php" class="nav-link block py-2 pl-3 pr-4 text-white bg-gray-900 rounded md:bg-transparent md:text-green-900 md:p-0 md:dark:text-green-500">Home</a>
        </li>
        <li class="nav-item">
            <a href="about.php" class="nav-link   block py-2 pl-3 pr-4 text-white bg-gray-900 rounded md:bg-transparent md:text-green-900 md:p-0 md:dark:text-green-500">About</a>
        </li>
        <li class="nav-item">
            <a href="services.php" class="nav-link  block py-2 pl-3 pr-4 text-white bg-gray-900 rounded md:bg-transparent md:text-green-900 md:p-0 md:dark:text-green-500">Services</a>
        </li>
        <li class="nav-item">
            <a href="location.php" class="nav-link  block py-2 pl-3 pr-4 text-white bg-gray-900 rounded md:bg-transparent md:text-green-900 md:p-0 md:dark:text-green-500">Wash Centers</a>
        </li>
        <li class="nav-item">
            <a href="login.php" class="nav-link block py-2 pl-3 pr-4 text-white bg-gray-900 rounded md:bg-transparent md:text-green-900 md:p-0 md:dark:text-green-500">Book</a>
        </li>
        <li class="nav-item">
            <a href="contact.php" class="nav-link block py-2 pl-3 pr-4 text-white bg-gray-900 rounded md:bg-transparent md:text-green-900 md:p-0 md:dark:text-green-500">Contact</a>
        </li>

        <li class="nav__profile relative">
            <div class="avatar">
                <img src="/img/avatar.png" alt="Avatar">
            </div>
            <ul>
                <li><a href="admin">Dashboard</a></li>
                <!--
                <li><a href="logout.php">Logout</a></li>
    -->
            </ul>
        </li>
    </ul>

    <script>
        // Open/Close mobile navigation
        document.getElementById('open__nav-btn').addEventListener('click', function() {
            var mobileNav = document.getElementById('mobile__nav');
            if (mobileNav.classList.contains('hidden')) {
                mobileNav.classList.remove('hidden');
            } else {
                mobileNav.classList.add('hidden');
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
</body>

</html>
















<!--



    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Responsive Menu Bar</title>
    <style>
        /* Custom styles for demonstration purposes */
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .nav__logo {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .nav__items {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            gap: 4rem;
        }

        .nav-item a {
            color: white;
            text-decoration: none;
        }

        .avatar {
            width: 2.5rem;
            aspect-ratio: 1/1;
            border-radius: 50%;
            overflow: hidden;
            border: 0.3rem solid var(--color-yellow);
        }

        .nav__profile {
            position: relative;
            cursor: pointer;
        }

        .nav__profile ul {
            position: absolute;
            top: 140%;
            right: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 0 3rem 3rem rgba(0, 0, 0, 0.4);
            visibility: hidden;
            opacity: 0;
            transition: var(--transition);
            background: var(--color-gray-900);
        }

        .nav__profile:hover>ul {
            visibility: visible;
            opacity: 1;
        }

        .nav__profile ul li a {
            display: block;
            padding: 1rem;
            width: 100%;
            color: white;
            text-decoration: none;
        }

        .nav__profile ul li:last-child a {
            background: var(--color-yellow);
            color: var(--color-bg);
        }

        #open__nav-btn {
            display: none;
        }

        @media (max-width: 640px) {
            .nav__items {
                display: none;
            }

            .nav__items--mobile {
                display: flex;
                gap: 10px;
                align-items: center;
            }

            #open__nav-btn {
                display: block;
            }

            .nav__profile ul {
                position: static;
                visibility: visible;
                opacity: 1;
                box-shadow: none;
                background: none;
                flex-direction: row;
                justify-content: flex-end;
                margin-top: 10px;
            }

            .nav__profile ul li {
                display: inline-block;
            }
        }
    </style>
</head>

<body>
    <nav class="bg-red-500">
        <div class="container mx-auto py-2 px-4 sm:px-10">
            <div class="nav__container">
                <a href="index.php" class="nav__logo">N-<span class="logo-color">aiz</span></a>

                <ul class="nav__items">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="services.php" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="location.php" class="nav-link">Wash Centers</a>
                    </li>
                    <li class="nav-item">
                        <a href="washing-plans.php" class="nav-link">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav__profile relative">
                        <div class="avatar">
                            <img src="/img/avatar.png" class="w-full h-full object-cover" alt="Avatar">
                        </div>
                        <ul>
                            <li><a href="dashboard.html" class="block py-2 px-4">Dashboard</a></li>
                            <li><a href="logout.html" class="block py-2 px-4 bg-yellow text-bg">Logout</a></li>
                        </ul>
                    </li>
                </ul>

                <button id="open__nav-btn"><i class="fas fa-bars text-white text-2xl"></i></button>
            </div>
        </div>

        <ul id="mobile__nav" class="hidden sm:hidden bg-red-500">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="services.php" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
                <a href="location.php" class="nav-link">Wash Centers</a>
            </li>
            <li class="nav-item">
                <a href="washing-plans.php" class="nav-link">Packages</a>
            </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link">Contact</a>
            </li>
            
        </ul>

        <script>
            // Toggle mobile navigation
            document.getElementById("open__nav-btn").addEventListener("click", function() {
                document.getElementById("mobile__nav").classList.toggle("hidden");
            });
        </script>
    </nav>
</body>

</html>

        -->





<!--

    <nav>
    <div class="container flex items-center justify-between py-2 px-20">
        <a href="index.php" class="nav__logo text-xl font-bold">N-<span class="logo-color">aiz</span></a>

        <ul class="nav__items flex items-center gap-10">
            <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="about.php" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="services.php" class="nav-link">Services</a>
            </li>
            <li class="nav-item">
                <a href="location.php" class="nav-link">Wash Centers</a>
            </li>
            <li class="nav-item">
                <a href="washing-plans.php" class="nav-link">Packages</a>
            </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link">Contact</a>
            </li>
            <li class="nav__profile relative">
                <div class="avatar">
                    <img src="/img/avatar.png" class="w-full h-full object-cover" alt="Avatar">
                </div>
                <ul class="absolute top-full right-0 hidden bg-gray-900 shadow opacity-0 transition-all duration-300">
                    <li><a href="dashboard.html" class="block py-2 px-4">Dashboard</a></li>
                    <li><a href="logout.html" class="block py-2 px-4 bg-yellow text-bg">Logout</a></li>
                </ul>
            </li>
        </ul>
        <button id="open__nav-btn"><i class="fa fa-navicon"></i></button>
        <button id="close__nav-btn"><i class="fa fa-close"></i></button>
    </div>
</nav>
        -->