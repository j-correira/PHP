<?php

function getDatabase() {
    $config = array (
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_001248229',
            'DB_USER' => 'se266_001248229',
            'DB_PASSWORD' => '001248229'
    );
    
    $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    return $db;
}
$db = getDatabase();
//print_r ($db);

?>
