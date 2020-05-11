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
use Illuminate\Http\UploadedFile;
use App\Imports\IndividusImport;
use Maatwebsite\Excel\Facades\Excel;

class IndividuController extends Controller
{
    /**
     * Show all groups.
     *
     * @param
     * @return View
     */
    public function show()
    {
        $data = array();
        $data['individus'] = Individu::paginate(15);
        return view('Individu/show', $data);
    }


    /**
     * Create individu
     *
     * @return View
     */
    public function create(Request $request) {
        $data = array();
        $data['groupes'] = Groupe::all();
        $data['statuts'] = Statut::all();
        $data['annuaires'] = Annuaire::all();
        if(!empty($request->all())) {
            try {
                $individu = new Individu;
                $individu->nom = $request->input('nom');
                $individu->prenom = $request->input('prenom');
                $individu->email = $request->input('email');
                $individu->num = $request->input('num');
                $individu->idStatut = $request->input('statut');
                $individu->idAnnuaire = $request->input('annuaire');
                $individu->save();
                if(!empty($request->input('groupes'))) {
                    $insertToGroups = array();
                    foreach($request->input('groupes') as $groupe) {
                        $insertToGroups[] = ['idGroupe' => $groupe, 'idIndividu' => $individu->idIndividu, 'annee' => now()->format('Y')];
                        //$individu->idIndividu
                    }
                    Appartenance::insert($insertToGroups);
                }
                $data['success'] = 'L\'individu a bien été ajouté.';
            } catch(\Illuminate\Database\QueryException $e) {
                $data['failure'] = 'Echec de l\'ajout.';
            }
        }
        return view('Individu/gestion', $data);
    }

    /**
     * Show individu
     *
     * @param  int  $idIndividu
     * @return View
     */
    public function modify($idIndividu, Request $request) {
        $data = array();
        $data['groupes'] = Groupe::all();
        $data['statuts'] = Statut::all();
        $data['annuaires'] = Annuaire::all();
        $data['individu'] = Individu::find($idIndividu);
        $data['checkedGroups'] = Appartenance::where('idIndividu', $idIndividu)->where('annee', now()->format('Y'))->get();
        if(!empty($request->all())) {
            try {
                $data['individu']->nom = $request->input('nom');
                $data['individu']->prenom = $request->input('prenom');
                $data['individu']->email = $request->input('email');
                $data['individu']->num = $request->input('num');
                $data['individu']->idStatut = $request->input('statut');
                $data['individu']->idAnnuaire = $request->input('annuaire');
                $data['individu']->save();
                // On les groupes si il y a des groupes où l'utilisateur a été ajouté/supprimé
                if(!empty($request->input('groupes'))) {
                    $insertToGroups = array();
                    $deleteFromGroups = array();
                    // On ajoute de la bdd les groupes cochés et on supprime les decochés
                    foreach($request->input('groupes') as $groupe) {
                        if($data['checkedGroups']->where('idGroupe', $groupe)->isEmpty()) {
                            $insertToGroups[] = [
                                'idGroupe' => $groupe, 
                                'idIndividu' => $idIndividu, 
                                'annee' => now()->format('Y')
                            ];
                        }
                    }
                    //On supprime de la bdd les groupes décochés
                    foreach($data['checkedGroups'] as $groupe) {
                        if(!in_array($groupe->idGroupe, $request->input('groupes'))) {
                            $deleteFromGroups[] = $groupe->idGroupe;
                        }
                    }
                    Appartenance::where('idIndividu', $idIndividu)->whereIn('idGroupe', $deleteFromGroups)->delete();
                    Appartenance::insert($insertToGroups);
                } else {
                    Appartenance::where('idIndividu', $idIndividu)->delete();
                }
                $data['success'] = 'L\'individu a bien été modifié.';
            } catch(\Illuminate\Database\QueryException $e) {
                $data['failure'] = 'Echec de la modification.';
            }
        }
        /* On rafraîchit les données */
        $data['groupes'] = Groupe::all();
        $data['statuts'] = Statut::all();
        $data['annuaires'] = Annuaire::all();
        $data['individu'] = Individu::find($idIndividu);
        $data['checkedGroups'] = Appartenance::where('idIndividu', $idIndividu)->where('annee', now()->format('Y'))->get();
        return view('Individu/gestion', $data);
    }

    /**
     * Delete individu
     *
     * @param  int  $idIndividu
     * @return View
     */
    public function delete($idIndividu) {
        Appartenance::where('idIndividu', $idIndividu)->delete();
        $individu = Individu::find($idIndividu);
        $individu->delete();
        return back();
    }

    /**
     * Importer des individus d'un fichier excel
     * 
     * @param Request $request
     * @return View
     */
    public function importer(Request $request) {
        $data = array();
        if(!empty($request->all()) && $request->hasFile('fichierImport')) {
            $path = $request->fichierImport->storeAs('storage', 'import.xlsx');
            try {
                Excel::import(new IndividusImport, $path);
                $data['success'] = 'Vous avez importé des individus avec succès!';
            } catch (\Illuminate\Database\QueryException $e) {
                $data['failure'] = 'Echec de l\'import';
            }
        }
        return view('Individu/importer', $data);
    }
}