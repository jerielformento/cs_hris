<?php 

/* ---------------------------------------------------*
*		-- classes and functions declaration --		  |
*-----------------------------------------------------|
*													  |
*													  |
*													  |
*													  |
*													  |
*													  |
*													  |
*													  |
*													  |
* ----------------------------------------------------*/

require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/* -- configuration -- */
require '../config/config.php';


/* -- model & database -- */
require '../model/Database.php';
require '../model/Model.php';


/* -- main controller / other classes-- */
require '../system/Session.php';
require '../system/REJController.php';


/* -- App -- */
require '../view/App.php';

/* -- system run -- */
$ui = new App( $app );