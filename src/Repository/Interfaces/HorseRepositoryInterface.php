<?php

namespace App\Repository\Interfaces;

use App\Entity\Horse;

interface HorseRepositoryInterface
{
    public function findById(int $id): ?Horse;

    public function findAll(): array;

    public function store(string $name, int $voids): Horse;

    public function update(int $id, string $name, int $voids): Horse;

    public function delete(int $id): void;
}