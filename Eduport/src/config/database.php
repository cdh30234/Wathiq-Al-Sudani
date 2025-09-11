<?php
// Database Configuration
// Path: /config/database.php

// Database settings
$host = 'localhost';
$dbname = 'school_management';
$username = 'root';
$password = '';
$charset = 'utf8mb4';

// PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
];

try {
    // Create PDO connection
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Set timezone to Baghdad
    $pdo->exec("SET time_zone = '+03:00'");
    
} catch (PDOException $e) {
    // Log error (in production, don't display sensitive info)
    error_log("Database Connection Error: " . $e->getMessage());
    
    // Display user-friendly error
    die('خطأ في الاتصال بقاعدة البيانات. يرجى المحاولة لاحقاً.');
}

// Helper function to execute queries safely
function executeQuery($pdo, $sql, $params = []) {
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        error_log("Query Error: " . $e->getMessage());
        throw new Exception('خطأ في تنفيذ الاستعلام');
    }
}

// Helper function to get single row
function getSingleRow($pdo, $sql, $params = []) {
    $stmt = executeQuery($pdo, $sql, $params);
    return $stmt->fetch();
}

// Helper function to get all rows
function getAllRows($pdo, $sql, $params = []) {
    $stmt = executeQuery($pdo, $sql, $params);
    return $stmt->fetchAll();
}

// Helper function to get count
function getCount($pdo, $sql, $params = []) {
    $stmt = executeQuery($pdo, $sql, $params);
    return $stmt->fetchColumn();
}

// Helper function to insert data
function insertData($pdo, $table, $data) {
    $columns = implode(',', array_keys($data));
    $placeholders = ':' . implode(', :', array_keys($data));
    
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    $stmt = executeQuery($pdo, $sql, $data);
    
    return $pdo->lastInsertId();
}

// Helper function to update data
function updateData($pdo, $table, $data, $where, $whereParams = []) {
    $setPairs = [];
    foreach (array_keys($data) as $key) {
        $setPairs[] = "$key = :$key";
    }
    $setClause = implode(', ', $setPairs);
    
    $sql = "UPDATE $table SET $setClause WHERE $where";
    $params = array_merge($data, $whereParams);
    
    return executeQuery($pdo, $sql, $params);
}

// Helper function to delete data
function deleteData($pdo, $table, $where, $whereParams = []) {
    $sql = "DELETE FROM $table WHERE $where";
    return executeQuery($pdo, $sql, $whereParams);
}

?>
