<?php
# Web Service POST MySQL
# Membuat data dengan POST: Uji dengan membuka http://localhost/praktikumweb/api/mahasiswa menggunakan metode POST. Data nama dan npm harus disertakan
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

        $dataQ1 = (isset($_POST['q1']) ? $_POST['q1'] : NULL);
        $dataQ2 = (isset($_POST['q2']) ? $_POST['q2'] : NULL);
        $dataQ3 = (isset($_POST['q3']) ? $_POST['q3'] : NULL);
        $dataQ4 = (isset($_POST['q4']) ? $_POST['q4'] : NULL);
        $dataQ5 = (isset($_POST['q5']) ? $_POST['q5'] : NULL);
        $dataQ6 = (isset($_POST['q6']) ? $_POST['q6'] : NULL);
        $dataQ7 = (isset($_POST['q7']) ? $_POST['q7'] : NULL);
        $dataQ8 = (isset($_POST['q8']) ? $_POST['q8'] : NULL);
        $dataQ9 = (isset($_POST['q9']) ? $_POST['q9'] : NULL);
        $dataQ10 = (isset($_POST['q10']) ? $_POST['q10'] : NULL);


        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password,
                            array(
                                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                                    \PDO::ATTR_PERSISTENT => false
                                )
                           );

            $handle = $conn->prepare("
                INSERT INTO pertanyaan (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10)
                VALUES (:q1, :q2, :q3, :q4, :q5, :q6, :q7, :q8, :q9, :q10)
            ");

            $handle->bindParam(':q1', $dataq1);
            $handle->bindParam(':q2', $dataq2);
            $handle->bindParam(':q3', $dataq3);
            $handle->bindParam(':q4', $dataq4);
            $handle->bindParam(':q5', $dataq5);
            $handle->bindParam(':q6', $dataq6);
            $handle->bindParam(':q7', $dataq7);
            $handle->bindParam(':q8', $dataq8);
            $handle->bindParam(':q9', $dataq9);
            $handle->bindParam(':q10', $dataq10);

            $handle->execute();

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
    case 'PUT':
        process_put($request);
        break;
    case 'POST':
        process_post($request);
        break;
    case 'GET':
        process_get($request);
        break;
    case 'HEAD':
        process_head($request);
        break;
    case 'DELETE':
        process_delete($request);
        break;
    case 'OPTIONS':
        process_options($request);
        break;
    default:
        handle_error($request);
        break;
}
# Gunakan aplikasi Postman untuk pengujian API/Web Service | www.getpostman.com
# Membuat data dengan POST: Uji dengan membuka http://localhost/praktikumweb/ws-json-post.php/mahasiswa menggunakan metode POST. Data nama dan npm harus disertakan
?>