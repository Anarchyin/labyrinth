<?php
class News{

    private $servername = "localhost";
    private $username = "test127";
    private $password = "7tT8sIPN";
    private $dbname = "testdb";
    //private $TableName = "test";
    protected $connect;


    function __construct() {


        //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->connect = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        $this->create();
        //$this->fill();

    }

    private function create(){
        $TableName = "News";
        //$this->connect->query("DROP TABLE IF EXISTS $TableName");
        $this->connect->query("CREATE TABLE IF NOT EXISTS $TableName(
			id INT(10) UNSIGNED	AUTO_INCREMENT	PRIMARY KEY,
			Header VARCHAR(255) NOT NULL,
			Announce VARCHAR(255),
			Main_Text TEXT,
			Tags VARCHAR(255),
			Publication_Date VARCHAR(32)
			)");
    }

    function addNews($arnews){
        $TableName = "News";


            $this->connect->query("INSERT INTO $TableName (Header, Announce, Main_Text, Tags, Publication_Date) VALUES ('".$arnews['Header']."', '".$arnews['Announce']."', '".$arnews['Main_Text']."', '".$arnews['Tags']."', '".date('d.m.Y H:i:s')."')");
    }

    function deleteNews($id){
        $TableName = "News";

        $this->connect->query("DELETE FROM $TableName
                                        WHERE id = $id
                                    ");
    }

    function getHeader($id){
        $TableName = "News";
        $result = $this->connect->query("SELECT Header FROM $TableName
								   WHERE id = $id;
								  ");
        if($row = $result->fetch_assoc()){
            return $row['Header'];
        }

    }

    function getAnnounce($id){
        $TableName = "News";
        $result = $this->connect->query("SELECT Announce FROM $TableName
								   WHERE id = $id;
								  ");
        if($row = $result->fetch_assoc()){
            return $row['Announce'];
        }

    }

    function getMain_Text($id){
        $TableName = "News";
        $result = $this->connect->query("SELECT Main_Text FROM $TableName
								   WHERE id = $id;
								  ");
        if($row = $result->fetch_assoc()){
            return $row['Main_Text'];
        }

    }

    function getTags($id){
        $TableName = "News";
        $result = $this->connect->query("SELECT Tags FROM $TableName
								   WHERE id = $id;
								  ");
        if($row = $result->fetch_assoc()){
            return $row['Tags'];
        }

    }

    function getPublication_Date($id){
        $TableName = "News";
        $result = $this->connect->query("SELECT Publication_Date FROM $TableName
								   WHERE id = $id;
								  ");
        if($row = $result->fetch_assoc()){
            return $row['Publication_Date'];
        }
    }

    function setTags($id, $newTag){
        $TableName = "News";

        $this->connect->query("UPDATE $TableName SET Tags='$newTag' WHERE id = '$id'");

    }

    function setMain_Text($id, $newText){
        $TableName = "News";

        $this->connect->query("UPDATE $TableName SET Main_Text='$newText' WHERE id = '$id'");

    }

    function setAnnounce($id, $newAnnounce){
        $TableName = "News";

        $this->connect->query("UPDATE $TableName SET Announce='$newAnnounce' WHERE id = '$id'");

    }

    function setHeader($id, $newHeader){
        $TableName = "News";

        $this->connect->query("UPDATE $TableName SET Header='$newHeader' WHERE id = '$id'");

    }

    function getId(){
        $TableName = "News";


    }
//
    function extractNews($key){
        $TableName = "News";
        $match = [];

        $result = $this->connect->query("SELECT * FROM $TableName
								   WHERE id = '$key' OR Header LIKE '%$key%';
								  ");
        while ($row = $result->fetch_assoc()) {
            $match[] = ['id' => (int)$row['id'], 'Header' => (string)$row['Header'], 'Announce' => (string)$row['Announce'], 'Main_Text' => (string)$row['Main_Text'], 'Tags' => (string)$row['Tags'], 'Publication_Date' => (string)$row['Publication_Date']];
        }
    return $match;
    }

}