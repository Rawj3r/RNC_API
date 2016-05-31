<?php

/**
 * Created by IntelliJ IDEA.
 * User: RN Nkosi
 * Date: 5/30/16
 * Time: 5:04 PM
 */

class DB{

    // encapsulate our data
    private $con;
    private $host;
    private $user;
    private $pass;
    private $database;
    private $port;

    public function __construct(){

        $this->con = false;
        $this->host = 'localhost'; // host name
        $this->user = 'nkosixll_roger'; // username
        $this->pass = 'rogernkosi@1991'; // password
        $this->database = 'nkosixll_DB_TECHEDGE'; // database
        $this->port =  '3306';
        $this->connect();
    }

    public function __destruct(){
        // TODO: Implement __destruct() method.

        // disconnect to our DB once we longer have the instance of the parant class in scope
        $this->disconnect();

    }

    public function connect(){
        // TODO: connect to our DB

        // test if we have an open connection
        if(!$this->con){

            // try to open a connection to our mysql database
            try{

                // construct our connection
                $this->con = mysqli_connect($this->host, $this->user, $this->pass, $this->database, $this->port);

                // catch any exceptions
            }catch(Exception $ex){

                // kill the processing of our script and display the exception
                die($ex->getMessage());
            }
        }

        // return our connection object
        return $this->con;
    }

    public function disconnect(){

        if($this->con){
            $this->con = NULL;
        }
    }
}

new DB();