<?php

namespace App\Pattern\State;

use App\Billing\Invoice\Document;

class Review extends State
{
    public function __construct(Document $doc) {
        parent::__construct($doc);
    }

    public function approve()
    {
        if ($this->doc->getSumma() <= 2000) {
            $this->doc->changeState(new Approved($this->doc));
        }
    }

    public function deny()
    {
        if ($this->doc->getSumma() > 2000) {
            $this->doc->changeState(new Denied($this->doc));
        }
    }

    public function __toString()
    {
        return 'On review';
    }

    public function onEnterState($oldState)
    {
        parent::onEnterState($oldState);
        if ($this->doc->getSumma() > 2000) {
            $this->deny();
        } else {
            $this->approve();
        }
    }
}
