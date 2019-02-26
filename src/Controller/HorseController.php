<?php

namespace App\Controller;

use App\Controller\traits\ResponseTrait;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController,
    Symfony\Component\HttpFoundation\Response,
    Symfony\Component\HttpFoundation\Request,
    App\Service\HorseService,
    FOS\RestBundle\Controller\Annotations as Rest;

final class HorseController extends AbstractController
{
    use ResponseTrait;

    /** @var HorseService */
    private $horseService;

    /**
     * HorseController constructor.
     * @param HorseService $horseService
     */
    public function __construct(HorseService $horseService)
    {
        $this->horseService = $horseService;
    }

    /**
     * @Rest\Get("/horses")
     */
    public function index()
    {
        return $this->getResponse($this->horseService->getAll());
    }

    /**
     * @Rest\Get("/horses/{id}")
     * @param int id
     * @return Response
     */
    public function show(int $id): Response
    {
        return $this->getResponse($this->horseService->get($id));
    }

    /**
     * @Rest\Post("/horses")
     * @param Request $request
     * @return Response
     */
    public function storeHorse(Request $request): Response
    {
        return $this->getResponse($this->horseService->store([
            'name' => $request->get('name'),
            'voids' => $request->get('voids')
        ]));
    }

    /**
     * @Rest\Put("/horses")
     * @param Request $request
     * @return Response
     */
    public function updateHorse(Request $request): Response
    {
        return $this->getResponse($this->horseService->update([
            'id' => $request->get('id'),
            'name' => $request->get('name'),
            'voids' => $request->get('voids')
        ]));
    }

    /**
     * @Rest\Delete("/horses/{id}")
     * @param int $id
     * @return Response
     */
    public function deleteHorse(int $id): Response
    {
        $this->horseService->delete($id);

        return $this->getResponse([]);
    }
}
