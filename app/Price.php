<?php 
    namespace App;

    class Price {
        // public $value;
        // public $currency;

        public function __construct(){
            $this->value = $value;
            $this->currency = $currency;
        }
       
        public function __set($propr_name, $propr_value){ 
            $this->$propr_name  = $propr_value;        
        }
        public function __get($propr_name){
            return $this->$propr_name;        
        }
    }