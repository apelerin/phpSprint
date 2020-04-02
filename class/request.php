<?php

class request
{

    private $_user;
    private $_pwd;
    private $_dbName;
    private $_dbType;
    private $_dbAdress;
    private $_bdd;

    /**
     * Method constructor to create a connection
     * to our database
     * @param $user string username of phpmyadmin
     * @param $pwd string password of user of phpmyadmin
     * @param $dbname string name of the database we want to connect to
     * @param $dbtype string indicate the type of database we use (mysql, postgresql, sqlite...)
     * @param $dbadress string  ip adresse to which we access the database, in our case 127.0.0.1 or localhost
     */
    public function __construct($user, $pwd, $dbname, $dbtype, $dbadress)
    {
        $this->_user = $user;
        $this->_pwd = $pwd;
        $this->_dbName = $dbname;
        $this->_dbType = $dbtype;
        $this->_dbAdress = $dbadress;

        $this->connectDB();
    }

    /**
     * Method to connect to the database via a DBO object
     */
    private function connectDB()
    {
        try {
            if ($this->_bdd === null) {
                $dsn = $this->_dbType . ':dbname=' . $this->_dbName . ';host=' . $this->_dbAdress;
                $this->_bdd = new PDO($dsn, $this->_user, $this->_pwd);
            }

        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            die();
        }
    }

    /**
     * @param $table string table from which we want the rows
     * @param $columns string columns we want to have
     * @return an array containing the rows
     */
    public function getAllRows($table, $columns)
    {
        $req = "SELECT " . $columns . " FROM " . $table;
        $this->_bdd->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $this->_bdd->query($req);
    }

    public function getUserbyId($id) {
        $req = "SELECT * FROM users WHERE id = " . $id . ";";
        return $this->_bdd->query($req);
    }

    /**
     * @param $table string table in which we want to insert stuff.
     * @param $columns table columns in which we want to fill
     */
    public function insertInTable($table, $columns) {
        $req = "INSERT INTO " . $table . " VALUES (NULL, ";
        foreach ($columns as $col) {
            $req = $req . "'" . $col . "'" . ",";
        }
        $req = rtrim($req, ",");
        $req = $req . ");";
        $this->_bdd->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->_bdd->query($req);
    }

    public function updateUser($data) {
        $req = "UPDATE users 
        set first_name = '" . $data["first_name"] . "',
        last_name = '" . $data["last_name"] . "',
        gender = '" . $data["gender"] . "',
        mail = '" . $data["mail"] . "',
        zip_code = " . $data["zip_code"] . ",
        birthday = " . $data["birthday"] . "
        WHERE id = " . $data['id'] . ";";
        echo $req;
        $this->_bdd->exec($req);
    }

    /**
     * display all users in database in a html table
     */
    public function displayTabUsers() {
        $tab = $this->getAllRows("users", "*");
        $even = true;
        echo "<table id='user-table'>";
        foreach ($tab as $row) {
            if ($even) {
                echo "<tr class='tr-even'>";
                $even = false;
            }
            else {
                echo "<tr class='tr-uneven'>";
                $even = true;
            }
            foreach ($row as $col) {
                echo "<td>";
                echo "$col";
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    /**
     * use all user in database to fill a dropdown menu
     */
    public function fillDropDown(){
        $tab = $this->getAllRows("users", "id, first_name, last_name");
        foreach ($tab as $row) {
            autoForm::formOption($row);
        }
    }
}