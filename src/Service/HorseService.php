<?php

namespace App\Service;

use App\Repository\Interfaces\HorseRepositoryInterface,
    App\Entity\Horse;

final class HorseService
{
    /**
     * @var HorseRepositoryInterface
     */
    private $horseRepository;

    /**
     * HorseService constructor.
     * @param HorseRepositoryInterface $horseRepository
     */
    public function __construct(HorseRepositoryInterface $horseRepository)
    {
        $this->horseRepository = $horseRepository;
    }

    /**
     * @param int $id
     * @return Horse|null
     */
    public function get(int $id): ?Horse
    {
        return $this->horseRepository->findById($id);
    }

    /**
     * @return array|null
     */
    public function getAll(): ?array
    {
        return $this->horseRepository->findAll();
    }

    /**
     * @param array $data
     * @return Horse
     */
    public function store(array $data): Horse
    {
        $horse = $this->horseRepository->store($data['name'], $data['voids']);

        return $horse;
    }

    /**
     * @param array $data
     * @return Horse
     */
    public function update(array $data): Horse
    {
        $horse = $this->horseRepository->update($data['id'], $data['name'], $data['voids']);

        return $horse;
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        $this->horseRepository->delete($id);
    }
}