<?php

namespace App\Services\IBGE;

use GuzzleHttp\Client;

class IbgeService
{

    public function __construct()
    {
        $this->client = new Client([
            'base_url' => 'https://servicodados.ibge.gov.br/api/v1/',
            'timeout' => 5.0
        ]);
    }

    public function getCitiesByStateSlug(String $slug)
    {
        echo 'alo ' . $slug;
    }
}
