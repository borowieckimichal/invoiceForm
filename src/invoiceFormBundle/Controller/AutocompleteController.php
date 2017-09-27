<?php

namespace invoiceFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class AutocompleteController extends Controller {

    public function indexAction() {
        $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('invoiceFormBundle:Customer')
        ;

        $listCountries = $repository->findBy(
                array(), // Critere
                array('id' => 'desc'), // Tri
                null, // Limite
                null                          // Offset
        );


        return $this->render('invoice/new.html.twig', array(
                    'listCountries' => $listCountries,
        ));
    }

}
