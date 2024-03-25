<?php

class Torneo {
    public $nome;
    public $codice;
    public $data;
    public $sede;
    public $elenco_di_partite;

    public function __construct($nome, $codice, $data, $sede, $elenco_di_partite) {
        $this->nome = $nome;
        $this->codice = $codice;
        $this->data = $data;
        $this->sede = $sede;
        $this->elenco_di_partite = $elenco_di_partite;
    }
}
?>
