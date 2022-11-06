<?php

namespace App\Pattern\State;

use App\Billing\Invoice\Document;

class Draft extends State
{
    public function __construct(Document $doc) {
        parent::__construct($doc);
    }

    public function verify()
    {
        if ($this->doc->getSumma() > 0) {
            $this->doc->changeState(new Review($this->doc));
        }
    }

    public function __toString()
    {
        return 'Draft';
    }

    public function onEnterState($oldState)
    {
        if ($this->doc->getSumma() > 0) {
            $this->verify();
        }
    }
}
