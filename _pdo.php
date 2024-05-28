<?php

function PDO_Connect($dsn, $user = "", $password = "") {
    try {
        global $PDO;
        $PDO = new PDO($dsn, $user, $password);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $PDO;
    } catch (PDOException $exc) {
        return false;
    }
}

function PDO_FetchOne($query, $params = null) {
    try {
        global $PDO;
        if (isset($params)) {
            $stmt = $PDO->prepare($query);
            $stmt->execute($params);
        } else {
            $stmt = $PDO->query($query);
        }
        $row = $stmt->fetch(PDO::FETCH_NUM);
        if ($row) {
            return $row[0];
        } else {
            return false;
        }
    } catch (PDOException $exc) {
        return false;
    }
}

function PDO_FetchRow($query, $params = null) {
    try {
        global $PDO;
        if (isset($params)) {
            $stmt = $PDO->prepare($query);
            $stmt->execute($params);
        } else {
            $stmt = $PDO->query($query);
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $exc) {
        return false;
    }
}

function PDO_FetchAll($query, $params = null) {
    try {
        global $PDO;
        if (isset($params)) {
            $stmt = $PDO->prepare($query);
            $stmt->execute($params);
        } else {
            $stmt = $PDO->query($query);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exc) {
        return false;
    }
}

function PDO_FetchAssoc($query, $params = null) {
    try {
        global $PDO;
        if (isset($params)) {
            $stmt = $PDO->prepare($query);
            $stmt->execute($params);
        } else {
            $stmt = $PDO->query($query);
        }
        $rows = $stmt->fetchAll(PDO::FETCH_NUM);
        $assoc = array();
        foreach ($rows as $row) {
            $assoc[$row[0]] = $row[1];
        }
        return $assoc;
    } catch (PDOException $exc) {
        return false;
    }
}

function PDO_Execute($query, $params = null) {
    try {
        global $PDO;
        if (isset($params)) {
            $stmt = $PDO->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } else {
            return $PDO->query($query);
        }
    } catch (PDOException $exc) {
        return false;
    }
}

function PDO_LastInsertId() {
    try {
        global $PDO;
        return $PDO->lastInsertId();
    } catch (PDOException $exc) {
        return false;
    }
}

function PDO_ErrorInfo() {
    try {
        global $PDO;
        return $PDO->errorInfo();
    } catch (PDOException $exc) {
        return false;
    }
}

function isSuccessQuery($stmt) {
    try {
        $isTrue = (!$stmt || ($stmt && $stmt->errorCode() != 0)) == false ? true : false;
        return $isTrue;
    } catch (PDOException $exc) {
        return false;
    }
}

?>
