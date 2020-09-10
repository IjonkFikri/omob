<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NF Reading Culture</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans|Poppins:400,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/bg.jpg');
            background-size: cover;
        }

        h1 {
            font-size: 40px;
        }

        a {
            width: 10em;
            font-family: 'Poppins', sans-serif;
            /* font-weight: bold; */
            background:#f39c12;
            color: #fff;
            font-size: 1.6em;
            text-align: center;
            padding: 14px;
            letter-spacing: 1px;
            position: relative;
            top: 1em;
            border-radius: 15px;
            margin-bottom:2em;
        }

        a:hover {
            text-decoration: none;
            color: #dfe6e9;
        }

        p {
            font-family: 'Satisfy', cursive;
            color: #2c3e50;
        }

        .card {
            background-color:hsla(0, 100%, 90%, 0.3);;
            border: none;
            padding:5% !important;
        }

        span {
            font-family: 'Satisfy', cursive;
            color: #ecf0f1;
            font-size: 16px;
            font-weight: bold;
        }

    </style>
</head>

<body>
    <div class="container" style="margin-top: 5em; padding:2em;">
        <div class="card my-4 p-4 m-auto" style="width:50rem;margin-top:3%;">
            <img src="/images/nfrc.png" alt="" style="width:80px;" class="m-auto">
            <p style="text-align:center; letter-spacing:1px; font-size:50px;" class="m-auto">
                I read a book one day and my whole life was changed
            </p>
            <span class="m-auto my-5">-Orhan Pamuk</span>
            <a href="/login" class=" shadow-sm m-auto" style="margin-bottom:2em;">Login</a>
        </div>
        <div></div>
    </div>
</body>

</html>
<?php /**PATH /Users/muhamadfikri/Developer/Project/dev-omobv2/resources/views/welcome.blade.php ENDPATH**/ ?>