<?php


function dbconnect() {
     $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=classicmodels',
            'DB_USER' => 'web_user',
            'DB_PASSWORD' => 'web_password'
        );

    try {
        /* Create a Database connection and 
         * save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        $db = null;
        $message = $ex->getMessage();
        exit();
    }

    //var_dump($db);
    return $db;
}


?>