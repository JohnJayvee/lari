<!DOCTYPE html>
<html lang="en" >
    <head>
        @include('templates.meta')
    </head>
    <body class="antialiased">
        @include('templates.loader')    {{-- Main Loader --}}
        @include('modals.message_boxes')  {{-- message box  --}}
        @include('modals.toast') {{-- Toast modal  --}}
            <div class="layout-page">
                <div class="layout-wrapper layout-content-navbar  ">
                    <div class="layout-container">
                        @include('templates.navbar.navbar')
                            <div class="layout-page main-page">
                                @include('templates.menu.menu')   
                                @yield('contents')
                            </div>
                    </div>
                </div>
            </div>

        @include('script.masterscript')  
    </body>
    <script src="https://cdn.socket.io/4.7.5/socket.io.min.js" integrity="sha384-2huaZvOR9iDzHqslqwpR87isEmrfxqyWOF7hr7BY6KG0+hVKLoEXMPUJw3ynWuhO" crossorigin="anonymous"></script>
    <script src="/socket.io/socket.io.js"></script>
    <script>
      const { Server } = require("socket.io");

        const io = new Server({
        serveClient: false
        });
    </script>
</html>
