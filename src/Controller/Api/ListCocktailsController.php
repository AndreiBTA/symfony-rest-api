<?php

declare(strict_types=1);

namespace App\Controller\Api;


use App\Repository\CocktailRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;

readonly class ListCocktailsController
{

    public function __construct(
        private CocktailRepository $cocktailsRepository,
        private SerializerInterface $serializer,
    )

    {}

    /**
     * @throws ExceptionInterface
     */
    #[Route('api/cocktails', name: 'app.cocktails.list', methods: ['GET'])]
    public function __invoke(): Response
    {
        $cocktails = $this->cocktailsRepository->findAll();

        $data = $this->serializer->serialize($cocktails, 'json', [
//            'groups' => ['cocktail:read'],
        ]);


        return JsonResponse::fromJsonString($data);
    }
}
