<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Individu;
use App\Groupe;
use App\Statut;
use App\Annuaire;
use App\Appartenance;
use Carbon\Carbon;
use App\Exports\IndividusExport;
use Maatwebsite\Excel\Facades\Excel;

class GroupeController extends Controller
{
    /**
     * Show all groups.
     *
     * @return View
     */
    public function show()
    {
        $data = array();
        $data['groupes'] = Groupe::all()->toArray();
        return view('Groupe/show', $data);
    }


    /**
     * Create a group
     *
     * @return View
     */
    public function create(Request $request) {
        try {
            $groupe = new Groupe;
            $groupe->libelle = $request->input('libelle');
            $groupe->save();
            if(!empty($request->input('selectedIndividus'))) {
                foreach($request->input('selectedIndividus') as $unIndividu) {
                    $individusToGroup = ['idGroupe' => $groupe->idGroupe, 'idIndividu' => $unIndividu, 'annee' => now()->format('Y')];
                }
                Appartenance::insert($individusToGroup);
            }
        } catch(\Illuminate\Database\QueryException $e) {
            return view('Groupe/gestion', ['failure' => 'Echec de la création du groupe.']);
        }
        return view('Groupe/gestion', ['success' => 'Le groupe a bien été crée.']);
    }

    /**
     * Show a group
     *
     * @param  int  $idGroup
     * @return View
     */
    public function modify($idGroup, Request $request) {
        $data = array();
        $individusToGroup = array();
        $deleteFromGroups = array();
        $data['groupe'] = Groupe::find($idGroup);
        $appartenance = Appartenance::where('idGroupe', $idGroup)->pluck('idIndividu')->toArray();
        $data['individus'] = Individu::whereIn('idIndividu', $appartenance)->get();
        if(!empty($request->all())) {
            try {
                $data['groupe']->libelle = $request->input('libelle');
                $data['groupe']->save();
                if(!empty($request->input('selectedIndividus'))) {
                    foreach($request->input('selectedIndividus') as $unIndividu) {
                        if(!in_array($unIndividu, $appartenance)) {
                            $individusToGroup = ['idGroupe' => $idGroup, 'idIndividu' => $unIndividu, 'annee' => now()->format('Y')];
                        }
                    }
                    //On supprime de la bdd les groupes décochés
                    foreach($appartenance as $unIndividu) {
                        if(!in_array($unIndividu, $request->input('selectedIndividus'))) {
                            $deleteFromGroups[] = $unIndividu;
                        }
                    }
                    Appartenance::where('idGroupe', $idGroup)->whereIn('idIndividu', $deleteFromGroups)->delete();
                    Appartenance::insert($individusToGroup);
                } else {
                    Appartenance::where('idGroupe', $idGroup)->delete();
                }
                $data['success'] = 'La modification a été opérée avec succès !';
            } catch(\Illuminate\Database\QueryException $e) {
                $data['failure'] = 'Erreur lors de la modification.';
            }
        }
        /* On rafraîchit les données */
        $appartenance = Appartenance::where('idGroupe', $idGroup)->pluck('idIndividu')->toArray();
        $data['groupe'] = Groupe::find($idGroup);
        $data['individus'] = Individu::whereIn('idIndividu', $appartenance)->get();
        return view('Groupe/gestion', $data);
    }

    /**
     * Delete a group
     *
     * @param  int  $idGroup
     * @return View
     */
    public function delete($idGroup) {
        Appartenance::where('idGroupe', $idGroup)->delete();
        $groupe = Groupe::find($idGroup);
        $groupe->delete();
        return back();
    }

    /**
     * Retourne les individus trouvés par numero
     *
     * @param  int  $numIndividu
     * @return Response
     */
    public function rechercherIndividu($numIndividu) {
        $res = Individu::where('num', $numIndividu)->first();
        return response()->json(['resultat' => $res]);
    }

    /**
     * Envoie la liste des individsu d'un groupe sous format excel
     *
     * @param  int  $numIndividu
     * @return Response
     */
    public function exporter($idGroupe) {
        return Excel::download(new IndividusExport($idGroupe), 'groupe_'.$idGroupe.'.xlsx');
    }
}