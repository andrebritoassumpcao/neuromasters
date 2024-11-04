   <link rel="stylesheet" type="text/css" href="{{ asset('css/home/style.css') }}">
   <title>Neuromasters</title>


   <x-layouts.app>
       <x-main.header-app></x-main.header-app>
       <section class="main-container">
           <div class="banner-1">
               <x-sign-button url="tea-app" style="width: 180px;  margin: 20px 20px;">
                   Nossos Produtos
               </x-sign-button>
           </div>
           <x-main-product></x-main-product>
       </section>
       <x-footer-component></x-footer-component>
   </x-layouts.app>
