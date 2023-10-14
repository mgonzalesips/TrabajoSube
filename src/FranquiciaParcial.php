<?php

namespace TrabajoSube;

class FranquiciaParcial extends Tarjeta{
    
    public function __construct(){
        Tarjeta::__construct();
        $this->ultimopago = 0;
        $this->cantboletos = 4;
        $this->dia = date("d", time());
    }
    
    public function renovarBoletos(){
        if($this->dia != date("d", time())){
            $this->cantboletos = 4;
        }
    }
    public $dia;
    public $ultimopago;
    public $cantboletos;



}