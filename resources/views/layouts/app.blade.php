<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if (Auth::user())
        <title>{{Auth::user()->firstname}} {{Auth::user()->lastname}} - Colegio de San Pascual Baylon</title>
        @else (Auth::guest())
        <title>Colegio de San Pascual Baylon</title>
        @endif

        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-3.3.7/dist/css/bootstrap-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-3.3.7/dist/css/bootstrap.css') }}">

        <style>
            body {
                font-family: 'Lato', sans-serif;
            }
            a:link {
                color:  #0a7e07;
            }
            a:visited {
                color: #0a7e07;
            }
            a:hover {
                color: #0d5302;
                text-decoration: underline;
            }
            a:active {
                color: #0d5302;
                text-decoration: underline;
            }

        </style>
    </head>

    <body id="app-layout">
        <div class= "container-fluid" style="padding-bottom:20px">
            <div class="col-md-12">
                <div class="col-md-1">   
                    <img class ="img-responsive" style ="margin-top:10px;" src = "{{ asset('/images/cspblogo.png') }}" alt="CSPB" />
                </div>
                <div class="col-md-11" style="padding-top: 20px">
                    <span style="font-size: 14pt; font-weight: bold">Colegio de San Pascual Baylon</span>
                    <br>
                    Pag-asa, Obando, Bulacan
                    <br>
                    Tel No: 292-4534
                </div>   
            </div>
        </div>
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
                    <a class="navbar-brand" href="/">
                        Colegio de San Pascual Baylon
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">    
                    <ul class="nav navbar-nav navbar-right">
                        @if (!Auth::guest())
                        <li><a href="{{ url('/') }}">Dashboard</a></li>
                        @endif
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/') }}">My Portal</a></li>
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                        {{-- <li><a href="{{ url('/login') }}">Login</a></li> --}}
                        @else
                        <!--student-->
                        @if (Auth::user()->userLevel==1)
                        <li><a href="{{ url('/announcements') }}">Announcements</a></li>
                        <li><a href="{{ url('/notifications') }}">Notifications</a></li>
                        <li><a href="{{ url('/grades')}}">Grades</a></li>
                        @else
                        @endif

                        <!--teacher-->
                        @if (Auth::user()->userLevel==2)
                        <li><a href="{{ url('/announcements') }}">Announcements</a></li>
                        <li><a href="{{ url('/notifications') }}">Notifications</a></li>
                        <li><a href="{{ url('/view/grades') }}">Grades</a></li>
                        @else
                        @endif

                        <!--Acad, Registrar, Finance-->
                        @if (Auth::user()->userLevel==3)
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Announcements <span class="caret"></span></a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="{{ url('/announcements') }}">View Announcements</a></li>
                                    <li><a href="{{ url('/create/announcements') }}">Create Announcements</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notifications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="{{ url('/notifications') }}">View Notifications</a></li>
                                    <li><a href="{{ url('/create/notifications') }}">Create Notifications</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/users') }}">Users</a></li>
                            @else
                            @endif

                            <!--Secretary-->
                            @if (Auth::user()->userLevel==4)
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Announcements <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="{{ url('/announcements') }}">View Announcements</a></li>
                                    <li><a href="{{ url('create/announcements') }}">Create Announcements</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notifications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="{{ url('/notifications') }}">My Notifications</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li><a href="{{ url('/approved/notifications') }}">View Notifications</a></li>
                                    <li><a href="{{ url('/create/notifications') }}">Create Notifications</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ url('/grades/view') }}">Grades</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Users <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="{{ url('/users') }}">View Users</a></li>
                                    <li><a href="{{ url('/password/reset') }}">Password Reset</a></li>
                                    <li><a href="{{ url('/register') }}">Register User</a></li>
                                </ul>
                            </li>
                            @else
                            @endif

                            <!--Principal, Rector-->
                            @if (Auth::user()->userLevel==5)
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Announcements <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="{{ url('/announcements') }}">View Announcements</a></li>
                                    <li><a href="{{ url('/create/announcements') }}">Create Announcements</a></li>
                                    <li><a href="{{ url('/pending/announcements') }}">Pending Announcements</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notifications <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="font-size: 10pt">
                                    <li><a href="{{ url('/notifications') }}">My Notifications</a></li>
                                    <li role="presentation" class="divider"></li>
                                    <li><a href="{{ url('/view/notifications') }}">View Notifications</a></li>
                                    <li><a href="{{ url('/create/notifications') }}">Create Notifications</a></li>
                                    <li><a href="{{ url('/pending/notifications') }}">Pending Notifications</a></li>

                                </ul>
                            </li>
                            <li><a href="{{ url('/grades/view') }}">Grades</a></li>
                            <li><a href="{{ url('/users') }}">Users</a></li>

                            @else
                            @endif

                            <li>
                                <a href="{{ url('/logout') }}">Logout</a>
                            </li>
                            @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

<!--<script src="bootstrap/bootstrap-3.3.7/dist/js/jquery-1.11.0.min.js"></script>
<script src="bootstrap/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>-->

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

        <footer class="footer">
            <div class="container-fluid" style="padding-top: 20px" align="center">
                <p class="text-muted"> &COPY; <b>2016</b> <u>Colegio de San Pascual Baylon</u> | <u>All Rights Reserved</u></p>
            </div>
        </footer>

    </body>
</html>
