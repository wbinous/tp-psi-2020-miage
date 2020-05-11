<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\IndividuResource;
use App\Groupe;
use Carbon\Carbon;

class ApiGroupeController extends Controller
{
    /**
     * Show all apis.
     *
     * @param
     * @return View
     */
    public function show()
    {
        $data = array();
        $data['apis'] = Groupe::all();
        return view('ApiGroupe/show', $data);
    }

    /**
     * API qui fourni sous json la liste des individus d'un groupe
     *
     * @return View
     */
    public function listeIndividusAPI($idGroupe) {
        $res = DB::table('individu')
            ->join('appartenance', 'individu.idIndividu', '=', 'appartenance.idIndividu')
            ->join('groupe', 'groupe.idGroupe', '=', 'appartenance.idGroupe')
            ->join('statut', 'statut.idStatut', '=', 'individu.idStatut')
            ->join('annuaire', 'annuaire.idAnnuaire', '=', 'individu.idAnnuaire')
            ->select('individu.idIndividu', 'individu.nom', 'individu.prenom', 'individu.email', 'individu.num', 'statut.libelle as statut', 'annuaire.libelle as annuaire')
            ->where('groupe.idGroupe', $idGroupe)
            ->where('appartenance.annee', now()->format('Y'))
            ->get();
        return response()->json(['data' => $res]);
    }
}