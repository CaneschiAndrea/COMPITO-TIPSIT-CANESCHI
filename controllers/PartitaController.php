<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once __DIR__ . '/../src/Partita.php';

class PartitaController {
    public function getPartite(Request $request, Response $response, $args) {
        $codice = $args['codice'];
        $id_partita = isset($args['id_partita']) ? $args['id_partita'] : null;

        $elenco_di_partite = [
            "A001" => [
                new Partita(1, 'Squadra A', 'Squadra B', 2, 1),
                new Partita(2, 'Squadra C', 'Squadra D', 0, 2),
            ],
            "B001" => [
                new Partita(3, 'Squadra E', 'Squadra F', 2, 1),
                new Partita(4, 'Squadra G', 'Squadra H', 0, 2),
            ]
        ];
    
        if (isset($elenco_di_partite[$codice])) {
            if ($id_partita !== null) {
                foreach ($elenco_di_partite[$codice] as $partita) {
                    if ($partita->getId() == $id_partita) {
                        $response->getBody()->write(json_encode($partita));
                        return $response->withHeader('Content-Type', 'application/json');
                    }
                }
                $response->getBody()->write(json_encode(["error" => "Partita non trovata"]));
                return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
            } else {
                $response->getBody()->write(json_encode($elenco_di_partite[$codice]));
                return $response->withHeader('Content-Type', 'application/json');
            }
        } else {
            $response->getBody()->write(json_encode(["error" => "Torneo non trovato"]));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
    }
}
?>
