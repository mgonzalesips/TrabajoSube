<?php
namespace TrabajoSube;

class Boleto{
    
    public $costo;
    public $saldo_restante;
    public $linea;
    public $fecha;
    public $id;
    public $beneficio;

    public function __construct($costo, $saldo, $linea, $id, $fecha, $beneficio){
        $this->costo = $costo;
        $this->saldo_restante = $saldo;
        $this->linea = $linea;
        $this->fecha = $fecha;
        $this->id = $id;
        $this->beneficio = $beneficio;

        if($this->saldo_restante < 0){
            echo "Se canceló con saldo negativo: " . strval($this->saldo_restante) . "\n";
        }
        else{
            echo "Saldo restante: " . strval($this->saldo_restante) . "\n";
        }
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getSaldoRestante(){
        return $this->saldo_restante;
    }

    public function getID(){
        return $this->id;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getBeneficio(){
        return $this->beneficio;
    }
}

?>