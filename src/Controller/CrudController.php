<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class CrudController extends AbstractController
{
    #[Route('/crud', name: 'app_crud')]
    public function index(Connection $connection): Response
    {
        return $this->render('crud/index.html.twig');
    }

    #[Route('/store', name: 'store')]
    public function store(Request $request,Connection $connection): Response
    {
       $fname = $request->request->get('fname');
       $lname = $request->request->get('lname');
       $email = $request->request->get('email');
       $number = $request->request->get('number');
       $country = $request->request->get('country');

       $sql = "INSERT INTO `practice_user` (`fname`, `lname`, `email`, `number`, `country`) VALUES
                (:fname, :lname, :email, :number, :country)";

        $stmt = $connection->prepare($sql);

        $resultSet = $stmt->executeQuery(['fname' => $fname,'lname' => $lname,'email' => $email,'number' => $number,'country' => $country]);

        // add meessage after insert into user table
        $this->addFlash(
            'success',
            'Data inserted succesfully'
        );

        return $this->redirectToRoute('app_crud');
    }
}
