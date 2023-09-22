<?php 
    namespace TrabajoSube;
    class Tarjeta{
        protected $saldo = 0;
    

    public function __construct($saldo=0){
        $this->saldo = $saldo;
    }

    public function getSaldo(){
        return $this->saldo;
    }
}
