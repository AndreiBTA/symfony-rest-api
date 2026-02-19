<?php

declare(strict_types=1);

namespace App\Dto;

class ListCocktailsQuery
{
    public function __construct(
        public ?string $name = null,
        public ?string $isAlcoholic = null,
        public ?string $difficulty = null,
        public int $page = 1,
        public int $itemsPerPage = 10,

    ){
    }
}
