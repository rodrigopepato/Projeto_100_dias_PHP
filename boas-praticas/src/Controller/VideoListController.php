<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\VideoRepository;

class VideoListController extends ControllerWithHtml implements Controller
{

    public function __construct(private VideoRepository $videoRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $videoList = $this->videoRepository->all();

        echo $this->renderTemplate(
            'video-list',
            ['videoList' => $videoList],
        );

    }
}
