<?php

class TypesLicence
{
static public function getLicencesTypes()
{
    $database = new database();
    return $database->rowSelect(null,"Types_Licences",10);
}
}