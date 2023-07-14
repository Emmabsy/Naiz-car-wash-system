    <div class="service">

        <div class="container bg-white ">
            <p class="service-description text-center">What We Do?</p>
            <h2 class="text-3xl font-bold mb-5 text-center">Premium Washing Services</h2>
            <div class="accordion py-2 ">
                <h2 id="accordion-example-heading-1">
                    <button type="button" class=" accordion flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl  dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" aria-expanded="false" aria-controls="accordion-example-body-1" onclick="toggleAccordion('accordion-example-body-1')">
                        <span>Exterior Washing + </span>
                        <svg id="accordion-example-icon-1" class="w-6 h-6 rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-example-body-1" class="hidden bg-blue-100 p-5 mt-0">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 transition duration-500 bg-blue-100 cursor-pointer p-8 border-solid border-l-8 border-blue-900 rounded-md hver:bg-indigo-400">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Details about Exterior Washing...........</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">More Details about Exterior Washing..................</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Even more details about Exterior Washing.................</p>
                    </div>
                </div>
                <h2 id="accordion-example-heading-2">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" aria-expanded="false" aria-controls="accordion-example-body-2" onclick="toggleAccordion('accordion-example-body-2')">
                        <span>Interior Washing + </span>
                        <svg id="accordion-example-icon-2" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-example-body-2" class="hidden bg-blue-100 p-5 mt-0">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 transition duration-500 bg-blue-100 cursor-pointer p-8 border-solid border-l-8 border-blue-900 rounded-md hver:bg-indigo-400">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Details about interior washing...</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">More details about interior washing...</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Even more details about interior washing...</p>
                    </div>
                </div>
                <h2 id="accordion-example-heading-3 ">
                    <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" aria-expanded="false" aria-controls="accordion-example-body-3" onclick="toggleAccordion('accordion-example-body-3')">
                        <span>Vacuum Cleaning + </span>
                        <svg id="accordion-example-icon-3" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-example-body-3" class="hidden bg-blue-100 p-5 mt-0">
                    <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 transition duration-500 bg-blue-100 cursor-pointer p-8 border-solid border-l-8 border-blue-900 rounded-md hver:bg-indigo-400">
                        <p class=" mb-2 text-gray-500 dark:text-gray-400">Details about vacuum cleaning...</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">More details about vacuum cleaning...</p>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Even more details about vacuum cleaning...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function toggleAccordion(id) {
            const accordionBody = document.getElementById(id);
            const accordionIcon = document.getElementById(`accordion-example-icon-${id.charAt(id.length - 1)}`);

            accordionBody.classList.toggle('hidden');
            accordionIcon.classList.toggle('rotate-180');
        }
    </script>