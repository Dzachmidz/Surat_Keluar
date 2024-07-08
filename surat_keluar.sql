CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE surat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis_surat VARCHAR(50),
    nomor_lengkap VARCHAR(50),
    tgl_surat DATE,
    tentang TEXT
);

CREATE TABLE nota_dinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    jenis_nota VARCHAR(50),
    tgl_nota DATE,
    sifat VARCHAR(50),
    perihal VARCHAR(255),
    ringkasan TEXT,
    dikirim_kpd VARCHAR(255),
    ditandatangani_oleh VARCHAR(255),
    bidang VARCHAR(50),
    pdf_path VARCHAR(255)
);
