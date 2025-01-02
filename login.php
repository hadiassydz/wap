<!doctype html>
<html lang="en">

<?php session_start();?>
<title>Halaman Login</title>

<head>
    <?php include('header.php'); ?>
    <link rel="stylesheet" href="main.css">

    <style>
        body {
            background-color: rgb(205, 172, 109);
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
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>

    <main role="main" class="container">

        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="mb-4">Halaman Login</h5>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['error']; ?>
                            <?php unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                        <?php if (isset($_SESSION['login_success'])): ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Anda berhasil login.',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'home.php';
                                }
                            });
                        </script>
                        <?php unset($_SESSION['login_success']); ?>
                    <?php endif; ?>

                    <form action="controller/auth.php?action=login" method="POST" onsubmit="return validateLoginForm()">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukan email Anda" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukan password Anda" name="password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn">
                                Submit
                            </button>
                        </div>
                    </form>

                    <div class="mt-3">
                        <p>Belum punya akun? <a href="register.php">Registrasi di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
    function validateLoginForm() {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if (!email || !password) {
            alert('Semua field harus diisi!');
            return false;
        }

        return true;
    }
    </script>

    <?php include('scripts.php'); ?>
    
    <?php include('footer.php'); ?>
</body>

</html>