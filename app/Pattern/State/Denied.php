<?php

namespace App\Pattern\State;

use App\Billing\Invoice\Document;

class Denied extends State
{
    public function __construct(Document $doc) {
        parent::__construct($doc);
    }

    public function __toString()
    {
        return 'Denied';
    }
}
