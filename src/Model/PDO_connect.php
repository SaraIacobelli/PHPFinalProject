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

public function selectCol($table, array $columns){
	
	$n=count($columns);
	$col="";
	
	for ($i=0; $i<$n; $i++)
	{
		if($i==$n-1)
			$col=$col.$columns[$i];
		else
			$col=$col.$columns[$i].", ";
	}
	
    $this->stmt = $this->conn->prepare('SELECT '.$col.' FROM '.$table);
    $this->stmt -> execute();
    $this->dataSet = $this->stmt -> fetchAll();
    return $this->dataSet;
}

/**
 * funzione(table, [condizioni])
 * SELECT * FROM table WHERE [condizioni]
 * array => risultato del fetchAll()
 */
public function selectWhere($tableName,$conditions ,array $parameter)  {
    
    $this->stmt = $this->conn->prepare('SELECT * FROM '.$tableName.' WHERE '.$conditions);

	$this->stmt -> execute($parameter);

    $this->dataSet = $this->stmt -> fetchAll();
    return $this->dataSet;
}

/**
 * funzione(table, [campi], [condizioni])
 * SELECT [campi] FROM table WHERE [condizioni]
 * array => risultato del fetchAll()
 */
public function selectColumnWhere($tableName, array $columns, $conditions ,array $parameter)  {
    
    $n=count($columns);
	$col="";
	
	
	for ($i=0; $i<$n; $i++)
	{
		if($i==$n-1)
			$col=$col.$columns[$i];
		else
			$col=$col.$columns[$i].", ";
	}

	$this->stmt = $this->conn->prepare('SELECT '.$col.' FROM '.$tableName.' WHERE '.$conditions);
	
    $this->stmt -> execute($parameter);
	
	//print_r ($this->stmt ->debugDumpParams());

    $this->dataSet = $this->stmt ->fetchAll();
 
	return $this->dataSet;
}

/**
 * funzione(table, [colonne], [valori])
 * INSERT INTO table ([colonne]) VALUES [valori]
 * boolean => risultato dell’execute()
 */

public function insert($tableName, array $columns, array $values, array $parameter){
	
	$n=count($columns);
	$col="";

	for ($i=0; $i<$n; $i++)
	{
		if($i==$n-1)
			$col=$col.$columns[$i];
		else
			$col=$col.$columns[$i].", ";
	}

	$m=count($values);
	$val="";

	for ($i=0; $i<$m; $i++)
	{
		if($i==$m-1)
			$val=$val.$values[$i];
		else
			$val=$val.$values[$i].", ";
	}

    $this->stmt = $this->conn->prepare('INSERT INTO '.$tableName.'('.$col.') VALUES ('.$val.')');
    $result = $this->stmt -> execute($parameter);
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
public function updateTable($tableName, array $columns, array $values, $conditions, array $parameter){
    
	$n=count($columns);
	$query="UPDATE ".$tableName." SET ";
	
	for ($i=0; $i<$n; $i++)
	{
		if($i==$n-1)
			$query=$query.$columns[$i]."=".$values[$i];
		else
			$query=$query.$columns[$i]."=".$values[$i].", ";
	}
	
	$query = $query." WHERE ".$conditions;
	
	$this->stmt = $this->conn->prepare($query);
    $result = $this->stmt -> execute($parameter);
    if($result){return true;}
    else {return false;}
}
/****************************END ??????????????????******************** */

/**
 * funzione(tabella, [condizioni])
 * DELETE FROM table WHERE [condizioni]
 * boolean => risultato dell’execute()
 */

public function delete($tableName,$conditions, array $parameter){
    $this->stmt = $this->conn->prepare('DELETE FROM '.$tableName.' WHERE '.$conditions);
    $result = $this->stmt -> execute($parameter);
    if($result){return true;}
    else {return false;}
}

//query generica
public function query($query, array $parameter){
    $this->stmt = $this->conn->prepare($query);
    $this->stmt -> execute($parameter);

    $this->dataSet = $this->stmt -> fetchAll();

    return $this->dataSet;
}

}
?>