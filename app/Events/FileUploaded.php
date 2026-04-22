<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class FileUploaded
{
    use Dispatchable;

    public $name;

    /**
     * Create a new event instance.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}


