<?php
# Web Service POST MySQL
# Membuat data dengan POST: Uji dengan membuka http://localhost/survey-kioska/api.php/pertanyaan menggunakan metode POST. Data harus disertakan
# ws-json-post.php
# Gunakan aplikasi Postman untuk pengujian API/Web Service | www.getpostman.com

# Format Data: JSON
header('Content-type: application/json');

# Mendapatkan method yang digunakan: GET/POST/PUT/DELETE

# Cara 1: Menggunakan variabel $_SERVER
# $method = $_SERVER['REQUEST_METHOD'];

# Cara 2: Menggunakan getenv sehingga tidak perlu bekerja dengan variabel $_SERVER
$method = getenv('REQUEST_METHOD');

# This function is useful (compared to $_SERVER, $_ENV) because it searches $varname key in those array case-insensitive manner.

# Cara 3: Menggunakan hidden input _METHOD, workaround
$method = isset($_REQUEST['_METHOD']) ? $_REQUEST['_METHOD'] : $method;

$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));

function process_post($param) {
    if((count($param) == 1) and ($param[0] == "pertanyaan")) {
        require_once 'dbconfig.php';

        $dataKategori = (isset($_POST['kategori']) ? $_POST['kategori'] : NULL);
        $dataMesin = (isset($_POST['mesin']) ? $_POST['mesin'] : NULL);
        $dataQ01 = (isset($_POST['q1']) ? $_POST['q1'] : NULL);
        $dataQ01 = (isset($_POST['q1']) ? $_POST['q1'] : NULL);
        $dataQ02 = (isset($_POST['q2']) ? $_POST['q2'] : NULL);
        $dataQ03 = (isset($_POST['q3']) ? $_POST['q3'] : NULL);
        $dataQ04 = (isset($_POST['q4']) ? $_POST['q4'] : NULL);
        $dataQ05 = (isset($_POST['q5']) ? $_POST['q5'] : NULL);
        $dataQ06 = (isset($_POST['q6']) ? $_POST['q6'] : NULL);
        $dataQ07 = (isset($_POST['q7']) ? $_POST['q7'] : NULL);
        $dataQ08 = (isset($_POST['q8']) ? $_POST['q8'] : NULL);
        $dataQ09 = (isset($_POST['q9']) ? $_POST['q9'] : NULL);
        $dataQ10 = (isset($_POST['q10']) ? $_POST['q10'] : NULL);


        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,
                            array(
                                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                                    \PDO::ATTR_PERSISTENT => false
                                )
                           );

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

            if($handle->rowCount()){
                $status = 'Berhasil';
                $idTerakhir = $conn->lastInsertId();
                $arr = array('status' => $status, 'id' => $idTerakhir );
            } else {
                $status = "Gagal";
                $arr = array('status' => $status);
            }

            echo json_encode($arr);
        }
        catch (PDOException $pe) {
            die(json_encode($pe->getMessage()));
        }
    }
}

switch ($method) {
    case 'POST':
        process_post($request);
        break;
}
?>