<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once __DIR__ . '/../src/Torneo.php';


class TorneoController
{
    public function getTorneo(Request $request, Response $response, $args) {
        $codice = $args['codice'];
        
        $tornei = [
            "A001" => new Torneo("Serie A", "A001", "2024-04-01", "Stadio San Siro", []),
            "B001" => new Torneo("Coppa Italia", "B001", "2024-05-01", "Stadio Olimpico", []),
        ];

        if (isset($tornei[$codice])) {
            $torneo = $tornei[$codice];
            $response->getBody()->write(json_encode($torneo));
            return $response->withHeader('Content-Type', 'application/json');
        } else {
            $response->getBody()->write(json_encode(["error" => "Torneo non trovato"]));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
    }

    public function getPartiteDisputate(Request $request, Response $response, $args) {
        $codice = $args['codice'];
        $partitaController = new PartitaController(); 
        $response = $partitaController->getPartite($request, $response, $args); 
        return $response;
    }
    
    public function partiteGiocate(Request $request, Response $response, $args) {
        $codice = $args['codice'];
        
        $elenco_di_partite = [
            "A001" => [
                new Partita(1, 'Juventus', 'Inter', 2, 1),
                new Partita(2, 'Inter', 'Milan', 0, 1),
                new Partita(3, 'Juventus', 'Milan', 3, 2),
            ],
            "B001" => [
                new Partita(4, 'Roma', 'Napoli', 1, 1),
                new Partita(5, 'Roma', 'Lazio', 2, 0),
            ]
        ];
        
        if (isset($elenco_di_partite[$codice])) {
            foreach ($elenco_di_partite[$codice] as $partita) {
                if ($partita->getGoalsSquadra1() === null || $partita->getGoalsSquadra2() === null) {
                    $response->getBody()->write(json_encode(false));
                    return $response->withHeader('Content-Type', 'application/json');
                }
            }
            $response->getBody()->write("Tutte le partite sono state giocate");
            return $response->withHeader('Content-Type', 'text/plain');
        } else {
            $response->getBody()->write(json_encode(["error" => "Torneo non trovato"]));
            return $response->withStatus(404)->withHeader('Content-Type', 'application/json');
        }
    }

    public function getClassifica(Request $request, Response $response, $args)
    {
        $codice = $args['codice'];

        $elenco_di_partite = [
            "A001" => [
                new Partita(1, 'Juventus', 'Inter', 2, 1),
                new Partita(2, 'Inter', 'Milan', 0, 1),
                new Partita(3, 'Juventus', 'Milan', 3, 2),
            ],
            "B001" => [
                new Partita(4, 'Roma', 'Napoli', 1, 1),
                new Partita(5, 'Roma', 'Lazio', 2, 0),
            ]
        ];

        $punteggi = [];

        foreach ($elenco_di_partite[$codice] as $partita) {
            if (!isset($punteggi[$partita->getSquadra1()])) {
                $punteggi[$partita->getSquadra1()] = 0;
            }
            $punteggi[$partita->getSquadra1()] += $partita->getGoalsSquadra1();

            if (!isset($punteggi[$partita->getSquadra2()])) {
                $punteggi[$partita->getSquadra2()] = 0;
            }
            $punteggi[$partita->getSquadra2()] += $partita->getGoalsSquadra2();
        }

        arsort($punteggi);

        $response->getBody()->write(json_encode($punteggi));
        return $response->withHeader('Content-Type', 'application/json');
    }

 
}

?>