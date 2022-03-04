<?php

namespace App\Services;

class JsonFormatter
{
    public function format($json): array
    {
        return json_decode($json, true);
    }
}