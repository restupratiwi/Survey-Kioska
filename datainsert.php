<?php
# datainsert.php
require_once 'dbconfig.php';
try {
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,
array(
\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
\PDO::ATTR_PERSISTENT => false
)
);

$dataKategori = 'fasilitas';
$dataMesin = 1;
$dataQ01 = 50;
$dataQ02 = 50;
$dataQ03 = 25;
$dataQ04 = 50;
$dataQ05 = 100;
$dataQ06 = 50;
$dataQ07 = 50;
$dataQ08 = 75;
$dataQ09 = 50;
$dataQ10 = 50;


$handle = $conn->prepare("INSERT INTO survey (id_kategori, id_mesin) VALUES ( (SELECT id_kategori FROM kategori WHERE kategori = :kategori), :mesin);
INSERT INTO pertanyaan (id_survey, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10) VALUES ((SELECT LAST_INSERT_ID()), :q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10);");

# Membuat data array asosiatif
$data = array(':kategori' => $dataKategori,
                ':mesin' => $dataMesin,
                ':q1' => $dataQ01,
                ':q2' => $dataQ02,
                ':q3' => $dataQ03,
                ':q4' => $dataQ04,
                ':q5' => $dataQ05,
                ':q6' => $dataQ06,
                ':q7' => $dataQ07,
                ':q8' => $dataQ08,
                ':q9' => $dataQ09,
                ':q10' => $dataQ10);

$handle->execute($data);

$idTerakhir = $conn->lastInsertId();

echo "Data berhasil dimasukkan. ID: " . $idTerakhir . "<br/>";
} 
catch (PDOException $pe) {
die("Data gagal dimasukkan: " . $pe->getMessage());
}

?>