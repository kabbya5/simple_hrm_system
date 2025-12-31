<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    <div id="app">
        {{-- Notification Alert  --}}

        <div id="alert-message" style="position:fiexed: top:10; right:10;z-index:999">
            
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"> HRM </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('departments.index')}}"> Departments </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('employees.index')}}"> Employees </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('skills.index')}}"> Skills </a>
                        </li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){

            // alert message 

            function showMessage(message, type='success'){
                var colors = {
                    success:'#4CAF50',
                    error:'#f44336',
                };

                var $notification = $('<div></div>').text(message).css({
                    'background-color': colors[type],
                    'color': '#fff',
                    'padding': '12px 20px',
                    'margin-bottom': '10px',
                    'border-radius': '5px',
                    'box-shadow': '0 2px 6px rgba(0,0,0,0.2)',
                    'min-width': '200px',
                    'opacity': 0,
                    'cursor': 'pointer'
                });

                $('#alert-message').append($notification);
                $notification.animate({opacity:1, right:'0px'});

                $notification.click(function() {
                    $(this).fadeOut(300, function() { $(this).remove(); });
                });

                setTimeout(function() {
                    $notification.fadeOut(500, function() { $(this).remove(); });
                }, 3000);
            }

            $(document).ready(function() {
                @if(session('success'))
                    showNotification("{{ session('success') }}", 'success');
                @endif

                @if(session('error'))
                    showNotification("{{ session('error') }}", 'error');
                @endif

                @if(session('info'))
                    showNotification("{{ session('info') }}", 'info');
                @endif

                @if(session('warning'))
                    showNotification("{{ session('warning') }}", 'warning');
                @endif
            });

            //delete alert 

            $('.delete-form').on('submit', function (e) {
                e.preventDefault();

                if (confirm('Do you want to delete this data?')) {
                    this.submit();
                }
            });

            // select 2 
            $('.select2').select2({
                placeholder: "Select skills",
                allowClear: true,
                width: '100%'
            });

            //image input priview

            $('.image-input').on('change', function(){

                const input = this;

                if(input.files && input.files[0]){
                    const reader = new FileReader();

                    reader.onload = function(e){
                        $(input).closest('.d-flex').find('.image-preview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);

                }
            })
        });
    </script>

    @yield('js')
</body>
</html>
