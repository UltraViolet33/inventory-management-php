<?php

/**
 * Databse.php
 * Manage the connexion to the database
 * @author Ulysse Valdenaire
 * 19/01/2022
 */
?>

<?php
/**
 * Database
 */
class Database
{
    protected $host;
    protected $dbname;
    protected $user;
    protected $dbpassword;


    /**
     * setDatabase
     *
     * @param  string $host
     * @param  string $dbname
     * @param  string $user
     * @param  string $dbpassword
     * @return void
     */
    public function setDatabase($host = "localhost", $dbname = "productsgestion", $user = "root", $dbpassword = "")
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->dbpassword = $dbpassword;
    }

    /**
     * dbConnect
     * connexion to the database bookgestion
     * @return object $db
     */
    public function dbConnect()
    {
        try {
            $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->user, $this->dbpassword);
            echo "Connexion à la base OK<br>";
            return $db;
        } catch (Exception $e) {
            echo "Conexion to the database failed";
            die('Erreur : ' . $e->getMessage());
        }
    }
}


 $testDB = new Database();
 $testDB->setDatabase();
 $testDB->dbConnect();