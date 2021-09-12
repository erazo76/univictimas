<?php
require_once '../php-activerecord/ActiveRecord.php';

// initialize ActiveRecord
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('../models/');
    $cfg->set_connections(array('development' => 'pgsql://postgres:postgresbd2021@127.0.0.1/univictimas_prd'));
});

//ActiveRecord\Config::Config::instance();
?>
