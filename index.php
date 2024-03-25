<?php

use Slim\Factory\AppFactory;
use Slim\Psr7\Response;
use Slim\Psr7\Request;

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

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Benvenuto su questa applicazione!");
    return $response;
});



$app->addErrorMiddleware(true, true, true);

$app->run();
