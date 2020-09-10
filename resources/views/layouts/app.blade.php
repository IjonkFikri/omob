<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/images/nfrc.png">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <script src="https://kit.fontawesome.com/3c855de2a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    @toastr_css
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#3742fa;">
                    <img src="/images/nfrc.png" alt="" width="60">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::user())
                    <ul class="navbar-nav mr-auto">
                        @if((Auth::user()->role==1) || (Auth::user()->role==2)|| (Auth::user()->role==3) ||
                        (Auth::user()->role==4))
                        <li class="nav-item">
                            <a href="{{url('/home')}}"
                                class="nav-link {{Request::path()=='home' ? 'active':''}}">Dashboard</a>
                        </li>
                        @endif
                        @if(Auth::user()->role==3)
                        <li class="nav-item ">
                            <a href="{{url('readings')}}"
                                class="nav-link {{Request::path()=='readings' ? 'active':''}}">Reading History</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('books')}}"
                                class="nav-link {{Request::path()=='books' ? 'active':''}}">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('kelas')}}"
                                class="nav-link {{Request::path()=='kelas' ? 'active':''}}">Kelas</a>
                        </li>
                        @endif
                        @if((Auth::user()->role==1))
                        <li class="nav-item">
                            <a href="{{url('adminrecap')}}"
                                class="nav-link {{Request::path()=='adminrecap' ? 'active':''}} {{Request::path()=='reports' ? 'active':''}}">Report
                                Admin</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('exportadmin')}}"
                                class="nav-link {{Request::path()=='exportadmin' ? 'active':''}}">Export</a>
                        </li>
                        @endif
                        @if((Auth::user()->role==2))
                        <li class="nav-item">
                            <a href="{{url('reports')}}"
                                class="nav-link {{Request::path()=='reports' ? 'active':''}}">Report Kelas</a>
                        </li>
                        @endif
                        @if((Auth::user()->role==4))
                        <li class="nav-item">
                            <a href="{{url('recap')}}"
                                class="nav-link {{Request::path()=='recap' ? 'active':''}}{{Request::path()=='reports' ? 'active':''}}">Report
                                Recap</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('exportrecap')}}"
                                class="nav-link {{Request::path()=='exportrecap' ? 'active':''}}">Export</a>
                        </li>
                        @endif
                        @if ((Auth::user()->role == 1) || (Auth::user()->role ==4))
                        <li class="nav-item">
                            <a href="{{url('review')}}"
                                class="nav-link {{Request::path()=='review' ? 'active':''}}">Review Buku</a>
                        </li>
                        @endif
                        @if(Auth::user()->role==1)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Data Master <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{url('users')}}">User</a>
                                <a class="dropdown-item" href="{{url('recaps')}}">User Rekap</a>
                                <a class="dropdown-item" href="{{url('students')}}">Siswa</a>
                                <a class="dropdown-item" href="{{url('teachers')}}">Guru</a>
                                <a class="dropdown-item" href="{{url('levels')}}">Kelas</a>
                            </div>
                        </li>
                        @endif
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif --}}
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} - {{ Auth::user()->nis }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
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
            <div class="container">
                @yield('content')
            </div>

        </main>
    </div>
</body>
@jquery
@toastr_js
@toastr_render
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#data').DataTable();
} );
    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }
    $(function () {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            var date = document.getElementById("date").value = formatDate(start) + " / " + formatDate(end);
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            }
        }, cb);
        // var date = document.getElementById("date").value=formatDate(start) +" / "+ formatDate(end);
        cb(start, end);

    });
    // function myFunction() {
    //     let cTime = document.getElementById("date").value;
    //     console.log(cTime);
    //     let now = new Date()
    //     console.log(now)
    //     let days = new Date(now.setDate(now.getDate() - cTime));
    //     document.getElementById("time").value = formatDate(days);
    // }

</script>

</html>