<?php

abstract class State
{
    abstract public function insertCardAndPin($card, $pin);

    abstract public function inputAmountAndConfirm($amount);

    abstract public function demandCheck();

    public function log($message)
    {
        echo $message . '<br>';
    }
}

class Ready extends State
{
    public function insertCardAndPin($card, $pin)
    {
        parent::log('Allowed to insert card and PIN.');
        return true;
    }

    public function inputAmountAndConfirm($amount)
    {
        parent::log('Not allowed to input amount and confirm on status Ready!');
        return false;
    }

    public function demandCheck()
    {
        parent::log('Not allowed to demand check on status Ready!');
        return false;
    }
}

class Validated extends State
{
    public function insertCardAndPin($card, $pin)
    {
        parent::log('Not allowed to insert card and PIN on status Validated!');
        return false;
    }

    public function inputAmountAndConfirm($amount)
    {
        parent::log('Allowed to input amount and confirm.');
        return true;
    }

    public function demandCheck()
    {
        parent::log('Not allowed to demand check on status Validated!');
        return false;
    }
}

class Payout extends State
{
    public function insertCardAndPin($card, $pin)
    {
        parent::log('Not allowed to insert card and PIN on status Payout!');
        return false;
    }

    public function inputAmountAndConfirm($amount)
    {
        parent::log('Not allowed to input amount and confirm on status Payout!');
        return false;
    }

    public function demandCheck()
    {
        parent::log('Allowed to demand check!');
        return true;
    }
}

class ATM extends State
{
    private $state;

    public function __construct()
    {
        $this->setState(new Ready());
    }

    public function setState($state)
    {
        parent::log('New state: ' . get_class($state));
        $this->state = $state;
    }

    public function insertCardAndPin($card = true, $pin = true)
    {
        parent::log('Inserting card and valid pin.');

        if (!$this->state->insertCardAndPin($card, $pin)) {
            return;
        }

        $this->setState(new Validated());
    }

    public function inputAmountAndConfirm($amount = 100)
    {
        parent::log('Inputing amount and confirm');

        if (!$this->state->inputAmountAndConfirm($amount)) {
            return;
        }

        $this->setState(new Payout());
    }

    public function demandCheck()
    {
        parent::log('Executing check demand.');

        if (!$this->state->demandCheck()) {
            return;
        }

        $this->setState(new Ready());
    }
}

$atm = new ATM();
//Ready
$atm->demandCheck();
$atm->inputAmountAndConfirm();
$atm->insertCardAndPin();
//Validated
$atm->demandCheck();
$atm->inputAmountAndConfirm();
//Payout
$atm->insertCardAndPin();
$atm->demandCheck();
