<?php

namespace Orbitpodium\LaravelSageAPI;

use \SoapClient;
use \SoapParam;

class Sage
{
    public $client;
    public $wsdl;
    public $methods;

    public function __construct(){
        $this->wsdl = env('SAGE_WSDL');
        /* Initialize webservice with your WSDL */
        $this->client = new SoapClient($this->wsdl,array('soap_version' => SOAP_1_1));
        $this->methods = $this->client->__getFunctions();
    }

    public function __call($functionName, $arguments = [])
    {
        foreach ($this->methods as $method) {
            if(preg_match('/^'.$functionName.'\(*/', $method) == 1){
                goto next;
            }
        }

        abort(501, 'The method '.$functionName.' called not implemented.');

        next:
        dd();
        //$key = array_search($functionName., $this->methods);

        //if (method_exists($this->client, $functionName)){dd('putas');}

        switch ($functionName) {
            /*
            case 'ListaGrupos':
                if(count($arguments)){
                    $parameters = [];   
                }
                else{

                }
                break;
            case 'ListaArtigos':
                echo "i equals 1";
                break;*/
            case 'ListaClientes':
                if(count($arguments) == 0){
                    $parameters = ['MostraInativos' => false];  
                }
                else{
                    if(array_key_exists('MostraInativos',$arguments)){
                        if(gettype($arguments['MostraInativos']) == "boolean"){
                            $parameters = $arguments;
                            break;
                        }
                        else{
                            //erro tipo parametro
                            abort(400, 'A função que pretende executar '.$functionName.'() necessita de um argumento do tipo boolean.');
                        }
                    }
                    else{
                        //erro nome parametro
                        abort(400, 'A função que pretende executar '.$functionName.'() necessita de um argumento MostraInactivos.');
                    }
                }
        }
/*
        if($nomeLowerCase == 'familias'){
            $parameters = ['sGrupo' => '02'];
        }
*/
        return $this->decodeResponse($this->client->$functionName($parameters));
    }

    public function decodeResponse($stdObj)
    {
        $soapResponse = (array) $stdObj;
        $responseDecoded = array_pop($soapResponse);
        return $responseDecoded;
    }
  
    public function get($functionName, $parameters = []) {
        return $this->decodeResponse($this->client->__soapCall($functionName, $parameters));
    }

}
