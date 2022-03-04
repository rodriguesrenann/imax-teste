<?php

namespace App\Services;

class JsonFormatter
{
    public function formatJsonToArray($json): array
    {
        return json_decode($json, true);
    }
}