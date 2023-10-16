<?php
namespace TrabajoSube;

class Colectivo{
    
    public $linea;
    public $costo = 120;
    public $tiempo;

    public function __construct($linea, $tiempo = null){
        $this->linea = $linea;
        $this->tiempo = ($tiempo !== null) ? $tiempo : new Tiempo();
    }

    public function getLinea(){
        return $this->linea;
    }

    public function chequeoMedio($tarjeta){
        $tarjeta->renovarBoletos($this->tiempo->time());
        
        if($tarjeta->hayBoletos()){
            if($tarjeta->pasoDelTiempo($this->tiempo->time())){ 
                return true;
            }
            else{
                return false;
            } 
        }
        else{
            return false;
        } 
    }

    public function chequeoCompleto($tarjeta){
        $tarjeta->renovarBoletos($this->tiempo->time());
        return ($tarjeta->hayBoletos());
    }
    /*
        El argumento $contemplo_beneficio es equivalente a cuando el conductor del colectivo presiona el botón
        para cobrar el boleto teniendo en cuenta el beneficio o la franquicia de la tarjeta. De esta forma si una persona
        que ya uso su medio boleto quiere pagar de vuelta un medio boleto ($contemplo_beneficio = true) se arrojará un error.
        Sin embargo si la persona quiere pagar un boleto normal ($conemtplo_beneficio = false) podrá hacerlo descontándosele 
        el valor completo del boleto.
    */

    public function pagarCon($tarjeta, $contemplo_beneficio = false){
        if($tarjeta instanceof FranquiciaParcial && $contemplo_beneficio){
            if($this->chequeoMedio($tarjeta)){
                $nuevosaldo = $tarjeta->saldo - $this->costo/2;
                if($nuevosaldo >= $tarjeta->minsaldo){
                    $tarjeta->ultimopago = $this->tiempo->time();
                    $tarjeta->cantboletos--;
                }
            }
            else{
                return false;
            }
        }
        /*--------------------------------------------------------------------------------*/
        else if($tarjeta instanceof FranquiciaCompleta){
            if($this->chequeoCompleto($tarjeta)){
                $nuevosaldo = $tarjeta->saldo;
                $tarjeta->cantboletos--;
            }
            else{
                $nuevosaldo = $tarjeta->saldo - $this->costo;
            }
        }
        /*--------------------------------------------------------------------------------*/

        else{
            $nuevosaldo = $tarjeta->saldo - $this->costo;
        }
        /*--------------------------------------------------------------------------------*/
        
        if ($nuevosaldo >= $tarjeta->minsaldo){
            $diff = $tarjeta->saldo - $nuevosaldo; 
            if($tarjeta->excedente > 0){
                $nuevosaldo = min($tarjeta->maxsaldo, $tarjeta->excedente + $nuevosaldo);
                $tarjeta->excedente = max($tarjeta->excedente - $diff, 0);
                
            }
            $tarjeta->saldo = $nuevosaldo;
            return new Boleto($this->costo, $tarjeta->saldo, $this->linea, $tarjeta->id, time(), get_class($tarjeta));
        }
        else{
            echo "Saldo insuficiente\n"; 
            return false;
        }
    }

}
