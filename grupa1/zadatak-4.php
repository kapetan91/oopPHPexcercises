<?php

class SimKartica {
   private $brojTelefona;
   private $mreza;

   public function __construct($brojTel)
   {
       $this->brojTelefona = $brojTel;
   }

   public function postaviMrezu($novaMreza)
   {
       $this->mreza = $novaMreza;
   }
}

class MobilnaMreza {
   public $ime;
   private $sveSimKartice = [];

   public function __construct($ime)
   {
       $this->ime = $ime;
   }

   public function novaSimKartica($brojTelefona)
   {
       $novaKartica = new SimKartica($brojTelefona);
       $novaKartica->postaviMrezu($this);

       $this->sveSimKartice[] = $novaKartica;
       return $novaKartica;
   }
}

$mts = new MobilnaMreza('mts');
$mts->novaSimKartica('0123456');
$mts->novaSimKartica('0456789');

var_dump($mts);
