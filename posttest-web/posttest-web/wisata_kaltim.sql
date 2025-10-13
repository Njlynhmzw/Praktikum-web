CREATE DATABASE IF NOT EXISTS wisata_kaltim;
USE wisata_kaltim;

CREATE TABLE IF NOT EXISTS wisata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    deskripsi TEXT,
    gambar VARCHAR(255),
    link_info VARCHAR(255),
    link_lokasi VARCHAR(255)
);

-- Insert data contoh
INSERT INTO wisata (nama, deskripsi, gambar, link_info, link_lokasi) VALUES
('Pulau Derawan', 'Kepulauan Derawan adalah sebuah kepulauan yang berada di Kabupaten Berau, Kalimantan Timur. Di kepulauan ini terdapat sejumlah objek wisata bahari menawan, salah satunya Taman Bawah Laut yang diminati wisatawan mancanegara terutama para penyelam kelas dunia.', 'pulau_derawan.png', 'https://id.wikipedia.org/wiki/Kepulauan_Derawan', 'https://maps.app.goo.gl/w3hyk9qQ7KehTH298'),
('Danau Labuan Cermin', 'Danau Labuan Cermin adalah sebuah objek wisata air yang berlokasi di kecamatan Biduk-biduk, Kabupaten Berau, Kalimantan Timur. Tempat wisata alam ini dikelola oleh masyarakat sekitar bekerja sama dengan Lembaga Masyarakat Labuan Cermin yang menaunginya. Danau ini memiliki dua rasa, asin (air laut) di bagian dasar dan tawar di bagian permukaan.', 'laboan_cermin.png', 'https://id.wikipedia.org/wiki/Danau_Labuan_Cermin', 'https://maps.app.goo.gl/A2FGRVuVijHxtnyc6'),
('Bukit Bangkirai', 'Bukit Bangkirai adalah kawasan wisata alam dan konservasi hutan hujan tropis yang terletak di Kecamatan Samboja Barat, Kabupaten Kutai Kartanegara, Provinsi Kalimantan Timur. Berjarak sekitar 58 km dari Kota Balikpapan, kawasan ini dapat ditempuh dengan perjalanan darat selama 1,5 hingga 2 jam', 'bukit_bangkirai.png', 'https://id.wikipedia.org/wiki/Bukit_Bangkirai', 'https://maps.app.goo.gl/1m4f3vUuY5cXr3tF8');