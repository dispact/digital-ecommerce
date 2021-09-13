<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Digital Ecommerce</title>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <livewire:styles/>
   </head>
   <body>
      @if(!request()->route()->named('checkout.index'))
      <x-navbar/>
      @endif
      <div class="bg-white">
         {{ $slot }}
      </div>

      <livewire:scripts/>
   </body>
</html>

