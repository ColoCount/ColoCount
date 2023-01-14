<?php

namespace App\Controller;

use App\Model\Factory\PDO;
use App\Model\Manager\ColocationManager;
use App\Model\Route\Route;
use App\Service\JWTHelper;

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

    #[Route('/add_coloc', name:'add_coloc', methods:['POST'])]
    public function addColocs(){

        $cred = str_replace("Bearer ", "", getallheaders()['Authorization'] ?? getallheaders()['authorization'] ?? "");
        $token = JWTHelper::decodeJWT($cred);

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if (!empty($_POST)) {
                if($token){
                    if (isset($_POST["titre"], $_POST["description"]) && !empty($_POST['titre']) && !empty($_POST['description'])) {
                                    
                        $titre = htmlspecialchars(strip_tags($_POST['titre']));
                        $description = htmlspecialchars(strip_tags($_POST['description']));
    
                        $connectionPdo = new ColocationManager(new PDO());
                        
                        $created_at = date('Y-m-d H:i:s');
                        $updated_at = $created_at;
    
                        $connectionPdo->addColoc($titre, $description,$created_at,$updated_at);
    
                        echo json_encode([
                            "status" => "success",
                            "message" => "Ajout de la colocation faite",
                        ]);
                        exit;
                    }
                }else{
                    echo json_encode([
                        "status" => "error",
                        "message" => "Un problème est survenue",
                    ]);exit;
                }
            }

        }

        echo json_encode([
            'status' => 'error',
            'message' => 'L\'ajout de la colocation n\'a pas était faite'
        ]);
        exit;
    }
}