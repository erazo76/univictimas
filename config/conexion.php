<?php
require_once '../php-activerecord/ActiveRecord.php';

// initialize ActiveRecord
ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('../models/');
    $cfg->set_connections(array('development' => 'pgsql://postgres:postgres@127.0.0.1/univictimas_qas'));
});

//ActiveRecord\Config::Config::instance();
?>
