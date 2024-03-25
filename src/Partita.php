<?php

class Partita {
    public $id;
    public $squadra_1;
    public $squadra_2;
    public $goals_squadra_1;
    public $goals_squadra_2;

    public function __construct($id, $squadra_1, $squadra_2, $goals_squadra_1, $goals_squadra_2) {
        $this->id = $id;
        $this->squadra_1 = $squadra_1;
        $this->squadra_2 = $squadra_2;
        $this->goals_squadra_1 = $goals_squadra_1;
        $this->goals_squadra_2 = $goals_squadra_2;
    }

    public function getId() {
        return $this->id;
    }

    public function getGoalsSquadra1() {
        return $this->goals_squadra_1;
    }

    public function getGoalsSquadra2() {
        return $this->goals_squadra_2;
    }

    public function getSquadra1() {
        return $this->squadra_1;
    }

    public function getSquadra2() {
        return $this->squadra_2;
    }
}

?>
