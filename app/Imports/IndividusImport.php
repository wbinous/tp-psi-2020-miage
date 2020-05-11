<?php

namespace App\Imports;

use App\Individu;
use Maatwebsite\Excel\Concerns\ToModel;

class IndividusImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $res = Individu::where('num', $row[3]  ?? null)->get();
        if($res->isEmpty()) {
            return new Individu([
                'nom'           => $row[0] ?? null,
                'prenom'        => $row[1] ?? null,
                'email'         => $row[2] ?? null,
                'num'           => $row[3] ?? null,
                'idStatut'      => $row[4] ?? null,
                'idAnnuaire'    => $row[5] ?? null
            ]);
        } else {
            return null;
        }
    }
}
