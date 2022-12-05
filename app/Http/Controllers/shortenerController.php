<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\shortenerModel as shortener;
use App\Models\linkStore;




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

    // método de armazenamento de dados
    public function store($URIS = []) {        
        $db = new linkStore();


        $store = $db::create([
            'urlorig' =>$URIS['oldUrl'],
            'urlnew' =>$URIS['newUrl']
        ]);

        return $store;
    }

    // função controller que recebe os dados para encurtamento e envia para o modelo de encurtamento.
    public function shortener(Request  $request){
        $shortener = new shortener();
        $urlOld = htmlSpecialChars($request->url);
        $db = new linkStore();

        $URIS = [];
        array_push($URIS, $shortener->short($urlOld));

        //valida se link original já existe 
        $validate = $db->where("urlorig", $URIS[0]['oldUrl'])->get('urlnew');

        
        #validação para cadastro
        if($validate->count() == 0){
            $store = $this->store($URIS[0]);

            #erro no cadastro
            if(empty($store['id'])){
                return response()->json([
                    'message' => "Algo deu errado, conferir link e reenviar"
                ], 406);                
            }

            #retorno esperado
            return response()->json([
                'message' => "Adicionado com sucesso!"
            ], 201);
        } else {
            return response()->json([
                'message' => 'Link já cadastrado',
                'url' => $validate[0]['urlnew']
            ], 226);
        }
    }


    public function list(){

        $db = new linkStore();

        $list = $db->get(['urlorig', 'urlnew']);

        $formatList = [];
        foreach($list as $URL){
            array_push($formatList, [$URL['urlorig'] => $this->fullPath($URL['urlnew'])]);
        }
        
        return response()->json([
            $formatList
        ], 200);
    }

    public function fullPath($queryString){
        //$basePath = $_SERVER['DOCUMENT_ROOT'];
        $basePath = $_SERVER['HTTP_HOST'] . '/api/';
        $fullPath = $basePath . trim($queryString);

        return $fullPath;
    }

    public function search($queryString){

        $qs = trim($queryString);

        $db = new linkStore();

        $search = $db->where("urlnew", $qs)->get('urlorig');

        return redirect("http://" . $search[0]['urlorig']);

    }

}
