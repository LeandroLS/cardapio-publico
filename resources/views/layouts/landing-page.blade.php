<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Cardápio Público
    </title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="description" content="Crie seu cardápio online e compartilhe com seus clientes via whatsapp, facebook">
    <link rel="canonical" href="https://cardapiopublico.com.br" />
    <meta property="og:title" content="CRIE SEU CARDÁPIO ONLINE E COMPARTILHE COM CLIENTES!" />
    <meta property="og:description" content="Crie seu cardápio online e compartilhe com seus clientes via whatsapp, facebook" />
    <link rel="icon" href="{{ url('favicon.jpg') }}">
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, #d53369 0%, #daae51 100%);
        }

    </style>
</head>

<body class="leading-normal tracking-normal text-white gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a href="{{route('homepage')}}"
                    class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl">
                    <svg class="h-8 fill-current inline" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="45.005px" height="45.005px"
                        viewBox="0 0 45.005 45.005" style="enable-background:new 0 0 45.005 45.005;"
                        xml:space="preserve">
                        <g>
                            <path d="M30.249,38.414l-7.399,2.664c-0.113,0.041-0.232,0.062-0.35,0.062s-0.237-0.021-0.35-0.062l-7.697-2.771
		c2.616-2.811,5.431-5.64,8.047-8.45C25.148,32.702,27.6,35.565,30.249,38.414z M44.562,4.052c-0.275-0.192-0.627-0.241-0.941-0.126
		L22.5,11.53L1.378,3.926C1.063,3.812,0.711,3.86,0.437,4.052C0.163,4.248,0,4.562,0,4.897v27.481c0,0.435,0.272,0.822,0.681,0.969
		l11.283,4.063c3.099-2.886,6.198-5.771,9.297-8.654c-0.977-1.049-1.953-2.101-2.93-3.148c-2.063,1.479-5.119,0.917-6.957-1.352
		c-1.976-2.395-3.682-6.674-2.031-8.427c1.753-1.652,6.034,0.056,8.427,2.031c2.269,1.839,2.832,4.893,1.352,6.956
		c1.062,0.989,2.315,1.944,3.378,2.935c0.996-0.928,1.796-1.818,2.791-2.743c-0.84-1.435-0.283-3.444,1.084-4.591
		c1.562-1.312,7.357-6.287,7.516-6.129c0.154,0.155-3.91,3.995-6.625,6.718l0.453,0.452c2.898-2.54,6.992-6.35,7.148-6.195
		c0.154,0.156-3.783,4.122-6.408,6.936l0.449,0.45c2.811-2.629,6.775-6.567,6.932-6.413c0.154,0.157-3.654,4.249-6.195,7.148
		l0.449,0.449c2.725-2.715,6.562-6.783,6.717-6.626c0.156,0.157-6.117,7.509-6.125,7.52c0-0.001,1.332-1.563-0.004-0.004
		c-1.275,1.493-3.182,1.945-4.59,1.084c-0.914,0.982-1.826,1.963-2.741,2.944c3.137,2.921,6.274,5.84,9.413,8.761l11.559-4.162
		c0.41-0.146,0.683-0.534,0.683-0.969V4.897C44.999,4.562,44.837,4.248,44.562,4.052z" />
                        </g>

                    </svg>

                    CARDÁPIO PÚBLICO
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <!-- <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-black font-bold no-underline">Active</a>
                    </li>
                    <li class="mr-3">
                    <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4">link</a>
                    </li>
                    <li class="mr-3">
                    <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4">link</a>
                    </li> -->
                </ul>
               
                @auth
                    <a href="{{ url('/cardapio') }}" id="navAction" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">{{ \Auth::user()->estabelecimento->nome}}</a>
                @else
                    <a href="{{route('entrar')}}" id="navAction"
                        class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                        Entrar
                    </a>
                @endif
            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    @yield('content')
    <footer class="bg-white">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 text-black">
                    <a class=" no-underline hover:no-underline font-bold text-2xl lg:text-4xl">
                        <!--Icon from: http://www.potlabicons.com/ -->

                        <svg class="h-8 fill-current inline" version="1.1" id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                            y="0px" width="45.005px" height="45.005px" viewBox="0 0 45.005 45.005"
                            style="enable-background:new 0 0 45.005 45.005;" xml:space="preserve">
                            <g>
                                <path d="M30.249,38.414l-7.399,2.664c-0.113,0.041-0.232,0.062-0.35,0.062s-0.237-0.021-0.35-0.062l-7.697-2.771
		c2.616-2.811,5.431-5.64,8.047-8.45C25.148,32.702,27.6,35.565,30.249,38.414z M44.562,4.052c-0.275-0.192-0.627-0.241-0.941-0.126
		L22.5,11.53L1.378,3.926C1.063,3.812,0.711,3.86,0.437,4.052C0.163,4.248,0,4.562,0,4.897v27.481c0,0.435,0.272,0.822,0.681,0.969
		l11.283,4.063c3.099-2.886,6.198-5.771,9.297-8.654c-0.977-1.049-1.953-2.101-2.93-3.148c-2.063,1.479-5.119,0.917-6.957-1.352
		c-1.976-2.395-3.682-6.674-2.031-8.427c1.753-1.652,6.034,0.056,8.427,2.031c2.269,1.839,2.832,4.893,1.352,6.956
		c1.062,0.989,2.315,1.944,3.378,2.935c0.996-0.928,1.796-1.818,2.791-2.743c-0.84-1.435-0.283-3.444,1.084-4.591
		c1.562-1.312,7.357-6.287,7.516-6.129c0.154,0.155-3.91,3.995-6.625,6.718l0.453,0.452c2.898-2.54,6.992-6.35,7.148-6.195
		c0.154,0.156-3.783,4.122-6.408,6.936l0.449,0.45c2.811-2.629,6.775-6.567,6.932-6.413c0.154,0.157-3.654,4.249-6.195,7.148
		l0.449,0.449c2.725-2.715,6.562-6.783,6.717-6.626c0.156,0.157-6.117,7.509-6.125,7.52c0-0.001,1.332-1.563-0.004-0.004
		c-1.275,1.493-3.182,1.945-4.59,1.084c-0.914,0.982-1.826,1.963-2.741,2.944c3.137,2.921,6.274,5.84,9.413,8.761l11.559-4.162
		c0.41-0.146,0.683-0.534,0.683-0.969V4.897C44.999,4.562,44.837,4.248,44.562,4.052z" />
                            </g>

                        </svg>

                        CARDÁPIO PÚBLICO
                    </a>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Links</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">cardapiopublico@cardapiopublico.com.br</a>
                        </li>
                        <!-- <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">Suporte</a>
                        </li> -->
                    </ul>
                </div>
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Legal</p>
                    <ul class="list-reset mb-6">
                        <!-- <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">Termos de uso</a>
                        </li> -->
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="{{ route('politica-privacidade') }}" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Política de Privacidade</a>
                        </li>
                    </ul>
                </div>
                <!-- <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Social</p>
                    <ul class="list-reset mb-6">
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
                    </li>
                    <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                        <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
                    </li>
                    </ul>
                    </div>
                    <div class="flex-1">
                        <p class="uppercase text-gray-500 md:mb-6">Company</p>
                        <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official Blog</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">About Us</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</a>
                        </li>
                        </ul>
                    </div> -->
            </div>
        </div>
        <a href="https://www.freepik.com/free-photos-vectors/background" class="text-gray-500">Background vector created
            by freepik - www.freepik.com</a>
    </footer>
</body>

</html>
<script>
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");
    var navaction = document.getElementById("navAction");
    var brandname = document.getElementById("brandname");
    var toToggle = document.querySelectorAll(".toggleColour");

    document.addEventListener("scroll", function () {
        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if (scrollpos > 10) {
            header.classList.add("bg-white");
            navaction.classList.remove("bg-white");
            navaction.classList.add("gradient");
            navaction.classList.remove("text-gray-800");
            navaction.classList.add("text-white");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-gray-800");
                toToggle[i].classList.remove("text-white");
            }
            header.classList.add("shadow");
            navcontent.classList.remove("bg-gray-100");
            navcontent.classList.add("bg-white");
        } else {
            header.classList.remove("bg-white");
            navaction.classList.remove("gradient");
            navaction.classList.add("bg-white");
            navaction.classList.remove("text-white");
            navaction.classList.add("text-gray-800");
            //Use to switch toggleColour colours
            for (var i = 0; i < toToggle.length; i++) {
                toToggle[i].classList.add("text-white");
                toToggle[i].classList.remove("text-gray-800");
            }

            header.classList.remove("shadow");
            navcontent.classList.remove("bg-white");
            navcontent.classList.add("bg-gray-100");
        }
    });

</script>
<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }
    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }

</script>
