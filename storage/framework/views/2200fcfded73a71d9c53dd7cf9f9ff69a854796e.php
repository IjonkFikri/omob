<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="/images/nfrc.png">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <script src="https://kit.fontawesome.com/3c855de2a9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">

    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <?php echo toastr_css(); ?>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>" style="color:#3742fa;">
                    <img src="/images/nfrc.png" alt="" width="60">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <?php if(Auth::user()): ?>
                    <ul class="navbar-nav mr-auto">
                        <?php if((Auth::user()->role==1) || (Auth::user()->role==2)|| (Auth::user()->role==3) ||
                        (Auth::user()->role==4)): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('/home')); ?>"
                                class="nav-link <?php echo e(Request::path()=='home' ? 'active':''); ?>">Dashboard</a>
                        </li>
                        <?php endif; ?>
                        <?php if(Auth::user()->role==3): ?>
                        <li class="nav-item ">
                            <a href="<?php echo e(url('readings')); ?>"
                                class="nav-link <?php echo e(Request::path()=='readings' ? 'active':''); ?>">Reading History</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('books')); ?>"
                                class="nav-link <?php echo e(Request::path()=='books' ? 'active':''); ?>">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('kelas')); ?>"
                                class="nav-link <?php echo e(Request::path()=='kelas' ? 'active':''); ?>">Kelas</a>
                        </li>
                        <?php endif; ?>
                        <?php if((Auth::user()->role==1)): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('adminrecap')); ?>"
                                class="nav-link <?php echo e(Request::path()=='adminrecap' ? 'active':''); ?> <?php echo e(Request::path()=='reports' ? 'active':''); ?>">Report
                                Admin</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('exportadmin')); ?>"
                                class="nav-link <?php echo e(Request::path()=='exportadmin' ? 'active':''); ?>">Export</a>
                        </li>
                        <?php endif; ?>
                        <?php if((Auth::user()->role==2)): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('reports')); ?>"
                                class="nav-link <?php echo e(Request::path()=='reports' ? 'active':''); ?>">Report Kelas</a>
                        </li>
                        <?php endif; ?>
                        <?php if((Auth::user()->role==4)): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('recap')); ?>"
                                class="nav-link <?php echo e(Request::path()=='recap' ? 'active':''); ?><?php echo e(Request::path()=='reports' ? 'active':''); ?>">Report
                                Recap</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(url('exportrecap')); ?>"
                                class="nav-link <?php echo e(Request::path()=='exportrecap' ? 'active':''); ?>">Export</a>
                        </li>
                        <?php endif; ?>
                        <?php if((Auth::user()->role == 1) || (Auth::user()->role ==4)): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(url('review')); ?>"
                                class="nav-link <?php echo e(Request::path()=='review' ? 'active':''); ?>">Review Buku</a>
                        </li>
                        <?php endif; ?>
                        <?php if(Auth::user()->role==1): ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Data Master <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(url('users')); ?>">User</a>
                                <a class="dropdown-item" href="<?php echo e(url('recaps')); ?>">User Rekap</a>
                                <a class="dropdown-item" href="<?php echo e(url('students')); ?>">Siswa</a>
                                <a class="dropdown-item" href="<?php echo e(url('teachers')); ?>">Guru</a>
                                <a class="dropdown-item" href="<?php echo e(url('levels')); ?>">Kelas</a>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <?php endif; ?>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                        </li>
                        
                        <?php else: ?>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php echo e(Auth::user()->name); ?> - <?php echo e(Auth::user()->nis); ?> <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                    style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

        </main>
    </div>
</body>
<?php echo jquery(); ?>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
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

</html><?php /**PATH /home/nuru8354/public_html/omobv2/resources/views/layouts/app.blade.php ENDPATH**/ ?>