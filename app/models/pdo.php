<?php
const DB_HOST = "localhost";
const DB_DATABASE = "duan1";
const DB_USERNAME = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";
const DB_PORT = 3306;


function getConnect() {
    try {
        $connect = new PDO(
            "mysql:host=" . DB_HOST .
            ";port=" . DB_PORT .
            ";dbname=" . DB_DATABASE .
            ";charset=" . DB_CHARSET,
            DB_USERNAME,
            DB_PASSWORD
        );
        $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connect;
    }
    catch(PDOException $e) {
        echo "Loi ket noi den database " . $e -> getMessage();
    }
    
}


function executeCommand($sql) {
    try {
        $connect = getConnect();
        $stmt = $connect -> prepare($sql);
        $stmt -> execute();
        return true;
    }
    catch(PDOException $e) {
        throw $e -> getMessage();
        return false;
    }
    finally {
        unset($connect);
    }
}

function getData($sql, $getAll = true) {
    try {
        $connect = getConnect();
        $stmt = $connect -> prepare($sql);
        $stmt -> execute();
    }
    catch(PDOException $e) {
        echo "loi cau lenh: $sql";
    }
    finally {
        unset($connect);
    }


    if($getAll) {
        return $stmt -> fetchAll();
    }
    return $stmt -> fetch();
}

function executeCommandAndGetID($sql) {
    try {
        $connect = getConnect();
        $stmt = $connect -> prepare($sql);
        $stmt -> execute();
        return $connect -> lastInsertId();
    }
    catch(PDOException $e) {
        return false;
    }
    finally {
        unset($connect);
    }
}

?>