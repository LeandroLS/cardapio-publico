
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Tailwind Starter Template - Landing Page Template: Tailwind Toolbox
    </title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
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
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a class="toggleColour text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
            <!--Icon from: http://www.potlabicons.com/ -->
            <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
              <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
              <path
                class="plane-take-off"
                d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
              />
            </svg>
            LANDING
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-3">
              <a class="inline-block py-2 px-4 text-black font-bold no-underline" href="#">Active</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">link</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-black no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#">link</a>
            </li>
          </ul>
          <button
            id="navAction"
            class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
          >
            Action
          </button>
        </div>
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    <!--Hero-->
    <div class="pt-24">
      <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-3/5 justify-center items-start text-center md:text-left">
          <h1 class="my-4 text-5xl font-bold leading-tight">
            Crie seu cardápio digital em poucos minutos!
          </h1>
          <p class="leading-normal text-2xl mb-8">
            Tenha seu cardápio digital inteiramente online de maneira rápida e fácil. Compartilhe o cardápio com seus clientes e facilite seus pedidos.
          </p>
          <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            Subscribe
          </button>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-2/5 py-6 ">
          <form method="POST" action="{{ route('register') }}" class="rounded p-2 bg-white opacity-75 border shadow text-black">
              <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $message) 
                  <li>{{ $message }}</li>
                @endforeach
              </ul>
              @csrf
              <div>
                  <label for="name" class="font-bold"> Seu Nome </label>
                  <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                  @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>

              <div class="mt-4">
                  <label for="email" class="font-bold"> E-mail </label>
                  <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
              </div>

              <div class="mt-4">
                  <label for="password" class="font-bold"> Senha </label>
                  <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
              </div>

              <div class="mt-4">
                  <label for="password_confirmation" class="font-bold" > Repita a senha <label/>
                  <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
              </div>

              <div class="flex items-center justify-end mt-4">
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">
                  Registrar
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <div class=" -mt-12 lg:-mt-24">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
    </div>
    <section class="bg-white border-b py-8">
      <div class="container max-w-5xl mx-auto m-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          Como funciona
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-5/6 sm:w-1/2 p-6">
            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
              Crie seu cardápio 100% digital
            </h3>
            <p class="text-gray-600 mb-8">
            Cadastre seus produtos e crie seu cadapio. É super fácil!
              <br />
              <br />
              <svg class="w-full sm:h-64 mx-auto" id="e6a8cd33-67c2-415a-8c26-3ee9526a2914" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="769.92356" height="727.77804" viewBox="0 0 769.92356 727.77804"><rect x="250.3669" y="723.94159" width="519.55666" height="2.24072" fill="#3f3d56"/><path d="M888.00011,428.99257a11.01956,11.01956,0,0,1-2.15469,16.2265l-53.77008,36.91677-23.677,15.78467a6.50932,6.50932,0,0,1-8.64865-1.29413h0a6.50932,6.50932,0,0,1,1.76937-9.75113l22.93281-13.31582L864.47515,435.442l-25.72926-27.63513,19.05871-14.294Z" transform="translate(-215.03822 -86.11098)" fill="#a0616a"/><polygon points="546.52 690.482 533.367 690.482 525.555 581.847 558.908 580.894 546.52 690.482" fill="#a0616a"/><path d="M762.51106,811.85147c-3.5071,1.60062-6.44475-11.36747-9.403-8.4603-8.27476,8.13174-20.94589,9.90248-31.99089,6.35216l3.86555-.04321a5.17261,5.17261,0,0,1-3.26034-6.74068h0a5.17263,5.17263,0,0,1,3.58872-3.20194l8.8002-2.2,13.81756-24.29985,14.10577-.95294h0a33.70033,33.70033,0,0,1,6.23289,28.749C766.98747,806.27826,765.01135,810.71036,762.51106,811.85147Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/><polygon points="634.096 690.482 620.943 690.482 613.131 581.847 647.437 575.177 634.096 690.482" fill="#a0616a"/><path d="M850.087,811.85147c-3.5071,1.60062-6.44476-11.36747-9.40305-8.4603-8.27475,8.13174-20.94589,9.90248-31.99089,6.35216l3.86555-.04321a5.17261,5.17261,0,0,1-3.26034-6.74068h0a5.17264,5.17264,0,0,1,3.58873-3.20194l8.80019-2.2,13.81757-24.29985,15.0587-1.90587.38035.622a38.82707,38.82707,0,0,1,4.1608,31.74873C853.85228,807.73507,852.14766,810.911,850.087,811.85147Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/><path d="M864.04754,395.97018c-12.09554,1.68292-20.4694,8.307-23.8799,21.521l-22.23309-41.05a12.15492,12.15492,0,0,1,3.87324-15.43663h0a12.15493,12.15493,0,0,1,16.51068,2.41678Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/><path d="M887.34559,656.523C833.28768,680.4412,777.965,683.38434,721.53484,667.95823c20.60644-79.92158,44.93779-152.18824,44.788-211.55165l55.27025-4.76467,8.50989,13.49128A299.3077,299.3077,0,0,1,871.1746,569.89266Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/><circle cx="581.77851" cy="218.77888" r="28.58806" fill="#a0616a"/><polygon points="613.225 269.284 577.967 271.19 572.249 239.743 600.837 234.979 613.225 269.284" fill="#a0616a"/><path d="M824.45186,456.40658l-38.62727,1.0881-19.50179,2.72364c-9.57274-31.62118-17.63171-63.16988,1.90587-89.57592L791.09912,347.772l34.30568-.95293.45443.25967a27.62567,27.62567,0,0,1,12.657,32.13956C830.003,406.88285,824.53468,433.007,824.45186,456.40658Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/><path d="M765.36987,545.02957l-2.39609,32.74648a7.29408,7.29408,0,0,1-6.78945,6.74565h0a7.29408,7.29408,0,0,1-7.77722-7.45156l.76287-32.04057,23.82338-90.52886.95294-55.27025,26.68219-.95293-1.90587,63.84667Z" transform="translate(-215.03822 -86.11098)" fill="#a0616a"/><path d="M803.48728,403.0422c-11.31253-4.6001-21.8779-3.05952-31.44686,6.67055l1.31094-46.66577a12.15493,12.15493,0,0,1,11.08252-11.42232h0a12.15493,12.15493,0,0,1,13.08133,10.35965Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/><path d="M857.32813,432.10673h-87.67c20.45167-54.1569,27.04681-104.53868,0-147.705.46431-12.96516,17.09344-24.20477,30.00735-22.96305h0c15.25177,1.46651,35.74679,12.67435,38.60394,27.72772Z" transform="translate(-215.03822 -86.11098)" fill="#2f2e41"/><path d="M577.92754,259.05823h-3.99878V149.51291A63.40186,63.40186,0,0,0,510.52671,86.111H278.44027a63.40186,63.40186,0,0,0-63.402,63.40193V750.48709A63.40186,63.40186,0,0,0,278.44027,813.889H510.52671a63.40186,63.40186,0,0,0,63.40205-63.40193V337.03445h3.99878Z" transform="translate(-215.03822 -86.11098)" fill="#3f3d56"/><path d="M513.085,102.606h-30.295a22.49485,22.49485,0,0,1-20.82715,30.99055H329.00345A22.49483,22.49483,0,0,1,308.1763,102.606H279.88073a47.3478,47.3478,0,0,0-47.34786,47.34774V750.04623a47.34781,47.34781,0,0,0,47.34786,47.3478H513.085a47.34781,47.34781,0,0,0,47.34787-47.3478V149.95371A47.3478,47.3478,0,0,0,513.085,102.606Z" transform="translate(-215.03822 -86.11098)" fill="#fff"/><rect x="58.44466" y="110.2337" width="246" height="211" fill="#e6e6e6"/><circle cx="131.44466" cy="347.2337" r="18" fill="#6c63ff"/><polygon points="140.445 345.734 132.945 345.734 132.945 338.234 129.945 338.234 129.945 345.734 122.445 345.734 122.445 348.734 129.945 348.734 129.945 356.234 132.945 356.234 132.945 348.734 140.445 348.734 140.445 345.734" fill="#fff"/><circle cx="226.44466" cy="347.2337" r="18" fill="#6c63ff"/><rect x="439.98288" y="424.34468" width="3" height="18" transform="translate(659.78934 -94.24918) rotate(90)" fill="#fff"/><path d="M405.6577,222.65953H386.2175a2.57738,2.57738,0,0,0-2.57738,2.57738v8.53288a2.57738,2.57738,0,0,0,2.57738,2.57738H389.439v12.78518h12.99715V236.34717h3.22152a2.57738,2.57738,0,0,0,2.57738-2.57738v-8.53288A2.57738,2.57738,0,0,0,405.6577,222.65953Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/><path d="M425.12915,300.75246a99.945,99.945,0,0,1-17.38745-59.25632,2.10788,2.10788,0,0,0-1.64531-2.10349v-3.687H385.56494v3.63579h-.2829a2.1067,2.1067,0,0,0-2.104,2.10944q.00009.07676.00578.15334,2.42627,33.82122-16.3857,60.66044a5.80592,5.80592,0,0,0-1.05076,3.51846l2.245,69.4446a6.01162,6.01162,0,0,0,5.96021,5.80216h46.439a6.01372,6.01372,0,0,0,5.9638-5.90449l.86514-67.425A12.16847,12.16847,0,0,0,425.12915,300.75246Z" transform="translate(-215.03822 -86.11098)" fill="#3f3d56"/><path d="M401.60513,225.43986a5.5606,5.5606,0,1,1-11.1212,0" transform="translate(-215.03822 -86.11098)" opacity="0.2" style="isolation:isolate"/><path d="M417.77775,323.81976h-5.62341a14.75938,14.75938,0,0,0-29.17437,0h-5.62378a4.15,4.15,0,0,0-4.10174,4.781l6.10828,39.70382H414.4373l7.41937-39.57005a4.15007,4.15007,0,0,0-4.07892-4.9148Z" transform="translate(-215.03822 -86.11098)" fill="#6c63ff"/><rect x="58.44466" y="407.2337" width="246" height="211" fill="#e6e6e6"/><circle cx="131.44466" cy="644.2337" r="18" fill="#6c63ff"/><polygon points="140.445 642.734 132.945 642.734 132.945 635.234 129.945 635.234 129.945 642.734 122.445 642.734 122.445 645.734 129.945 645.734 129.945 653.234 132.945 653.234 132.945 645.734 140.445 645.734 140.445 642.734" fill="#fff"/><circle cx="226.44466" cy="644.2337" r="18" fill="#6c63ff"/><rect x="439.98288" y="721.34468" width="3" height="18" transform="translate(956.78934 202.75082) rotate(90)" fill="#fff"/><path d="M444.91088,643.24243l.1358.0001a23.0403,23.0403,0,0,0,21.57285-14.45016A75.41617,75.41617,0,1,0,366.154,670.10246a22.84324,22.84324,0,0,0,25.37-4.7044A75.16747,75.16747,0,0,1,444.91088,643.24243Z" transform="translate(-215.03822 -86.11098)" fill="#fff"/><circle cx="191.13" cy="509.39493" r="24.906" fill="#f9a825"/></svg>
            </p>
          </div>
          <div class="w-full sm:w-1/2 p-6">
            <div class="align-middle">
                <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                  Compartilhe com seus clientes
                </h3>
                <p class="text-gray-600 mb-8">
                  Os clientes podem acessar o cardápio online ou utilizando a camera do seu celular e lendo o QR-Code. 
                  <br />
                  <br />
                 <svg class="w-full sm:h-64 mx-auto" id="ba0517ec-fec1-49ce-b646-53a5b94e2df0" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="1121" height="867.01056" viewBox="0 0 1121 867.01056"><title>connection</title><path d="M594.5,715.12135a306.99915,306.99915,0,1,1,217.082-89.918A304.99057,304.99057,0,0,1,594.5,715.12135Zm0-612c-168.17773,0-305,136.82226-305,305s136.82227,305,305,305,305-136.82227,305-305S762.67773,103.12135,594.5,103.12135Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><path d="M620.35913,681.22121c-5.68507,21.01543-25.15771,34.03081-25.15771,34.03081s-10.25532-21.05736-4.57026-42.07279,25.15772-34.03081,25.15772-34.03081S626.0442,660.20578,620.35913,681.22121Z" transform="translate(-39.5 -16.49472)" fill="#6c63ff"/><path d="M568.64087,681.22121c5.68507,21.01543,25.15771,34.03081,25.15771,34.03081s10.25532-21.05736,4.57026-42.07279-25.15772-34.03081-25.15772-34.03081S562.9558,660.20578,568.64087,681.22121Z" transform="translate(-39.5 -16.49472)" fill="#6c63ff"/><path d="M576.99467,676.70477C592.59458,691.89065,594.5,715.23489,594.5,715.23489s-23.387-1.27694-38.98695-16.46283-17.50532-38.53012-17.50532-38.53012S561.39476,661.51888,576.99467,676.70477Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><path d="M612.00533,676.70477C596.40542,691.89065,594.5,715.23489,594.5,715.23489s23.387-1.27694,38.98695-16.46283,17.50532-38.53012,17.50532-38.53012S627.60524,661.51888,612.00533,676.70477Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><path d="M568.64087,136.17923c5.68507-21.01542,25.15771-34.03081,25.15771-34.03081s10.25532,21.05736,4.57026,42.07279S573.21112,178.252,573.21112,178.252,562.9558,157.19466,568.64087,136.17923Z" transform="translate(-39.5 -16.49472)" fill="#6c63ff"/><path d="M620.35913,136.17923c-5.68507-21.01542-25.15771-34.03081-25.15771-34.03081s-10.25532,21.05736-4.57026,42.07279S615.78888,178.252,615.78888,178.252,626.0442,157.19466,620.35913,136.17923Z" transform="translate(-39.5 -16.49472)" fill="#6c63ff"/><path d="M612.00533,140.69568C596.40542,125.50979,594.5,102.16556,594.5,102.16556s23.387,1.27694,38.98695,16.46282,17.50532,38.53012,17.50532,38.53012S627.60524,155.88156,612.00533,140.69568Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><path d="M576.99467,140.69568C592.59458,125.50979,594.5,102.16556,594.5,102.16556s-23.387,1.27694-38.98695,16.46282-17.50532,38.53012-17.50532,38.53012S561.39476,155.88156,576.99467,140.69568Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><rect x="14.62796" y="12.67681" width="397.45533" height="404.16658" fill="#6c63ff"/><polygon points="397.065 22.935 43.003 22.935 22.935 22.935 22.935 44.437 22.935 401.365 43.003 401.365 43.003 44.437 397.065 44.437 397.065 22.935" fill="#3f3d56"/><polygon points="397.065 22.935 43.003 22.935 22.935 22.935 22.935 44.437 22.935 401.365 43.003 401.365 43.003 44.437 397.065 44.437 397.065 22.935" opacity="0.3"/><polygon points="339.727 44.437 323.959 44.437 43.003 44.437 43.003 96.041 323.959 96.041 323.959 401.365 397.065 401.365 397.065 44.437 339.727 44.437" opacity="0.1"/><path d="M39.5,16.49472V440.79506h420V16.49472ZM436.56485,417.85991H62.43515v-378.43h374.1297Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><path d="M334.24988,456.438s18.99179,36.79659,29.67467,45.1055-17.21131,18.39829-17.21131,18.39829L314.07111,468.9014Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M219.11217,366.82054s88.43051,23.14624,96.14592,38.57707,31.45515,52.82091,31.45515,52.82091l-35.01611,27.89419-34.42261-51.63392-94.95894-42.73153Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><path d="M343.74578,505.1045s-8.30891-7.12192-10.68288-2.374-9.4959,29.08117-9.4959,29.08117,10.08939,9.4959,30.86166,3.561c0,0,5.34144-4.15445,13.65034,0s39.17057-4.15445,37.98358-17.8048-32.64213-12.46336-32.64213-12.46336-13.24872-14.84313-14.93327-9.202.68942,6.23457.68942,6.23457S348.49372,513.41341,343.74578,505.1045Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><path d="M242.25841,492.64114l-5.93494,49.85344h29.08118s-2.374-38.57707-1.78048-43.325S242.25841,492.64114,242.25841,492.64114Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M258.87622,382.84486s16.02432,23.73974,6.52843,25.52022-17.21131-25.52022-17.21131-25.52022Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M137.80357,380.47089s-11.86986,35.01611,35.01611,44.512S233.9495,442.1942,233.9495,442.1942l5.93493,60.53633,40.95105,2.374s19.58528-91.99147-5.93494-103.86134-79.52811-25.52022-79.52811-25.52022Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><path d="M239.88443,534.77917s8.30891-4.15445,9.4959-4.15445c0,0,5.21664-12.03225,14.77493-10.76407L284.98993,550.21s31.45515,22.55275,9.4959,28.48768-39.17057,1.187-39.17057,1.187l-8.9024-6.52843s1.187-6.52843-6.52843-5.34144c0,0-16.02432-6.52843-15.43082-11.27638s13.19974-25.4148,13.19974-25.4148Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><circle cx="205.42913" cy="224.80197" r="23.73974" fill="#a0616a"/><path d="M225.64059,233.878s-21.36576,15.43082-25.52021,16.02432S219.70566,279.577,219.70566,279.577s11.27637-18.3983,18.39829-20.77227S225.64059,233.878,225.64059,233.878Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M209.61627,253.46331s-8.9024-11.86987-14.24384-11.86987-53.4144,5.34144-57.56886,45.1055-1.78048,109.20278-1.78048,109.20278-3.561-17.21131,36.2031-10.08939c0,0,47.47947-10.08939,55.78838-10.08939s11.86986-84.86955,11.86986-84.86955l-13.51315-20.95128S220.29915,281.3575,209.61627,253.46331Z" transform="translate(-39.5 -16.49472)" fill="#d0cde1"/><path d="M230.982,286.10544l8.9024,4.748,10.68289,65.28427,14.83733,33.82912s-16.02432-5.51658-17.21131,1.09942l-23.73973-34.335Z" transform="translate(-39.5 -16.49472)" fill="#d0cde1"/><path d="M239.59174,221.82742l12.915,1.61329c-.24655,2.62817-.178,5.884,2.15065,7.1272,1.09473.58442,2.48381.55455,3.45411,1.32819,2.33365,1.86066.05094,5.86193,1.36849,8.54l3.77724.99943a7.301,7.301,0,0,0,9.9214,2.97569c2.53815-1.52411,3.83157-4.43606,4.9736-7.16752,1.36444-3.26337,2.7569-6.76947,2.07391-10.24-.73377-3.72863-3.78-6.82731-3.91826-10.625-.06184-1.69888.29692-3.81688-1.13523-4.73284a6.05456,6.05456,0,0,0-2.09426-.55583c-3.29945-.689-5.13658-4.10389-7.59715-6.40753-5.15647-4.82762-13.07516-4.70086-20.12625-4.27983a17.87605,17.87605,0,0,0-5.9229,1.03247,17.2568,17.2568,0,0,0-5.5802,4.44971c-3.78142,4.03316-7.463,8.25742-9.95751,13.19127s-3.72344,10.69847-2.36767,16.05827c-.13352-.51575,4.35452-3.89049,4.913-4.4313,1.7541-1.6986,1.91373-2.50975,2.86291-4.46416C231.51529,221.683,234.59209,221.20289,239.59174,221.82742Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><polygon points="162.104 281.777 163.885 323.322 190.284 354.281 166.259 319.761 162.104 281.777" opacity="0.1"/><polygon points="114.625 293.054 135.397 341.127 162.104 363.086 133.616 343.501 114.625 293.054" opacity="0.1"/><path d="M266.95753,348.51327l12.55128,8.63375a3.46577,3.46577,0,0,1,.95894,4.264l-1.67865,3.46413.38873.26739-1.90741,3.93622-.38872-.26739-13.82528,28.53037a2.67692,2.67692,0,0,1-3.9831,1.27159l-11.79513-8.11366a3.98493,3.98493,0,0,1-1.10259-4.90268L263.631,349.57527A2.23567,2.23567,0,0,1,266.95753,348.51327Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><polygon points="207.976 368.787 221.485 378.08 239.108 341.713 225.598 332.42 207.976 368.787" fill="#fff"/><path d="M241.61036,377.27649s23.54176,16.31379,15.33769,21.41628-25.29356-17.5427-25.29356-17.5427Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M171.6327,256.43077s-30.86166,8.9024-21.95926,36.2031c2.14748,6.58562,4.74393,13.65473,7.44776,20.59085,8.50493,21.81761,18.07246,42.31945,18.07246,42.31945L202.019,379.79885,238.104,389.96678l4.15446-3.561s1.187-11.27637-4.15446-12.46336-13.65034-5.93493-13.65034-5.93493l-21.36577-31.45515S202.49435,258.21125,171.6327,256.43077Z" transform="translate(-39.5 -16.49472)" fill="#d0cde1"/><rect x="758.22822" y="329.36149" width="387.99211" height="394.54357" transform="translate(1864.94854 1036.77183) rotate(-180)" fill="#6c63ff"/><polygon points="733.389 322.881 1079.02 322.881 1098.611 322.881 1098.611 343.871 1098.611 692.301 1079.02 692.301 1079.02 343.871 733.389 343.871 733.389 322.881" fill="#3f3d56"/><polygon points="733.389 322.881 1079.02 322.881 1098.611 322.881 1098.611 343.871 1098.611 692.301 1079.02 692.301 1079.02 343.871 733.389 343.871 733.389 322.881" opacity="0.3"/><polygon points="789.362 343.871 804.754 343.871 1079.02 343.871 1079.02 394.246 804.754 394.246 804.754 692.301 733.389 692.301 733.389 343.871 789.362 343.871" opacity="0.1"/><path d="M750.5,316.98651V731.18446h410V316.98651Zm22.38908,22.38908h365.22184V708.79538H772.88908Z" transform="translate(-39.5 -16.49472)" fill="#3f3d56"/><path d="M990.07473,512.2639c-8.8288-14.91793-26.29587-15.61318-26.29587-15.61318s-17.02066-2.17658-27.93931,20.54362c-10.17705,21.17709-24.22268,41.624-2.26123,46.58141l3.96687-12.34669,2.45667,13.26589a85.92932,85.92932,0,0,0,9.39649.16059c23.51893-.75933,45.91717.22216,45.196-8.21742C993.63563,545.41888,998.56981,526.61794,990.07473,512.2639Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><polygon points="886.939 616.17 885.081 649.604 939.565 655.176 941.423 620.504 922.848 608.741 886.939 616.17" fill="#a0616a"/><path d="M1072.86447,706.03279c-1.63392-15.7945-66.49972-22.964-82.08861-24.461l-5.82886-3.40019-1.85741-19.81239s-57.57975-4.9531-61.91371-5.57223-8.04879,7.42964-8.04879,9.28705c0,1.34239-.81,10.92858-4.06293,16.61044-7.02474,5.64464-28.44177,23.40538-28.44177,30.13442,0,8.04878,17.02628,109.2777,17.02628,109.2777l1.85741,21.05066,17.33584,3.09569-1.23828-65.62854s6.19137-37.76736-2.47655-48.29269v-4.334s25.42321-6.62361,34.38343-13.83544c2.5963-.55792,9.89244-1.93242,13.922-.73707.55259.3254,1.18976.65961,1.898.99959a2.89531,2.89531,0,0,1,.25625.26147l.06991-.107c11.59106,5.42531,41.32521,12.26843,53.48545,10.32278a42.5575,42.5575,0,0,1,27.242,4.9531c-6.8105,8.66792-1.85741,33.4334-1.85741,33.4334l.61914,53.2458,8.66792,10.52533h11.7636V793.95026S1074.72188,723.98777,1072.86447,706.03279Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><circle cx="918.8241" cy="516.17968" r="20.43153" fill="#a0616a"/><path d="M945.94136,545.67627s3.09569,13.621-1.23827,14.85929a58.59449,58.59449,0,0,0-9.9062,4.334l-4.95309,16.09757v16.09757l60.0563,6.8105,1.85741-5.57223v-8.04878L984.947,577.8714l-3.09569-3.09568s-13.621-14.85929-10.52533-29.09945Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M999.49672,594.89768s1.85741,21.66979,0,31.576-1.23827,24.76548-1.23827,24.76548l-13.621-2.47654V615.3292l3.09569-17.955Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><circle cx="926.41665" cy="480.23157" r="12.62965" fill="#2f2e41"/><path d="M951.95757,493.40269A12.63014,12.63014,0,0,1,963.25778,480.844a12.758,12.758,0,0,0-1.32944-.071,12.62965,12.62965,0,0,0,0,25.2593,12.758,12.758,0,0,0,1.32944-.071A12.63013,12.63013,0,0,1,951.95757,493.40269Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/><polygon points="946.671 494.331 929.415 485.292 905.584 488.99 900.654 510.766 912.927 510.294 916.356 502.294 916.356 510.162 922.019 509.944 925.306 497.207 927.36 510.766 947.493 510.355 946.671 494.331" fill="#2f2e41"/><path d="M915.87868,818.35567s8.78562,4.13441,11.36962,5.68481,12.92-1.5504,10.85281,7.752-10.85281,18.088-10.85281,18.088-4.13441,4.6512-4.13441,7.752-10.336,26.87363-22.73923,25.84-10.336-13.43682-10.336-13.43682l2.584-13.43682s5.168-22.73923,6.20161-22.22242,3.61761,4.1344,3.61761,4.1344S915.36188,833.34289,915.87868,818.35567Z" transform="translate(-39.5 -16.49472)" fill="#d0cde1"/><path d="M1044.72826,802.87725s-8.78561,4.1344-11.36962,5.6848-12.92-1.5504-10.85281,7.752,10.85281,18.088,10.85281,18.088,4.13441,4.6512,4.13441,7.752,10.336,26.87363,22.73923,25.84,10.336-13.43682,10.336-13.43682l-2.584-13.43681s-5.168-22.73923-6.20161-22.22243-3.6176,4.1344-3.6176,4.1344S1045.24506,817.86447,1044.72826,802.87725Z" transform="translate(-39.5 -16.49472)" fill="#d0cde1"/><path d="M976.61026,655.56968v-4.9136h-1.09191v-2.18382a3.82168,3.82168,0,0,0-3.82168-3.82169H958.59375a3.82169,3.82169,0,0,0-3.82169,3.82169v36.579a3.8217,3.8217,0,0,0,3.82169,3.82169h13.10292a3.8217,3.8217,0,0,0,3.82168-3.82169V662.12114h1.09191v-4.9136h-1.09191v-1.63786Z" transform="translate(-39.5 -16.49472)" fill="#d0cde1"/><circle cx="926.19116" cy="639.07496" r="2.18382" fill="#3f3d56"/><path d="M910.96011,584.37234l-11.14446,45.81615s-4.334,9.9062,5.57223,16.09757S937.583,660.52621,937.583,660.52621s19.81239,27.242,22.28894,16.09757-14.85929-25.38463-14.85929-25.38463L914.67494,632.0459l11.7636-32.19513Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M991.44794,641.9521s9.28706-1.23828,8.66792,9.28705S987.114,663.00276,987.114,663.00276,981.54175,686.53,973.493,682.196s4.334-27.86117,4.334-27.86117l10.52533-8.04878Z" transform="translate(-39.5 -16.49472)" fill="#a0616a"/><path d="M931.70121,580.348l9.90619-20.43152L921.795,566.72694s-11.14447,5.57223-11.7636,18.57411,14.24015,19.81239,14.24015,19.81239,2.47655,18.57411,1.23828,21.05066,0,12.38274,0,12.38274,23.83678-6.50094,35.60038,1.54785,21.36023,3.40525,21.36023,3.40525-.61914-15.47843,4.334-17.955,9.28706-14.24015,4.9531-21.6698c0,0,9.90619,1.23828,9.28706-8.04878s-5.57224-17.33584-13.621-21.05066-8.93854-4.30835-8.93854-4.30835l11.41509,21.02505v5.57224s-20.20795-12.89869-40.20092-13.97359a26.62961,26.62961,0,0,0-17.9976,5.9245l-.00037.0003Z" transform="translate(-39.5 -16.49472)" fill="#2f2e41"/></svg>
                </p>
              </div>
          </div>
        </div>
        <div class="flex flex-wrap flex-col-reverse sm:flex-row">
          <div class="w-full sm:w-1/2 p-6 mt-6">
            
          </div>
          <div class="w-full sm:w-1/2 p-6 mt-6">
            
          </div>
        </div>
      </div>
    </section>
    <section class="bg-white border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          Vantagens
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
              <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                xGETTING STARTED
              </p>
              <div class="w-full font-bold text-xl text-gray-800 px-6">
                Prevenção ao Covid
              </div>
              <p class="text-gray-800 text-base px-6 mb-5">
                Sem toques, os Clientes acessam o menu do próprio celular.
              </p>
            </a>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
              <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                xGETTING STARTED
              </p>
              <div class="w-full font-bold text-xl text-gray-800 px-6">
                Fácil
              </div>
              <p class="text-gray-800 text-base px-6 mb-5">
                Crie seu cardápio e torne-o disponível agora mesmo
              </p>
            </a>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
              <p class="w-full text-gray-600 text-xs md:text-sm px-6">
                xGETTING STARTED
              </p>
              <div class="w-full font-bold text-xl text-gray-800 px-6">
                Econômico
              </div>
              <p class="text-gray-800 text-base px-6 mb-5">
                Você mesmo cria seu cardápio sem necessidade de um profissional.
              </p>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="bg-gray-100 py-8">
      <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          Pricing
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
          <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
            <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
              <div class="p-8 text-3xl font-bold text-center border-b-4">
                Free
              </div>
              <ul class="w-full text-center text-sm">
                <li class="border-b py-4">Thing</li>
                <li class="border-b py-4">Thing</li>
                <li class="border-b py-4">Thing</li>
              </ul>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                £0
                <span class="text-base">for one user</span>
              </div>
              <div class="flex items-center justify-center">
                <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Sign Up
                </button>
              </div>
            </div>
          </div>
          <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-4 sm:-mt-6 shadow-lg z-10">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <div class="w-full p-8 text-3xl font-bold text-center">Basic</div>
              <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
              <ul class="w-full text-center text-base font-bold">
                <li class="border-b py-4">Thing</li>
                <li class="border-b py-4">Thing</li>
                <li class="border-b py-4">Thing</li>
                <li class="border-b py-4">Thing</li>
              </ul>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-4xl font-bold text-center">
                £x.99
                <span class="text-base">/ per user</span>
              </div>
              <div class="flex items-center justify-center">
                <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Sign Up
                </button>
              </div>
            </div>
          </div>
          <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
            <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
              <div class="p-8 text-3xl font-bold text-center border-b-4">
                Pro
              </div>
              <ul class="w-full text-center text-sm">
                <li class="border-b py-4">Thing</li>
                <li class="border-b py-4">Thing</li>
                <li class="border-b py-4">Thing</li>
              </ul>
            </div>
            <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow p-6">
              <div class="w-full pt-6 text-3xl text-gray-600 font-bold text-center">
                £x.99
                <span class="text-base">/ per user</span>
              </div>
              <div class="flex items-center justify-center">
                <button class="mx-auto lg:mx-0 hover:underline gradient text-white font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Sign Up
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
          <g class="wave" fill="#f8fafc">
            <path
              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
            ></path>
          </g>
          <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
            <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
              <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"
              ></path>
              <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
            </g>
          </g>
        </g>
      </g>
    </svg>
    <section class="container mx-auto text-center py-6 mb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-white">
        Call to Action
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>
      <h3 class="my-4 text-3xl leading-tight">
        Main Hero Message to sell yourself!
      </h3>
      <button class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
        Action!
      </button>
    </section>
    <!--Footer-->
    <footer class="bg-white">
      <div class="container mx-auto px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
          <div class="flex-1 mb-6 text-black">
            <a class="text-pink-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
              <!--Icon from: http://www.potlabicons.com/ -->
              <svg class="h-8 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.005 512.005">
                <rect fill="#2a2a31" x="16.539" y="425.626" width="479.767" height="50.502" transform="matrix(1,0,0,1,0,0)" />
                <path
                  class="plane-take-off"
                  d=" M 510.7 189.151 C 505.271 168.95 484.565 156.956 464.365 162.385 L 330.156 198.367 L 155.924 35.878 L 107.19 49.008 L 211.729 230.183 L 86.232 263.767 L 36.614 224.754 L 0 234.603 L 45.957 314.27 L 65.274 347.727 L 105.802 336.869 L 240.011 300.886 L 349.726 271.469 L 483.935 235.486 C 504.134 230.057 516.129 209.352 510.7 189.151 Z "
                />
              </svg>
              LANDING
            </a>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Links</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">FAQ</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Help</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Support</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Legal</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Terms</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Privacy</a>
              </li>
            </ul>
          </div>
          <!-- <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Social</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Facebook</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Linkedin</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Twitter</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">Company</p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Official Blog</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">About Us</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline hover:underline text-gray-800 hover:text-pink-500">Contact</a>
              </li>
            </ul>
          </div> -->
        </div>
      </div>
      <a href="https://www.freepik.com/free-photos-vectors/background" class="text-gray-500">Background vector created by freepik - www.freepik.com</a>
    </footer>
    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
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
  </body>
</html>
