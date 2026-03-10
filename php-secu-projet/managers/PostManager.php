<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class PostManager extends AbstractManager
{
    public function findLatest() : array
    {
        $query = $this->db->prepare(
            "SELECT posts.*, users.username AS author_username 
            FROM posts 
            INNER JOIN users ON posts.author = users.id 
            ORDER BY posts.created_at DESC 
            LIMIT 4"
        );
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach($result as $item)
        {
            $author = new User(
                null,
                $item["author_username"]
            );

            $post = new Post(
                $item["id"],
                $item["title"],
                $item["excerpt"],
                $item["content"],
                $author,
                new DateTime($item["created_at"])
            );
            $posts[] = $post;
        }

        return $posts;
    }

    public function findOne(int $id) : ?Post
    {
        $query = $this->db->prepare(
            "SELECT posts.*, users.id AS user_id, users.username AS author_username 
            FROM posts 
            INNER JOIN users ON posts.author = users.id 
            WHERE posts.id = :id"
        );
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $author = new User(
                $result["user_id"],
                $result["author_username"]
            );

            $post = new Post(
                $result["id"],
                $result["title"],
                $result["excerpt"],
                $result["content"],
                $author,
                new DateTime($result["created_at"])
            );
            return $post;
        }

        return null;
    }

    public function findByCategory(int $categoryId) : array
    {
        $query = $this->db->prepare(
            "SELECT posts.*, users.username AS author_username 
            FROM posts 
            INNER JOIN users ON posts.author = users.id 
            INNER JOIN posts_categories ON posts.id = posts_categories.post_id 
            WHERE posts_categories.category_id = :categoryId"
        );
        $parameters = [
            "categoryId" => $categoryId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];

        foreach($result as $item)
        {
            $author = new User(
                null,
                $item["author_username"]
            );

            $post = new Post(
                $item["id"],
                $item["title"],
                $item["excerpt"],
                $item["content"],
                $author,
                new DateTime($item["created_at"])
            );
            $posts[] = $post;
        }

        return $posts;
    }
}