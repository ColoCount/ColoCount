<?php

namespace App\Controller;

use App\Model\Factory\PDO;
use App\Model\Manager\ColocationManager;
use App\Model\Route\Route;

class ColocationController
{
    #[Route('/mes_colocs', name: "mesColocs.showColocs", methods: ["GET"])]
    public function showColocs(){
        if($_SERVER['REQUEST_METHOD'] == 'GET') {

            $connexionColocation = new ColocationManager(new PDO());
            $colocs = $connexionColocation->getMyColoc();

            if($colocs){
                $tableauColocs = [];
    
                foreach ($colocs as $coloc){
                    $colocsArray = [
                        "id"=> $coloc->getId(),
                        "name"=> $coloc->getName(),
                        "description"=>$coloc->getDescription(),
                        "created_at" => $coloc->getCreated_At(),
                    ];
                    
                    $tableauColocs[] = $colocsArray;
                }
                
                echo json_encode(
                    [
                        "status" =>"sucess",
                        $tableauColocs,
                        "colocs"=>true,
                    ]);
                exit;
            }

            
                echo json_encode([
                    'status' => 'success',
                    'message' => "Vous n'avez aucune colocation",
                    'colocs' =>false,
                ]);
                exit;
        }
        echo json_encode([
            'status' => 'error',
            'message' => "Une erreur est survenue",
        ]);
        exit;
    }

}