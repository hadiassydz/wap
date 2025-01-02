<!doctype html>
<html lang="en">
<title>Profil</title>

<head>
    <?php 
    session_start();
    
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        header("location: login.php"); 
        exit;
    }

    include('header.php'); 
    ?>

    <style>
        body {
            background-color: rgb(205, 172, 109);
        }
        .container-p {
            max-width: 400px;
            min-height: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            margin-top: 50px; 
        }
        p {
            margin: 10px 0; 
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <link rel="stylesheet" href="main.css">

    <main role="main" class="container-p">
        <div>
            <div class="col-12">
                <h1>Profil Pengguna</h1>
                <hr class="separator">
                <br>
                <p><strong>Nama:</strong></p>
                <p><?php echo htmlspecialchars($_SESSION['username']); ?></p>
                <br>
                <p><strong>Email:</strong></p>
                <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>
            </div>
        </div>
    </main>

    <?php include('scripts.php'); ?>        
    <?php include('footer.php'); ?>
</body>
</html>