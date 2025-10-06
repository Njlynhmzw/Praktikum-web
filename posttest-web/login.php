<?php
session_start();

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username === 'nou' && $password === 'nou123') {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Wisata Kalimantan Timur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Login Wisata Kalimantan Timur</h1>
    </header>

    <main style="max-width: 500px; margin: 50px auto;">
        <section style="background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
            <h2 style="text-align: center; color: #ff8fab; margin-bottom: 20px;">Masuk ke Dashboard</h2>
            
            <?php if (isset($error)): ?>
                <p style="color: red; text-align: center;"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <form method="POST" action="login.php">
                <div style="margin-bottom: 20px;">
                    <label for="username" style="display: block; margin-bottom: 5px; font-weight: bold;">Username:</label>
                    <input type="text" id="username" name="username" required 
                           style="width: 100%; padding: 10px; border: 2px solid #ff8fab; border-radius: 8px;">
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Password:</label>
                    <input type="password" id="password" name="password" required 
                           style="width: 100%; padding: 10px; border: 2px solid #ff8fab; border-radius: 8px;">
                </div>
                
                <button type="submit" 
                        style="width: 100%; padding: 12px; background: #ff8fab; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">
                    Login
                </button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Wisata Kalimantan Timur</p>
    </footer>
</body>

</html>
