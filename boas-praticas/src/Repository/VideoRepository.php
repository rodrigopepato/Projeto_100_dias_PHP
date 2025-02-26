<?php

namespace Alura\Mvc\Repository;

use PDO;
use PDOException;
use Alura\Mvc\Entity\Video;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Video $video): bool
    {
        $sql = 'INSERT INTO videos (url, title, imagem_path) VALUES (?, ?, ?);';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);
        $statement->bindValue(3, $video->filePath());

        try {
            $success = $statement->execute();

            if ($success) {
                $id = $this->pdo->lastInsertId();
                $video->setId(intval($id));
            }

            return $success;

        } catch (PDOException $e) {
            echo "Erro ao inserir vídeo: " . $e->getMessage();
            return false;
        }
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = ?';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);

        return $statement->execute();
    }

    public function update(Video $video): bool
    {
        $updateImageSql = '';
        if ($video->filePath() !== null) {
            $updateImageSql = ', imagem_path = :imagem_path';
        }

        $sql = "UPDATE videos SET
            url = :url,
            title = :title
            $updateImageSql
            WHERE id = :id";

        $statement = $this->pdo->prepare($sql);

        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':title', $video->title);
        $statement->bindValue(':id', $video->id(), PDO::PARAM_INT);

        if ($video->filePath() !== null) {
            $statement->bindValue(':imagem_path', $video->filePath());
        }

        return $statement->execute();
    }

    /** @return Video[] */
    public function all(): array
    {
        $videoList = $this->pdo
                    ->query('SELECT * FROM videos;')
                    ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
                $this->hydrateVideo(...),
                $videoList
        );
    }

    public function find(int $id): Video
    {
        $statement = $this->pdo->prepare('SELECT * FROM videos WHERE id = ?;');
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $videoData = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->hydrateVideo($videoData);
    }

    public function hydrateVideo(array $videoData): Video
    {
        $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);

        if ($videoData['imagem_path'] !== null) {
            $video->setFilePath($videoData['imagem_path']);
        }

        return $video;
    }

}
