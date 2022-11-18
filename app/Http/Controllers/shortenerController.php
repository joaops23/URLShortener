<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\shortenerModel as shortener;



//receber, tratar e enviar o link para o model responsável pelo armazenamento
class shortenerController extends Controller
{

    private $url;

    public function getUrl(){
        return $rhis->url;
    }

    public function setUrl($newUrl){
        $newUrl = mb_convert_string(addslashes($newUrl), 'ISO-8859-1', 'UTF-8');

        $this->url = $newUrl;
    }

    // função controller que recebe os dados para encurtamento e envia para o modelo de encurtamento.
    public function shortener(Request  $request){
        $db = new shortener();
        $urlOld = htmlSpecialChars($request->url);
        
        $teste = $db->short($urlOld);

        return $teste;
    }

}
