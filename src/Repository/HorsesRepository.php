<?php

namespace App\Repository;

use App\Entity\Horse,
    Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository,
    Symfony\Bridge\Doctrine\RegistryInterface,
    App\Repository\Interfaces\HorseRepositoryInterface;

class HorsesRepository extends ServiceEntityRepository implements HorseRepositoryInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Horse::class);
    }

    public function findById(int $id): ?Horse
    {
        $littlePinkHorse = $this->getEntityManager()->createQueryBuilder()
            ->select('h')
            ->from('App\Entity\Horse', 'h')
            ->where('h.id = :horseId')
            ->setParameter('horseId', $id)
            ->getQuery()->execute();

        return is_array($littlePinkHorse) ? reset($littlePinkHorse) : null;
    }

    public function findAll(): array
    {
        $littlePinkHorses = $this->getEntityManager()->createQueryBuilder()
            ->select('h')
            ->from('App\Entity\Horse', 'h')
            ->getQuery()->getResult();

        return $littlePinkHorses;
    }

    public function store(string $name, int $voids): Horse
    {
        $horse = new Horse();
        $horse->setName($name);
        $horse->setTheNumberOfVoidsInWhichTheHorseVisited($voids);

        $this->getEntityManager()->persist($horse);
        $this->getEntityManager()->flush();

        return $horse;
    }

    public function update(int $id, string $name, int $voids): Horse
    {
        $horse = $this->findById($id);
        $horse->setName($name);
        $horse->setTheNumberOfVoidsInWhichTheHorseVisited($voids);

        $this->getEntityManager()->createQueryBuilder()->update($horse);
        $this->getEntityManager()->flush();

        return $horse;
    }

    public function delete(int $id): void
    {
        $this->getEntityManager()->createQueryBuilder()
            ->delete()
            ->from('App\Entity\Horse', 'h')
            ->where('h.id = :horseId')
            ->setParameter('horseId', $id)
            ->getQuery()->execute();
    }
}
