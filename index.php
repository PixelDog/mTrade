<?php
$f3 = require('vendor/bcosca/fatfree/lib/base.php');

// $f3->set('AUTOLOAD','classes/');
$f3->config('config/config.ini');
$f3->config('config/routes.ini');	
// $f3->route('GET /', 'HomePage->display');
// $f3->route('POST /trade','HomePage->trade');



/*
$f3->route('GET /',
    function() {
        echo 'Hello, world!';
    }
);

class WebPage {
    function display() {
        echo 'I cannot object to an object';
    }
}
$f3->route('GET /about','WebPage->display');
*/



$f3->run();