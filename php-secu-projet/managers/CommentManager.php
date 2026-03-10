<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class CommentManager extends AbstractManager
{
    public function findByPost(int $postId) : array
    {
        $query = $this->db->prepare(
            "SELECT comments.*, users.username AS author_username 
            FROM comments 
            INNER JOIN users ON comments.user_id = users.id 
            WHERE comments.post_id = :postId"
        );
        $parameters = [
            "postId" => $postId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        $comments = [];

        foreach($result as $item)
        {
            $user = new User(
                null,
                $item["author_username"]
            );

            $comment = new Comment(
                $item["id"],
                $item["content"],
                $user
            );
            $comments[] = $comment;
        }

        return $comments;
    }

    public function create(Comment $comment) : void
    {
        $query = $this->db->prepare(
            "INSERT INTO comments (content, user_id, post_id) 
            VALUES (:content, :user_id, :post_id)"
        );
        $parameters = [
            "content" => $comment->getContent(),
            "user_id" => $comment->getUser()->getId(),
            "post_id" => $comment->getPost()->getId()
        ];
        $query->execute($parameters);
    }
}