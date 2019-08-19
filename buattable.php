<?php
# buattable.php
require_once 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,
                    array(
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                   );

    $handle = $conn->prepare("
    CREATE TABLE IF NOT EXISTS kategori (
        id_kategori int(11) NOT NULL,
        kategori enum('fasilitas','pelayanan umum','peminjaman','kioska navigasi') NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      
      -- --------------------------------------------------------
      
      --
      -- Table structure for table pertanyaan
      --
      
      CREATE TABLE IF NOT EXISTS pertanyaan (
        id_pertanyaan int(11) NOT NULL,
        q1 int(11) DEFAULT NULL,
        q2 int(11) DEFAULT NULL,
        q3 int(11) DEFAULT NULL,
        q4 int(11) DEFAULT NULL,
        q5 int(11) DEFAULT NULL,
        q6 int(11) DEFAULT NULL,
        q7 int(11) DEFAULT NULL,
        q8 int(11) DEFAULT NULL,
        q9 int(11) DEFAULT NULL,
        q10 int(11) DEFAULT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      
      -- --------------------------------------------------------
      
      --
      -- Table structure for table survey
      --
      
      CREATE TABLE IF NOT EXISTS survey (
        id_survey int(11) NOT NULL,
        id_kategori int(11) NOT NULL,
        id_mesin int(11) NOT NULL,
        id_pertanyaan int(11) NOT NULL,
        waktu timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
      ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
      
      --
      -- Indexes for dumped tables
      --
      
      --
      -- Indexes for table kategori
      --
      ALTER TABLE kategori
        ADD PRIMARY KEY (id_kategori);
      
      --
      -- Indexes for table pertanyaan
      --
      ALTER TABLE pertanyaan
        ADD PRIMARY KEY (id_pertanyaan);
      
      --
      -- Indexes for table survey
      --
      ALTER TABLE survey
        ADD PRIMARY KEY (id_survey), ADD KEY id_kategori (id_kategori), ADD KEY id_mesin (id_mesin), ADD KEY id_pertanyaan (id_pertanyaan);
      
      --
      -- AUTO_INCREMENT for dumped tables
      --
      
      --
      -- AUTO_INCREMENT for table kategori
      --
      ALTER TABLE kategori
        MODIFY id_kategori int(11) NOT NULL AUTO_INCREMENT;
      --
      -- AUTO_INCREMENT for table pertanyaan
      --
      ALTER TABLE pertanyaan
        MODIFY id_pertanyaan int(11) NOT NULL AUTO_INCREMENT;
      --
      -- AUTO_INCREMENT for table survey
      --
      ALTER TABLE survey
        MODIFY id_survey int(11) NOT NULL AUTO_INCREMENT;
      --
      -- Constraints for dumped tables
      --
      
      --
      -- Constraints for table survey
      --
      ALTER TABLE survey
      ADD CONSTRAINT fk_kategori FOREIGN KEY (id_kategori) REFERENCES kategori (id_kategori),
      ADD CONSTRAINT fk_pertanyaan FOREIGN KEY (id_pertanyaan) REFERENCES pertanyaan (id_pertanyaan);
    ");

    $handle->execute();

    echo "Tabel berhasil dibuat.";
}
catch (PDOException $pe) {
    die("Tabel gagal dibuat: " . $pe->getMessage());
}
?>