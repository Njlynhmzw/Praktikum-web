<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
// tambah wisata
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $link_info = $_POST['link_info'];
    $link_lokasi = $_POST['link_lokasi'];
    
    $query = "INSERT INTO wisata (nama, deskripsi, gambar, link_info, link_lokasi) 
              VALUES ('$nama', '$deskripsi', '$gambar', '$link_info', '$link_lokasi')";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}

// edit wisata
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_POST['gambar'];
    $link_info = $_POST['link_info'];
    $link_lokasi = $_POST['link_lokasi'];
    
    $query = "UPDATE wisata SET 
              nama='$nama', deskripsi='$deskripsi', gambar='$gambar', 
              link_info='$link_info', link_lokasi='$link_lokasi' 
              WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}

// hapus wisata
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM wisata WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Wisata Kalimantan Timur</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .crud-form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .crud-form input, .crud-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .crud-form button {
            background: #ff8fab;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
        .action-buttons button, .action-buttons a button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .edit-btn {
            background: #4CAF50;
            color: white;
        }
        .delete-btn {
            background: #f44336;
            color: white;
        }

        .batal-btn {
            background: #fd9fd1ff;
            color: white;
        }
    </style>
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

    <main style="max-width: 1000px; margin: 30px auto;">
        <section style="background: #fff; padding: 25px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); margin-bottom: 30px;">
            <h2 style="color: #ff8fab;">Selamat Datang, <?php echo $_SESSION['username']; ?>!</h2>
            <p>Ini adalah halaman dashboard yang hanya dapat diakses setelah login. Di sini Anda dapat mengelola data tempat wisata.</p>
        </section>

        <section class="crud-form">
            <h3>Tambah Tempat Wisata Baru</h3>
            <form method="POST">
                <input type="text" name="nama" placeholder="Nama Tempat Wisata" required>
                <textarea name="deskripsi" placeholder="Deskripsi" rows="3" required></textarea>
                <input type="text" name="gambar" placeholder="URL Gambar" required>
                <input type="text" name="link_info" placeholder="Link Info (Wikipedia)" required>
                <input type="text" name="link_lokasi" placeholder="Link Lokasi (Google Maps)" required>
                <button type="submit" name="tambah">Tambah Wisata</button>
            </form>
        </section>

        <?php
        if (isset($_GET['edit_id'])) {
            $edit_id = $_GET['edit_id'];
            $edit_query = mysqli_query($conn, "SELECT * FROM wisata WHERE id=$edit_id");
            $edit_data = mysqli_fetch_assoc($edit_query);
        ?>
        <section class="crud-form">
            <h3>Edit Tempat Wisata</h3>
            <form method="POST">
                <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
                <input type="text" name="nama" value="<?php echo $edit_data['nama']; ?>" required>
                <textarea name="deskripsi" rows="3" required><?php echo $edit_data['deskripsi']; ?></textarea>
                <input type="text" name="gambar" value="<?php echo $edit_data['gambar']; ?>" required>
                <input type="text" name="link_info" value="<?php echo $edit_data['link_info']; ?>" required>
                <input type="text" name="link_lokasi" value="<?php echo $edit_data['link_lokasi']; ?>" required>
                <button type="submit" name="edit">Update Wisata</button>
                <button type="button" onclick="window.location.href='dashboard.php'" class="batal-btn">Batal</button>
            </form>
        </section>
        <?php
        }
        ?>

        <section id="wisata">
            <h2>Kelola Tempat Wisata</h2>
            
            <?php
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
                
                <div class="action-buttons">
                    <a href="dashboard.php?edit_id=<?php echo $row['id']; ?>">
                        <button class="edit-btn">Edit</button>
                    </a>
                    
                    <a href="dashboard.php?hapus=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Yakin ingin menghapus <?php echo $row['nama']; ?>?')">
                        <button class="delete-btn">Hapus</button>
                    </a>
                </div>
            </article>
            <?php endwhile; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Wisata Kalimantan Timur</p>
    </footer>
</body>
</html>