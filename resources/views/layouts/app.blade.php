<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Forum' }}</title>

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" type="text/css" /> -->

    <link href="{{ asset('css/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />

    {{--sweet alert--}}
    <link href="{{ asset('/css/sweetalert.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Forum
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('topic') }}">Topic</a></li>
                        <li><a href="{{ url('threads') }}">Threads</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            
                           

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="col-md-12">
                @if (Session::has('success_msg'))
                    <?php $alert_class = 'alert-success';
                    $msg = Session::pull('success_msg');
                    ?>
                @elseif(Session::has('error_msg'))
                    <?php $alert_class = 'alert-danger';
                    $msg = Session::pull('error_msg');
                    ?>
                @elseif(Session::has('info_msg'))
                    <?php $alert_class = 'alert-info';
                    $msg = Session::pull('info_msg');
                    ?>
                @elseif(Session::has('warning_msg'))
                    <?php $alert_class = 'alert-warning';
                    $msg = Session::pull('warning_msg');
                    ?>
                @endif
                @if(Session::has('not_fade'))
                    <div class="alert alert-success" id="not_fade"
                         style="text-align: center; " role="alert">{!! Session::pull('not_fade') !!}
                        <span onclick="remove_msg('not_fade')" class="pull-right fa fa-close"
                              title="close"></span></div>
                @elseif(isset($alert_class) && isset($msg))
                    <div class="alert {{$alert_class}}" id="alert_msg" style="text-align: center; " role="alert">{{ $msg }}
                        <span onclick="remove_msg('alert_msg')" class="pull-right fa fa-close"
                              title="close"></span></div>
                @endif
            </div>
            @yield('content')
        </div>

    </div>

    <script>
        $(function() {
            $('.dataTable').dataTable();

            $("#alert_msg").fadeOut(8000);

        });

        function remove_msg(data) {
            document.getElementById(data).style.display = 'none';
        }
        
    </script>

    <!-- dataTables JS -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    {{--sweet alert--}}
    <script src="{{ asset('/js/sweetalert.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/jasny-bootstrap.min.js') }}" type="text/javascript"></script>

</body>
</html>
