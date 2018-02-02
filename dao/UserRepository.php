<?php

class UserRepository implements RepositoryInterface
{

    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    /**
     * @param $id
     * @return \Entity\User
     */
    public function getById($id)
    {
        $user = new \Entity\User();
        $getByIdQuery = "SELECT * from user WHERE idUser = ?";
        if ($stmt = $this->mysqli->prepare($getByIdQuery)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $user->setId($row['idUser'])
                    ->setLogin($row['loginUser'])
                    ->setPassword($row['passwordUser']);
            }
            $stmt->close();
        }
        return $user;
    }

    public function getAll()
    {
        $listeUsers = [];
        $getAllUsersQuery = "SELECT * FROM user";
        if ($stmt = $this->mysqli->prepare($getAllUsersQuery)) {
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $user = new \Entity\User();
                $user->setId($row['idUser'])->setLogin($row['loginUser'])->setPassword($row['passwordUser']);
                $listeUsers[] = $user;
            }
            $stmt->close();
        }
        return $listeUsers;
    }

    public function getAllByTypeId($idType)
    {
        // TODO: Implement getAllByTypeId() method.
    }

    public function create($object)
    {
        // TODO: Implement create() method.
    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
    }
}