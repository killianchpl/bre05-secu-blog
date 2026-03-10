<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class UserManager extends AbstractManager
{
    public function findByEmail(string $email) : ?User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $parameters = [
            "email" => $email
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $user = new User(
                $result["id"],
                $result["username"],
                $result["email"],
                $result["password"],
                $result["role"],
                new DateTime($result["created_at"])
            );
            return $user;
        }

        return null;
    }

    public function findOne(int $id) : ?User
    {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $parameters = [
            "id" => $id
        ];
        $query->execute($parameters);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result)
        {
            $user = new User(
                $result["id"],
                $result["username"],
                $result["email"],
                $result["password"],
                $result["role"],
                new DateTime($result["created_at"])
            );
            return $user;
        }

        return null;
    }

    public function create(User $user) : void
    {
        $query = $this->db->prepare(
            "INSERT INTO users (username, email, password, role, created_at) 
            VALUES (:username, :email, :password, :role, :created_at)"
        );
        $parameters = [
            "username" => $user->getUsername(),
            "email" => $user->getEmail(),
            "password" => $user->getPassword(),
            "role" => $user->getRole(),
            "created_at" => $user->getCreatedAt()->format("Y-m-d H:i:s")
        ];
        $query->execute($parameters);
    }
}