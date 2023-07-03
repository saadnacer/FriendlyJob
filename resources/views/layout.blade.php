<!doctype html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen flex-grow">
    <header class="bg-white shadow">
        <nav class="flex justify-between items-center w-[92%] mx-auto">
            <div>
                <img class="w-32 cursor-pointer" src="/assets/img/logo/logo.png" alt="...">
            </div>
            <div class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5 z-50">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 ">
                    <li>
                        <a class="hover:text-gray-500" href="/">Accueil</a>
                    </li>
                    <div class="p-0">
                        <div class="dropdown inline-block relative">
                            <a href="/service/service" class="dropdown inline-block relative">
                                <button class="py-2 px-2 rounded inline-flex items-center">
                                    <span class="mr-1">Services</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <ul class="dropdown-menu rounded absolute hidden text-black-500 pt-1 bg-black">
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Aide a la personne</a></li>
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Covoiturage</a></li>
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Demenagement</a></li>
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Garde d'animaux</a></li>
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Jardinage</a></li>
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Bricolage</a></li>
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Informatique</a></li>
                                    <li><a class="rounded-t text-white font-semibold hover:bg-gray-400 py-1 px-4 block whitespace-no-wrap" href="#">Babysitting</a></li>
                                </ul>
                            </a>
                        </div>
                    </div>
                    <div class="p-0">
                        <div class="dropdown inline-block relative">
                            <button class="py-2 px-4 rounded inline-flex items-center">
                                <span class="mr-1">Nous rejoindre</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu rounded absolute hidden text-white pt-1 bg-black">
                                <li class=""><a class="font-semibold rounded-t hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/inscription/">Prestataire</a></li>
                                <li class=""><a class="font-semibold hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="/friendlyuser/ajouter">Client</a></li>
                            </ul>
                        </div>
                    </div>
                    <li><a href="/inscription/listejobworker">Admin</a></li>
                    <li>
                        <a class="hover:text-gray-500" href="#">A propos</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-6">
                <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]">Sign in</button>
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>
        </nav>
    </header>
    <section class="h-screen">
        @yield('content')
    </section>
    <footer class="fixed bottom-0 left-0 right-0 w-full mt-5">
        <div class="flex justify-center items-center h-16 bg-black text-white shadow">
            <p>Cpyright</p>
        </div>
    </footer>


    <script src="/assets/js/burgermenu.js"></script>
    <script src="/assets/js/slider.js"></script>
</body>

</html>