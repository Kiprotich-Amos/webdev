<?php
/**
 * Creating a database class
 */
    require '../utilities/conn.php';

    $dbConnection = new DbConnection("localhost", "testroot", "root", "");
    if ($dbConnection->isConnected()) {
        $pdo = $dbConnection->getConnection();
        
    }
?>
