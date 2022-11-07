<?php

namespace App\Billing\Invoice;

use App\Pattern\State\Draft;

class Invoice extends Document
{
    private $summa;
    private $contragent;

    public function __construct(int $summa, string $contragent) {
        $this->summa = $summa;
        $this->contragent = $contragent;
        $this->changeState(new Draft($this));
    }

    public function getSumma()
    {
        return $this->summa;
    }

    public function getContragent()
    {
        return $this->contragent;
    }

    public function __toString()
    {
        return $this->getContragent() . ' : ' . $this->getSumma() . ' : ' . $this->getState();
    }
}
