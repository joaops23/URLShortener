<?php

//Model responsável pela lógica utilizada para gerar um link original para converter a URL
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\URL;

class shortenerModel extends Model
{
    use HasFactory;

    
    // método para converter a url e armazenar os dados
    public function short($url){
        //$basePath = $_SERVER['DOCUMENT_ROOT'];
        
        $bytes = random_bytes(10);
        $queryString = (bin2hex($bytes));

        $urlFull = $queryString;

        $resp = ['oldUrl' => $url, 'newUrl' => $urlFull];

        return $resp;
    }
}

