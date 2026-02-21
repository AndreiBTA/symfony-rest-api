<?php

namespace App\Controller\Api;

use App\Entity\Cocktail;
use App\Repository\CocktailRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class DeleteCocktailController
{
    public function __construct(
        private readonly CocktailRepository $cocktailRepository,
    )

    {}

    #[Route('api/cocktails/{id}', name: 'app.cocktails.delete', methods: ['GET'])]
    public function __invoke(#[MapEntity(message: 'Not found')] Cocktail $cocktail): Response
    {

        $this->cocktailRepository->remove($cocktail);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
