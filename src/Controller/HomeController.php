<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/blog', name: 'blog_list')]
    public function list() : Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
            );
    }

    /**
     * @Route("/blog/posts/{id}", methods={"GET","HEAD"})
     */
    public function show(int $id): Response
    {
        return new Response(
            '<p>'.$id.'</p>'
            );
    }

    #[Route('/blog/{id}', name: 'edit blog' ,methods: ['GET'])]
    public function edit(int $id) : Response
    {
        return new Response(
            '<p>'.$url = $this->generateUrl('edit blog', ['id' => 10]).'</p>'
            );
    }
}

