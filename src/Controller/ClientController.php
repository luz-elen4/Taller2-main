<?php
namespace taller2\Controllers;

use taller2\Models\Client;

class ClientController {
    //Magic methods
    private $jsonFile;
    function __construct($jsonFile){
        $this->jsonFile = $jsonFile;
    }

    public function readJsonFile(){
        return json_decode(file_get_contents($this->jsonFile),true);
    }


    public function add(Client $client){
        $clients = $this->readJsonFile($this->jsonFile);

        $clients[] =  $client->toArray();
        // Guardar la información en el archivo
        file_put_contents($this->jsonFile,json_encode($clients));
    }


}