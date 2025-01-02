<!doctype html>
<html lang="en">

<?php session_start(); ?>
<title>Halaman Registrasi</title>

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
                    <h5 class="mb-4">Halaman Register</h5>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_SESSION['error']; ?>
                            <?php unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success'])): ?>
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: '<?php echo $_SESSION['success']; ?>',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'login.php';
                                }
                            });
                            <?php unset($_SESSION['success']); ?>
                        </script>
                    <?php endif; ?>

                    <form action="controller/auth.php?action=register" method="POST" onsubmit="return validateForm()">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="username" placeholder="Masukan nama Anda" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukan email Anda" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukan password Anda" name="password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn">
                                Submit
                            </button>
                        </div>
                    </form>

                    <script>
                    function validateForm() {
                        const username = document.getElementById('username').value;
                        const email = document.getElementById('email').value;
                        const password = document.getElementById('password').value;

                        if (!username || !email || !password) {
                            alert('Semua field harus diisi!');
                            return false;
                        }

                        return true;
                    }
                    </script>

                    <div class="mt-3">
                        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('scripts.php'); ?>
    
    <?php include('footer.php'); ?>
</body>

</html>