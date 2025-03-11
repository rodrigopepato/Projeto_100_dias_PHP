<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use finfo;
use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class EditVideoController implements Controller
{
    use FlashMessageTrait;
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $queryParams = $request->getQueryParams();
        $id = filter_var($queryParams['id'], FILTER_VALIDATE_INT);

        if ($id === false || $id === null) {
            $this->addErrorMessage('ID inválido');
            return new Response(302, [
                'Location' => '/edit-video'
            ]);
        }

        $url = filter_var($queryParams['url'], FILTER_VALIDATE_URL);
        $title = filter_var($queryParams['titulo']);

        if ($url === false || $title === false) {
            $this->addErrorMessage('URL ou Título inválidos.');
            return new Response(302, [
                'Location' => '/edit-video'
            ]);
        }

        $video = new Video($url, $title);
        $video->setId($id);

        if($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $fInfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $fInfo->file($_FILES['image']['tmp_name']);

            if (str_starts_with($mimeType, 'image/')) {
                $safeFileName = uniqid('upload_') . '_' . pathinfo($_FILES['image']['name'], PATHINFO_BASENAME);
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    __DIR__ . '/../../public/img/uploads/' . $safeFileName
                );
                $video->setFilePath($safeFileName);
            }
        }

        $success = $this->videoRepository->update($video);

        if ($success === false) {
            $this->addErrorMessage('Erro ao atualizar vídeo');
            return new Response(302, [
                'Location' => '/edit-video'
            ]);
        } else {
            return new Response(302,[
                'Location' => '/'
            ]);
        }
    }
}
