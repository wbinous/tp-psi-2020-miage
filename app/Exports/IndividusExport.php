<?php

namespace App\Exports;

use App\Individu;
use App\Appartenance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class IndividusExport implements FromQuery, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(int $idGroupe)
    {
        $this->idGroupe = $idGroupe;
    }

    public function query()
    {
        $idIndividus = Appartenance::where('idGroupe', $this->idGroupe)->pluck('idIndividu')->toArray();
        return Individu::whereIn('idIndividu', $idIndividus);
    }

    public function headings(): array
    {
        return [
            '#',
            'nom',
            'prenom',
            'email',
            'num',
            'statut',
            'annuaire'
        ];
    }
}
