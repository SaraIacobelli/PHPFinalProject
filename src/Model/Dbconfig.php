<?php
class Dbconfig {
    protected $dsn;
    protected $user;
    protected $password;

    function Dbconfig() {
        $this -> dsn = 'mysql:dbname=Newspaper;host=localhost';
        $this -> user = 'phpProject';
        $this -> password = 'phpPro9?';
    }
}
?>