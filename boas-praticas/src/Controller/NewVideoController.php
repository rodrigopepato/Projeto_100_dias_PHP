<?php

namespace Alura\Mvc\Controller;

use finfo;
use Alura\Mvc\Entity\Video;
use Alura\Mvc\Repository\VideoRepository;

class NewVideoController implements Controller
{
    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        $title = filter_input(INPUT_POST, 'titulo');

        if ($url === false || $title === false) {
            $_SESSION['error_message'] = 'URL ou Titulo inválidos';
            header('Location: /novo-video');
            exit();
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
            $_SESSION['error_message'] = 'Erro ao cadastrar vídeo';
            header('Location: /novo-video');
        } else {
            header('Location: /?sucesso=1');
        }
    }
}
