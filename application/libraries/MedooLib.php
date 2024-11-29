<?php
Use Medoo\Medoo;

class MedooLib {

    protected $database;

    public function __construct() {
    
        $this->database = new Medoo([
            'type' => 'mysql',
            'host' => 'localhost',
            'database' => 'Landing_pventa',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf8',
            'option'        => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        ]);}
        
        public function getInstance() {
            return $this->database;
        }
}
?>