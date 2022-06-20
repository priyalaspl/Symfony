<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;

class CrudController extends AbstractController
{
    #[Route('/crud', name: 'app_crud')]
    public function index(Connection $connection): Response
    {
        $sql = 'SELECT fname FROM netti_user LIMIT 5';
        $stmt = $connection->query($sql);
//         $users = $connection->fetchAllAssociative('SELECT * FROM netti_user LIMIT 5');
        while (($row = $stmt->fetchAssociative()) !== false) {
            $data[] = $row['fname'];
        }

        return $this->render('crud/index.html.twig', [
            'data' => $data,
        ]);
    }
}
