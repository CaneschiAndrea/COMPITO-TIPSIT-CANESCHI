<?php

class Squadra {
    public $id;
    public $nome;
    public $colore;
    public $genere;
    public $categoria;
    public $codice_csen;
    public $p_iva;

    public function __construct($id, $nome, $colore, $genere, $categoria = null, $codice_csen = null, $p_iva = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->colore = $colore;
        $this->genere = $genere;
        $this->categoria = $categoria;
        $this->codice_csen = $codice_csen;
        $this->p_iva = $p_iva;
    }
}
?>
