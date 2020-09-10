<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
    <title>Report Review Buku</title>
    <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:left;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:35px;
            padding:40px;
            width:750px;
            height:auto;
            background-color:#fff;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:740px;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:185px;
        }
        th{
            background-color: #f0f0f0;
        }
        h4, p{
            margin:0px;
        }
        h4{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
<div class="container">
<h4>Data Review Buku</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="4">Nama Lengkap</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $print; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td colspan="4"><?php echo e($data->name); ?></td>
        <td colspan="4"><?php echo e($data->nama_kelas); ?></td>
        </tr>
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tempat Terbit</th>
            <th>Halaman</th>
        </tr>
        <tr>
        <td><?php echo e($data->judul_buku); ?></td>
            <td><?php echo e($data->penulis); ?></td>
            <td><?php echo e($data->penerbit); ?></td>
            <td><?php echo e($data->tempat_terbit); ?></td>
            <td><?php echo e($data->jumlah_halaman); ?></td>
        </tr>
        <tr>
            <td colspan="5">
            <strong>Sinopsis</strong>
            <p><?php echo e($data->sinopsis); ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="5">
            <strong>Kelebihan</strong>
            <p><?php echo e($data->kelebihan); ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="5">
            <strong>Kekurangan</strong>
            <p><?php echo e($data->kekurangan); ?></p>
            </td>
        </tr>
        <tr>
            <td colspan="5"> 
            <strong>Kesimpulan</strong>
            <p><?php echo e($data->kesimpulan); ?></p>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div>
</body>
</html><?php /**PATH C:\devmufik\htdocs\omobv2\resources\views/review/print.blade.php ENDPATH**/ ?>