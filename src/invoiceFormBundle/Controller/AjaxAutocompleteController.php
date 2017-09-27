<?php

namespace invoiceFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AjaxAutocompleteController extends Controller {

    public function updateDataAction(Request $request) {
        $data = $request->get('input');

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(''
                        . 'SELECT c.id, c.nameNip '
                        . 'FROM invoiceFormBundle:Customer c '
                        . 'WHERE c.nameNip LIKE :data '
                        . 'ORDER BY c.nameNip ASC'
                )
                ->setParameter('data', '%' . $data . '%');
        $results = $query->getResult();

        $customerList = '<ul id="matchList">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['nameNip']); // Replace text field input by bold one
            $customerList .= '<li id="' . $result['nameNip'] . '">' . $matchStringBold . '</li>'; // Create the matching list - we put maching name in the ID too
        }
        $customerList .= '</ul>';

        $response = new JsonResponse();
        $response->setData(array('countryList' => $customerList));
        return $response;
    }

}
