<?php
/**
 * Created by PhpStorm.
 * User: adrie
 * Date: 11/07/2017
 * Time: 17:27
 */
 if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
require './controller/profil.php';
 }
 else{
     require 'connectionForm.php';
 }