<?php
namespace TrabajoSube;

class TiempoFalso implements TiempoInterface{
    
    private $tiempo;
    
    public function __construct($inicio = 0){
        $this->tiempo = $inicio;
    }

    public function avanzar($segundos){
        $this->tiempo += $segundos;
    }

    public function time(){
        return $this->tiempo;
    }
}