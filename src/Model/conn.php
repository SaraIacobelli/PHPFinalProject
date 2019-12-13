
<?php
//è una classe quindi se voglio usarla nelle arte cartelle basta che la includo con il path Include
class PDO_mysql extends Dbconfig    {

public $conn;
public $dataSet;
private $stmt;

protected $dsn;
protected $user;
protected $password;

function Mysql() {
    $this -> conn = NULL;
    $this -> stmt = NULL;
    $this -> dataSet = NULL;

            $dbPara = new Dbconfig();
            $this -> dsn = $dbPara -> conn;
            $this -> user = $dbPara -> user;
            $this -> password = $dbPara -> password;
            $dbPara = NULL;
}

function dbConnect() {
    try {
        $this -> conn = new PDO($this->dsn, $this->user, $this->password);
        $connectionString->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo connection successfully
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

    return $this -> conn;
}

function dbDisconnect() {
    $this -> conn = NULL;
    $this -> stmt = NULL;
    $this -> dataSet = NULL;

    $this -> dsn = NULL;
    $this -> user = NULL;
    $this -> password = NULL;
}

//FUNZIONI PER LE QUERY --------------------------------

function selectAll($tableName) {
    $stmt = $conn->prepare('SELECT * FROM '.$tableName);
    $stmt->execute();
    $dataSet = $stmt->fetchAll();
    return $dataSet;
}

function selectWhere($tableName,$rowName,$operator,$value,$valueType)  {
    //$stmt = $conn->prepare('SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ');
    $stmt = $conn->prepare('SELECT * FROM ? WHERE ? ? ?');

    $stmt -> bindParam(1,$tableName,PDO::PARAM_STR);
    $stmt -> bindParam(2,$rowName,PDO::PARAM_STR);
    $stmt -> bindParam(3,$operator,PDO::PARAM_STR);

    //Value to search
    if($valueType == 'int') {
        $stmt->bindParam(4,$value,PDO::PARAM_INT);
    }
    else if($valueType == 'char')   {
        $stmt->bindParam(4,$value,PDO::PARAM_STR);
    }
    $stmt->execute();

    $dataSet = $stmt->fetchAll();
    return $dataSet;
}

function insertInto($tableName,$values) {

    #$this -> sqlQuery = NULL;
}

/*function selectFreeRun($query)  {
    $this -> dataSet = mysql_query($query,$this -> connectionString);
    return $this -> dataSet;
}

function freeRun($query)    {
    return mysql_query($query,$this -> connectionString);
  }*/
  
}
?>