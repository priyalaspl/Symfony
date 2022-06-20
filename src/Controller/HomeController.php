<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        return $this->redirectToRoute('edit_blog', ['id' => $id]);
    }

    #[Route('/blog/{id}', name: 'edit_blog' ,methods: ['GET'])]
    public function edit(int $id) : Response
    {
        return new Response(
            '<p>'.$url = $this->generateUrl('edit_blog', ['id' => $id]).'</p>'
            );
    }

    #[Route('/', name: 'index')]
    public function index(): Response {
        return new Response(
            '<html><body>Lucky number: 212</body></html>'
            );
//         throw $this->createNotFoundException('The product does not exist');
//         throw new NotFoundHttpException('The product does not exist');
    }
}

