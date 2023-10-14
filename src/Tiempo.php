<?php

namespace TrabajoSube;

interface TiempoInterface{
    public function time();
}

class Tiempo implements TiempoInterface{

    public function time(){
        return time();
    }
}

class TiempoFalso implements TiempoInterface{
    
    protected $tiempo;
    
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