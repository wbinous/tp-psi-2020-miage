<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    public $table = "groupe";
    protected $primaryKey = "idGroupe";
    public $timestamps = false;
}
