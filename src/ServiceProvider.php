<?php

namespace Netnak\Tel;

use Netnak\Tel\Modifiers\Tel;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $modifiers = [
        Tel::class
    ];
    
    public function bootAddon()
    {
        //
    }
}
