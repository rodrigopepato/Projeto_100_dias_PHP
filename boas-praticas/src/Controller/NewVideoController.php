<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Helper\FlashMessageTrait;
use finfo;
use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NewVideoController implements Controller
{
    use FlashMessageTrait;

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(ServerRequestInterface $request): ResponseInterface
    {
        $getParsedBody = $request->getParsedBody();
        $url = filter_var($getParsedBody['url'] ,FILTER_VALIDATE_URL);
        $title = filter_var($getParsedBody['titulo']);

        if ($url === false || $title === false) {
            $this->addErrorMessage('URL ou Titulo inválidos');
            return new Response(302, [
                'Location' => '/novo-video'
            ]);
        }

        $video = new Video($url, $title);
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

        $success = $this->videoRepository->add($video);
        if ($success === false) {
            $this->addErrorMessage('Erro ao cadastrar vídeo');
            return new Response(302, [
                'Location' => '/novo-video'
            ]);
        } else {
            return new Response(302, [
                'Location' => '/'
            ]);
        }
    }
}
