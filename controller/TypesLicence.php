<?php

class TypesLicence
{
static public function getLicencesTypes()
{
    $database = new Database();
    return $database->read("Types_Licences",10);
}
}