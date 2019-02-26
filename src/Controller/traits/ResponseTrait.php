<?php

namespace App\Controller\traits;

use Symfony\Component\HttpFoundation\Response;

trait ResponseTrait
{
    public function getResponse($data = [], int $code = Response::HTTP_OK): Response
    {
        $response = [
            "meta" => [
                "status" => 'success'
            ]
        ];

        $responseData = array_merge(["data" => $data], $response);

        return $this->json($responseData, $code);
    }

}