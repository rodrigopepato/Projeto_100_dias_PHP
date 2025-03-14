<?php

namespace Alura\Mvc\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Alura\Mvc\Repository\VideoRepository;
use League\Plates\Engine;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class VideoFormController implements RequestHandlerInterface
{
    public function __construct(
        private VideoRepository $repository,
        private Engine $templates
        )
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $parsedBody = $request->getParsedBody();

        $id = filter_var($queryParams['id'] ?? $parsedBody['id'] ?? null, FILTER_VALIDATE_INT);

        /**@var ?Video $video */
        $video = null;
        if ($id !== false && $id !== null) {
            $video = $this->repository->find($id);
        }

        return new Response(200, body: $this->templates->render('video-form', ['video' => $video]));
    }

}
