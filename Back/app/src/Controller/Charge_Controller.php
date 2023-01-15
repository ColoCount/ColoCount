<?php

namespace App\Controller;

use App\Model\Factory\PDO;
use App\Model\Manager\ChargeManager;
use App\Model\Route\Route;

class Charge_Controller
{
    // #[Route('/mes_colocs/{id}/add_charge', name: "mesColocs.addCharge", methods: ["POST"])]
    // public function addCharge(){

    //     echo "trd ";die;
    //     if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         $connexionColocation = new ChargeManager(new PDO());
    //         $colocs = $connexionColocation->getAllMyColocs();

    //         if($colocs){
    //             $tableauColocs = [];
    
    //             foreach ($colocs as $coloc){
    //                 $colocsArray = [
    //                     "id"=> $coloc->getId(),
    //                     "name"=> $coloc->getName(),
    //                     "description"=>$coloc->getDescription(),
    //                     "created_at" => $coloc->getCreated_At(),
    //                 ];
                    
    //                 $tableauColocs[] = $colocsArray;
    //             }
                
    //             echo json_encode(
    //                 [
    //                     "status" =>"sucess",
    //                     $tableauColocs,
    //                     "colocs"=>true,
    //                 ]);
    //             exit;
    //         }

    //             echo json_encode([
    //                 'status' => 'success',
    //                 'message' => "Vous n'avez aucune colocation",
    //                 'colocs' =>false,
    //             ]);
    //             exit;
    //     }
    //     echo json_encode([
    //         'status' => 'error',
    //         'message' => "Une erreur est survenue",
    //     ]);
    //     exit;
    // }


}