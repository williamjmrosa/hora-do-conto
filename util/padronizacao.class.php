<?php
Class Padronizacao{
    public static function padronizarNome($v){
        return ucwords(strtolower($v));
    }
    
    public static function padronizarEmail($v){
        return strtolower($v);
    }
    public static function padronizarCPF($v){
    	$v = str_replace(".","", $v);
    	return str_replace("-","", $v);
    }
    public static function padronizarCNPJ($v){
    	$v = str_replace(".", "", $v);
    	$v = str_replace("/", "", $v);
    	return str_replace("-", "", $v);
    }
    public static function padronizarContato($v){
    	$v = str_replace("(", "", $v);
    	$v = str_replace(") ", "", $v);
    	return str_replace("-", "", $v);
    }
    
    
    
}
?>