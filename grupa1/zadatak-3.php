<?php

class Racun {
   public $brojRacuna;
   private $banka;
   private $vlasnik;
   private $stanje;

   public function __construct($brojRacuna, $banka, $vlasnik, $stanje)
   {
       $this->brojRacuna = $brojRacuna;
       $this->banka = $banka;
       $this->vlasnik = $vlasnik;
       $this->stanje = $stanje;
   }
}

class Banka {
   public $ime;
   private $racuni = [];

   public function __construct($ime)
   {
       $this->ime = $ime;
   }

   public function dodajRacun($imeVlasnika, $pocetnoStanje, $brojRacuna)
   {
       $noviRacun = new Racun($brojRacuna, $this, $imeVlasnika, $pocetnoStanje);
       $this->racuni[] = $noviRacun;
       return $noviRacun;
   }
}

$bankaIntesa = new Banka("Banka Intesa");
$bankaIntesa->dodajRacun('Marko Markovic', 0, 11111);
$bankaIntesa->dodajRacun('Dejan Dejanovic', 10, 22222);
$bankaIntesa->dodajRacun('Milos Milosevic', 20, 33333);

var_dump($bankaIntesa);
