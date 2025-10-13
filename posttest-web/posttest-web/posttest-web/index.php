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
    <title>List Tempat Wisata di Kalimantan Timur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Wisata Kalimantan Timur</h1>
        <nav>
            <ul>
                <li><a href="#wisata">Daftar Wisata</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#kontak">Kontak</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
        <section id="wisata">
            <h2>Daftar Tempat Wisata Populer Di Kalimantan Timur</h2>
            <p>Kalimantan Timur adalah salah satu provinsi di Indonesia yang terkenal dengan kekayaan alam 
            serta budaya yang memukau. Dari pantai berpasir putih di Pulau Derawan, keindahan bawah laut 
            yang menakjubkan, hingga hutan tropis lebat di Bukit Bangkirai, setiap sudutnya menyimpan 
            pengalaman yang tak terlupakan. Selain itu, budaya lokal yang beragam, keramahan masyarakat, 
            dan kekayaan tradisi menjadikan perjalanan ke Kalimantan Timur penuh warna. 
            Jelajahi destinasi wisata unik, nikmati kuliner khas, dan rasakan petualangan seru di Bumi Etam.</p>

            <?php
            include 'koneksi.php';
            $result = mysqli_query($conn, "SELECT * FROM wisata");
            
            while($row = mysqli_fetch_assoc($result)):
            ?>
            <article class="card">
                <h3><?php echo $row['nama']; ?></h3>
                <a href="<?php echo $row['link_info']; ?>" target="_blank">
                    <img src="<?php echo $row['gambar']; ?>" alt="<?php echo $row['nama']; ?>" width="400">
                </a>
                <p><?php echo $row['deskripsi']; ?></p>
                <a href="<?php echo $row['link_lokasi']; ?>" target="_blank">Lokasi <?php echo $row['nama']; ?></a>
            </article>
            <?php endwhile; ?>
        </section>

        <section id="tentang">
            <h2>Tentang Website</h2>
            <p>Website ini dibuat sebagai landing page sederhana untuk menampilkan daftar tempat wisata di Kalimantan Timur.</p>
        </section>

        <section id="kontak">
            <h2>Kontak</h2>
            <p>Email: wisatakaltim31@gmail.com</p>
            <p>Telepon: +62 812 3456 7890</p>
            <p>Instagram : <a href="https://www.instagram.com/njlynhmzw.31/" target="_blank">njlynhmzw.31</a></p>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Wisata Kalimantan Timur</p>
        <p>Referensi desain: <a href="https://www.indonesia.travel/" target="_blank">Indonesia Travel</a></p>
    </footer>

    <script src="script.js"></script>
</body>
</html>