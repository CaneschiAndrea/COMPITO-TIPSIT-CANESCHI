<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/controllers/SquadraController.php';
require_once __DIR__ . '/controllers/TorneoController.php';
require_once __DIR__ . '/controllers/PartitaController.php';

$app = AppFactory::create();



$app->get('/torneo/{codice}', 'TorneoController:getTorneo'); 
$app->get('/squadre', 'SquadraController:getSquadre'); 
$app->get('/squadre/{id}', 'SquadraController:getSquadra');
$app->get('/torneo/{codice}/partite/disputate', 'TorneoController:getPartiteDisputate');
$app->get('/torneo/{codice}/partite/{id_partita}', 'PartitaController:getPartite');
$app->get('/torneo/{codice}/concluso', 'TorneoController:partiteGiocate');
$app->get('/torneo/{codice}/classifica', 'TorneoController:getClassifica');





$app->addErrorMiddleware(true, true, true);

$app->run();
