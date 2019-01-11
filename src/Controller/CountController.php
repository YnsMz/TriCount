<?php

namespace App\Controller;

use App\Entity\TriCount;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\LenghtType;

class CountController extends AbstractController
{
    /**
     * @Route("/", name="count")
     */
    public function index(Request $request)
    {
        $lenght = new TriCount();

        $finalCount = null;

        //create a form extended from TriCount class
        $form = $this->createForm(LenghtType::class, $lenght);


        $form->handleRequest($request);

        //f the form is submitted and validated
        if($form->isSubmitted() && $form->isValid()){

            //call count method from TriCount class for counting perfect triangles
            $finalCount = $lenght->count($lenght->getMinLenght(),$lenght->getMaxLenght());

            //display the result
           // echo "<h1>Résultat:".$finalCount."</h1>";

        }

        //call home page and pass the form in arguments
        return $this->render('count/index.html.twig', [
            'lForm' => $form->createView(),
            'finalCount' => $finalCount,
        ]);
    }
}
