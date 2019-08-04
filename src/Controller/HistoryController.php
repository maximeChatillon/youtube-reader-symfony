<?php

namespace App\Controller;

use App\Entity\History;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;


class HistoryController extends AbstractController
{
    /**
     * @Route("/add_history/{idHistory}", name="create_history, ")
     */

    // add a new URL to the history
    public function createHistory($idHistory) : Response
    {


      $query = $this->getDoctrine()->getManager();

      $history = new History();
      $history->setIdHistory($idHistory);

      $query->persist($history);

      $query->flush();

      return new Response('Saved new line in the History table with history url=' .$history->getIdHistory() );
    }

    /**
     * @Route("/history_list/", name="get_history_list")
     */

     public function getHistoryist() : Response
     {
       $histories = $this->getDoctrine()->getRepository(History::class)->findAll();

       return $this->render('history/index.html.twig', ['histories' => $histories]);
     }

     /**
      * @Route("/JSON_history_list/", name="get_json_history_list")
      */

     public function getJSONHistorylist() : Response
     {
       $array = [];
       $histories = $this->getDoctrine()->getRepository(History::class)->findAll();
       foreach ($histories as $history){
         $array[] = $history->getIdHistory();
       }
       return new Response(json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) ;
     }

}
