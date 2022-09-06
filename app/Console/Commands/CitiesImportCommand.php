<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\IBGE\IbgeService;

class CitiesImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ibge:import-cities-state';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all cities from a specific state';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(IbgeService $service)
    {
        $state = $this->choice(
            'Insert a state slug',
            $this->getStates()
        );

        $service->getCitiesByStateSlug($state);

        return 0;
    }

    private function getStates() : array
    {
        $states = [
            [
                "name" => "Acre",
                "abbr" => "AC"
            ],
            [
                "name" => "Alagoas",
                "abbr" => "AL"
            ],
            [
                "name" => "Amapá",
                "abbr" => "AP"
            ],
            [
            "name" => "Amazonas",
            "abbr" => "AM"
            ],
            [
                "name" => "Bahia",
                "abbr" => "BA"
            ],
            [
                "name" => "Ceará",
                "abbr" => "CE"
            ],
            [
                "name" => "Distrito Federal",
                "abbr" => "DF"
            ],
            [
                "name" => "Espírito Santo",
                "abbr" => "ES"
            ],
            [
                "name" => "Goiás",
                "abbr" => "GO"
            ],
            [
                "name" => "Maranhão",
                "abbr" => "MA"
            ],
            [
                "name" => "Mato Grosso",
                "abbr" => "MT"
            ],
            [
                "name" => "Mato Grosso do Sul",
                "abbr" => "MS"
            ],
            [
                "name" => "Minas Gerais",
                "abbr" => "MG"
            ],
            [
                "name" => "Pará",
                "abbr" => "PA"
            ],
            [
                "name" => "Paraíba",
                "abbr" => "PB"
            ],
            [
                "name" => "Paraná",
                "abbr" => "PR"
            ],
            [
                "name" => "Pernambuco",
                "abbr" => "PE"
            ],
            [
                "name" => "Piauí",
                "abbr" => "PI"
            ],
            [
                "name" => "Rio de Janeiro",
                "abbr" => "RJ"
            ],
            [
                "name" => "Rio Grande do Norte",
                "abbr" => "RN"
            ],
            [
                "name" => "Rio Grande do Sul",
                "abbr" => "RS"
            ],
            [
                "name" => "Rondônia",
                "abbr" => "RO"
            ],
            [
                "name" => "Roraima",
            "abbr" => "RR"
            ],
            [
                "name" => "Santa Catarina",
                "abbr" => "SC"
            ],
            [
                "name" => "São Paulo",
                "abbr" => "SP"
            ],
            [
                "name" => "Sergipe",
                "abbr" => "SE"
            ],
            [
                "name" => "Tocantins",
                "abbr" => "TO"
            ]
        ];

        return collect($states)
            ->map(fn($state) => $state['abbr'] . ' - ' . $state['name'])
            ->toArray();
    }
}
