<?php

namespace App\Pattern\State;

use App\Billing\Invoice\Document;

abstract class State
{
    protected $doc;

    public function __construct(Document $doc) {
        $this->doc = $doc;
    }

    public function onEnterState($oldState)
    {
        echo $oldState, ' -> ', $this, '<br>';
    }

    public function verify() {}
    public function approve() {}
    public function deny() {}
}
