<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


use App\Entity\Calculator;

class CalculatorController extends AbstractController
{
    /**
     * @Route("/calculator", name="calculator")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CalculatorController.php',
        ]);
    }
    /**
     * @Route("/calculator/evaluate", methods={"POST"})
     * 
     */
    public function newAction(Request $request)
    {
        $a = json_decode($request->getContent(), true);

        $result =  Calculator::calculate($a['expression']);
        
        return $this->json($result);
    }
}
