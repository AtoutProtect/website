<?php
/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 05/03/2017
 * Time: 18:16
 */

session_start();
function mon_autoloader($classe){
    require 'model/'.$classe.'.php';
}
spl_autoload_register('mon_autoloader');
define('WEBROOT',dirname( __FILE__ ));
define('DS',DIRECTORY_SEPARATOR);
define('URL',"http://atoutprotect");