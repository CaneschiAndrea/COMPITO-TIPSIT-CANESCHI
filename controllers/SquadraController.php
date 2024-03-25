<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once __DIR__ . '/../src/Squadra.php';



class SquadraController

{
    public function getSquadre(Request $request, Response $response, $args) {
        $squadre = array(
            new Squadra(1, "Juventus", "Bianconero", "maschile"),
            new Squadra(2, "Milan", "Rossonero", "maschile"),
            new Squadra(3, "Inter", "Nerazzurro", "maschile"),
            new Squadra(4, "Roma", "Giallorosso", "maschile"),
        );
        
        $response->getBody()->write(json_encode($squadre));
        return $response->withHeader('Content-Type', 'application/json');
    }


    public function getSquadra(Request $request, Response $response, $args) {
        $id = $args['id'];
        $squadra = new Squadra($id, 'Squadra ' . $id, 'Rosso', 'Maschile');
        
        $response->getBody()->write(json_encode($squadra));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
?>
