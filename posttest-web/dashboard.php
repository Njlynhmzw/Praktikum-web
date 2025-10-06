<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Wisata Kalimantan Timur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Dashboard Wisata Kalimantan Timur</h1>
        <nav>
            <ul>
                <li><a href="index.php">Halaman Utama</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main style="max-width: 800px; margin: 30px auto;">
        <section style="background: #fff; padding: 25px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
            <h2 style="color: #ff8fab;">Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
            <p>Ini adalah halaman dashboard yang hanya dapat diakses setelah login.</p>
        </section>

        <section id="wisata">
            <h2>Daftar Tempat Wisata Populer Di Kalimantan Timur</h2>
            <article class="card">
                <h3>Pulau Derawan</h3>
                <a href="https://id.wikipedia.org/wiki/Kepulauan_Derawan" target="_blank">
                    <img src="pulau_derawan.png" alt="Pulau Derawan" width="400">
                </a>

                <a href="https://maps.app.goo.gl/w3hyk9qQ7KehTH298" target="_blank">Lokasi Pulau Derawan</a>
            </article>

            <article class="card">
                <h3>Danau Labuan Cermin</h3>
                <a href="https://id.wikipedia.org/wiki/Danau_Labuan_Cermin" target="_blank">
                    <img src="laboan_cermin.png" alt="Danau Labuan Cermin" width="400">
                </a>
                <a href="https://maps.app.goo.gl/A2FGRVuVijHxtnyc6" target="_blank">Lokasi Danau Labuan Cermin</a>
            </article>

            <article class="card">
                <h3>Bukit Bangkirai</h3>
                <a href="https://id.wikipedia.org/wiki/Bukit_Bangkirai" target="_blank">
                    <img src="bukit_bangkirai.png" alt="Bukit Bangkirai" width="400">
                </a>
                <a href="https://maps.app.goo.gl/1m4f3vUuY5cXr3tF8" target="_blank">Lokasi Bukit Bangkirai</a>
            </article>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Wisata Kalimantan Timur</p>
    </footer>
</body>

</html>
