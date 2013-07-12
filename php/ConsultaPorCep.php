<?php
/**
 * Contribuição de Fabio de Souza Mendes 
 * @url https://github.com/fatorx
 */

class ConsultaPorCep {
    
    public function consulta( $cep = null ) {
        $cep = str_replace(".", "", $cep);
        $cep = str_replace("-", "", $cep);
        $urlWS = 'http://cep.correiocontrol.com.br/'.$cep.'.json';
        $json = file_get_contents($urlWS);
        
        return json_decode($json, true);
    }
    
}
