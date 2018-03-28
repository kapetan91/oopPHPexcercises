<?php

class Grad {
   public $ime;

   public function __construct($ime)
   {
       $this->ime = $ime;
   }
}

class Igrac {
   public $ime;
   public $prezime;
   public $pozicija;

   public function __construct($ime, $prezime, $pozicija)
   {
       $this->ime = $ime;
       $this->prezime = $prezime;
       $this->pozicija = $pozicija;
   }
}

class Klub {
   public $ime;
   public $grad;
   public $datum_osnivanja;
   public $igraci = [];

   public function __construct($ime, $grad, $datum_osnivanja)
   {
       $this->ime = $ime;
       $this->grad = $grad;
       $this->datum_osnivanja = $datum_osnivanja;
   }

   public function dodajIgraca($noviIgrac)
   {
       $this->igraci[] = $noviIgrac;
   }
}

$sakremento = new Grad('Sakremento');
$kings = new Klub('Kings', $sakremento, '1951');
$bogdanBogdanovic = new Igrac('Bogdan', 'Bogdanovic', 'bek');
$vinsKarter = new Igrac('Vins', 'Karter', 'krilo');

$kings->dodajIgraca($bogdanBogdanovic);
$kings->dodajIgraca($vinsKarter);

var_dump($kings);
