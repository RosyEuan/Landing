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
            'password' => ''
        ]);}
        
        public function getInstance() {
            return $this->database;
        }
}
?>