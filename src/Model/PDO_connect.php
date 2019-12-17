<?php
namespace SimpleMVC\Model;

class PDO_connect{
	private $conn;
	private $dataSet;
	private $stmt;

	public function __construct(\PDO $pdo){
		$this->conn = $pdo;
	}

public function dbDisconnect() {
    $this -> conn = NULL;
    $this -> stmt = NULL;
    $this -> dataSet = NULL;
    echo('Disconnected!');
}

//FUNZIONI PER LE QUERY --------------------------------

/*
 * funzione(table)
 * SELECT * FROM table
 * array => risultato del fetchAll()
 */
public function selectAll($tableName) {
    $this->stmt = $this->conn->prepare('SELECT * FROM '.$tableName);
    $this->stmt->execute();
    $this->dataSet = $this->stmt->fetchAll();
    return $this->dataSet;
}

/**
 * funzione(table, [campi])
 * SELECT [campi] FROM table
 * array => risultato del fetchAll()
 */

public function selectCol($table, $columns){
    $this->stmt = $this->conn->prepare('SELECT '.$columns.' FROM '.$table);
    $this->stmt -> execute();
    $this->dataSet = $this->stmt -> fetchAll();
    return $this->dataSet;
}

/**
 * funzione(table, [condizioni])
 * SELECT * FROM table WHERE [condizioni]
 * array => risultato del fetchAll()
 */
public function selectWhere($tableName,$rowName,$operator,$value)  {
    
    $this->stmt = $this->conn->prepare('SELECT * FROM '.$tableName.' WHERE '.$rowName.$operator.$value);

    $this->stmt -> execute();

    $this->dataSet = $this->stmt -> fetchAll();
    return $this->dataSet;
}

/**
 * funzione(table, [campi], [condizioni])
 * SELECT [campi] FROM table WHERE [condizioni]
 * array => risultato del fetchAll()
 */
public function selectColumnWhere($tableName, $columns, $rowName ,$operator, $value)  {
    
    $this->stmt = $this->conn->prepare('SELECT '.$columns.' FROM '.$tableName.' WHERE '.$rowName.$operator.$value);

    $this->stmt -> execute();

    $this->dataSet = $this->stmt -> fetchAll();
    return $this->dataSet;
}

/**
 * funzione(table, [colonne], [valori])
 * INSERT INTO table ([colonne]) VALUES [valori]
 * boolean => risultato dell’execute()
 */

public function insert($tableName, $columns, $values){
    $this->stmt = $this->conn->prepare('INSERT INTO '.$tableName.'('.$columns.') VALUES ('.$values.')');
    $result = $this->stmt -> execute();
    if($result){return true;}
    else {return false;}
}

/****************************??????????????????******************** */
/**
 * funzione(table, [colonne], [valori], [codizioni])
 * UPDATE table SET colonna1=valore1, colonna2=valore2 WHERE [condizioni]
 * boolean => risultato dell’execute()
 */

 /**
  * function foo(int $a, ...$options) {
  * 
  *  foreach ($options as $value) {
  *  ... 
  *  }
  * }
  */
public function updateTable($tableName, $columns, $values, $conditions){
    //$query = 
    $this->stmt = $this->conn->prepare('UPDATE '.$tableName.' SET ...');
    $result = $this->stmt -> execute();
    if($result){return true;}
    else {return false;}
}
/****************************END ??????????????????******************** */

/**
 * funzione(tabella, [condizioni])
 * DELETE FROM table WHERE [condizioni]
 * boolean => risultato dell’execute()
 */

public function delete($tableName,$conditions){
    $this->stmt = $this->conn->prepare('DELETE FROM '.$tableName.' WHERE '.$conditions);
    $result = $this->stmt -> execute();
    if($result){return true;}
    else {return false;}
}

//E il male assoluto!
public function query($query)  {
    $this->stmt = $this->conn->prepare($query);
    $this->stmt -> execute();

    $this->dataSet = $this->stmt -> fetchAll();

    return $this->dataSet;
}

}
?>