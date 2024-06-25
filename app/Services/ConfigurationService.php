<?php

namespace App\Services;

use App\Models\Configuration;

class ConfigurationService
{
    public function getPrimaryColor()
    {
        return Configuration::first()?->primaryColor;
    }

    public function getSecondaryColor()
    {
        return Configuration::first()?->secondaryColor;
    }
}
