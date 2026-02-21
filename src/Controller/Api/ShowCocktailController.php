<?php

namespace App\Controller\Api;

use App\Entity\Cocktail;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;

readonly class ShowCocktailController
{
    public function __construct(
        private SerializerInterface $serializer,
    )

    {}

    /**
     * @throws ExceptionInterface
     */
    #[Route('api/cocktails/{id}', name: 'app.cocktails.show', methods: ['GET'])]
    public function __invoke(#[MapEntity(message: 'Not found')] Cocktail $cocktail): Response
    {

        $data = $this->serializer->serialize($cocktail, 'json');


        return JsonResponse::fromJsonString($data);
    }
}
