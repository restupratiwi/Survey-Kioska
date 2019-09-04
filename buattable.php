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
    -- --------------------------------------------------------

    --
    -- Table structure for table kategori
    --

    CREATE TABLE IF NOT EXISTS kategori (
      id_kategori int(11) NOT NULL,
      kategori varchar(25) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

    --
    -- Dumping data for table kategori
    --

    INSERT INTO `kategori` (`id_kategori`,`kategori`) VALUES
    (1,'umum'),
    (2,'fasilitas'),
    (3,'peminjaman'),
    (4,'kioska navigasi'),
    (5,'navigasi ar'),
    (6,'vr tour');

    -- --------------------------------------------------------

    --
    -- Table structure for table pertanyaan
    --

    CREATE TABLE IF NOT EXISTS pertanyaan (
      id_pertanyaan int(11) NOT NULL,
      id_survey int(11) NOT NULL,
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
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

    -- --------------------------------------------------------

    --
    -- Table structure for table survey
    --

    CREATE TABLE IF NOT EXISTS survey (
      id_survey int(11) NOT NULL,
      id_kategori int(11) NOT NULL,
      id_mesin int(11) NOT NULL,
      waktu timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

    --
    -- Indexes for dumped tables
    --

    --
    -- Indexes for table kategori
    --
    ALTER TABLE kategori
      ADD PRIMARY KEY (id_kategori), ADD UNIQUE KEY kategori (kategori);

    --
    -- Indexes for table pertanyaan
    --
    ALTER TABLE pertanyaan
      ADD PRIMARY KEY (id_pertanyaan), ADD UNIQUE KEY id_survey_2 (id_survey), ADD KEY id_survey (id_survey);

    --
    -- Indexes for table survey
    --
    ALTER TABLE survey
      ADD PRIMARY KEY (id_survey), ADD KEY id_kategori (id_kategori), ADD KEY id_mesin (id_mesin);

    --
    -- AUTO_INCREMENT for dumped tables
    --

    --
    -- AUTO_INCREMENT for table kategori
    --
    ALTER TABLE kategori
      MODIFY id_kategori int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
    --
    -- AUTO_INCREMENT for table pertanyaan
    --
    ALTER TABLE pertanyaan
      MODIFY id_pertanyaan int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
    --
    -- AUTO_INCREMENT for table survey
    --
    ALTER TABLE survey
      MODIFY id_survey int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
    --
    -- Constraints for dumped tables
    --

    --
    -- Constraints for table pertanyaan
    --
    ALTER TABLE pertanyaan
    ADD CONSTRAINT fk_survey FOREIGN KEY (id_survey) REFERENCES survey (id_survey);

    --
    -- Constraints for table survey
    --
    ALTER TABLE survey
    ADD CONSTRAINT fk_kategori FOREIGN KEY (id_kategori) REFERENCES kategori (id_kategori);
    ");

    $handle->execute();

    echo "Tabel berhasil dibuat.";
}
catch (PDOException $pe) {
    die("Tabel gagal dibuat: " . $pe->getMessage());
}
?>