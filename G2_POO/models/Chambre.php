<?php
Class Chambre{
    
    private $_numero;
    private $_numeroBatiment;
    private $_type;


    public function __construct($data){
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value) {
          $method = "set".ucfirst($key);
          if(method_exists($this , $method)){
            $this->$method($value);
          }
        }
    }

    private function VerifyNumero($numero){
        if(preg_match("#^[0-9]{3}\_[0-9]{4}$#",$numero)){
            return true;
        }else{
            echo "Probleme verify";
        }
    }
    private function VerifyNumeroBat($numero){
        if(preg_match("#^[0-9]{3}$#",$numero)){
            return true;
        }
    }

    //Accesseur ou GETTERS
    public function getNumero(){
        return $this->_numero;
    }
    public function getNumeroBatiment(){
        return $this->_numeroBatiment;
    }
    public function getType(){
        return $this->_type;
    }

    //Mutateur ou SETTERS
    public function setNumero($numero){
        if($this->VerifyNumero($numero)){
            $this->_numero = $numero;
     }
    }
    public function setNumeroBatiment($numeroBatiment){
        if($this->VerifyNumeroBat($numeroBatiment)){
        $this->_numeroBatiment = $numeroBatiment;
        }else{
            echo "Probleme verifyBat";
        }
    }
    public function setType($type){
        if (($type=='Binome' || $type=='individuel')){
            $this->_type = $type;
        }else{
            echo "Probleme Type";
        }
    }



}