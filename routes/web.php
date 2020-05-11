<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Individus */
Route::get('/', 'IndividuController@show')->name('index');
Route::post('individu/gestion', 'IndividuController@create')->name('creerIndividu');
Route::post('individu/gestion/{id}', 'IndividuController@modify')->name('modifierIndividu');
Route::post('individu/importer', 'IndividuController@importer')->name('importerIndividus');
Route::get('individu/supprimer/{id}', 'IndividuController@delete')->name('supprimerIndividu');
Route::get('individu/modifier/{id}', 'IndividuController@modify')->name('modifierIndividu');
Route::get('individu/gestion', 'IndividuController@create')->name('creerGroupe');
Route::get('individu/importer', 'IndividuController@importer')->name('importerIndividus');

/* Groupes */
Route::post('groupe/gestion', 'GroupeController@create')->name('creerGroupe');
Route::post('groupe/{id}/gestion', 'GroupeController@modify')->name('modifierGroupe');
Route::get('groupe/ajouter/{num}', 'GroupeController@rechercherIndividu')->name('rechercherIndividu');
Route::get('groupe/{id}/supprimer', 'GroupeController@delete')->name('supprimerGroupe');
Route::get('groupe', 'GroupeController@show')->name('afficherGroupe');
Route::get('groupe/{id}/modifier', 'GroupeController@modify')->name('modifierGroupe');
Route::get('groupe/{id}/ajouter', 'GroupeController@ajouterIndividus')->name('ajouterIndividus');
Route::get('groupe/{id}/exporter', 'GroupeController@exporter')->name('telechargerExport');
Route::get('groupe/gestion', function () {
    return view('Groupe/gestion');
})->name('creerGroupe');    

/* API */
Route::get('api', 'ApiGroupeController@show')->name('listeApi');    
Route::get('api/{id}', 'ApiGroupeController@listeIndividusAPI')->name('getIndividusApi');