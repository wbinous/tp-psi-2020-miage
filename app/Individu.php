<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Individu extends Model
{
    public $table = "individu";
    protected $primaryKey = "idIndividu";
    public $timestamps = false;
    protected $fillable = ['nom', 'prenom', 'email', 'num', 'idStatut', 'idAnnuaire'];
}
