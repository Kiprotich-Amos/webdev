<?php
    /*
     *
     * Creating a database class
     *
    */
    class DbConnection{
        private $con;

        public function __construct($serverName, $dbName, $userName, $password)
        {
            try {
                $this->con = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function getConnection()
        {
            return $this->con;
        }

        public function isConnected()
        {
            return $this->con !== null;
        }
    }
?>
