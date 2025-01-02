<!doctype html>
<html lang="en">

<?php session_start(); ?>
<title>LoomHouse</title>

<head>
    <?php include('header.php'); ?>
    <link rel="stylesheet" href="main.css">

    <style>
        body {
            background-color: rgb(205, 172, 109);
        }
        img {
            display: block;
            width: 100%;
            max-width: 500px;
            height: auto;
            margin: 0 auto 20px;
        }
        p {
            font-size: 15px;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: rgb(92, 65, 5);
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            margin: 20px auto;
        }
        .btn:hover {
            background-color: rgb(92, 65, 5);
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <?php include('navbar.php'); ?>

    <main role="main" class="container">
        <img src="logo.png" alt="Logo LoomHouse">
        <p><strong>LoomHouse</strong></p>
        <p>LoomHouse adalah aplikasi warehouse fashion yang berfokus pada pengelolaan stok baju, 
            celana, dan hijab. Kami menyediakan solusi efisien untuk memantau, mengelola, dan
            memastikan ketersediaan produk berkualitas tinggi bagi para pelanggan.
        </p>
        <div class="button-container">
            <a href="data.php" class="btn">Lihat Data</a>
        </div>
    </main>
    
    <?php include('scripts.php') ?>

    <?php include('footer.php'); ?>
</body>

</html>