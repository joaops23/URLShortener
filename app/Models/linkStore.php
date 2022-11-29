<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\URL;

class linkStore extends Model
{
    use HasFactory;

    protected $table = "urls";
    protected $fillable = ['urlorig', 'urlnew'];
}
