<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $table = "rankings";

    protected $fillable = ["score","rank","perfect","strike","hit","ball","combo","difficulty"];
}
