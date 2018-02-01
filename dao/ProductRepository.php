<?php

class ProductRepository implements RepositoryInterface
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli("localhost", "root", "", "epicerie");
        if ($this->mysqli->connect_errno) {
            printf("Connection failed: %s\n", $this->mysqli->connect_errno);
            exit();
        }
    }

    public function getById($id)
    {
        $type = new \Entity\Type();
        $getByIdQuery = "SELECT * FROM product WHERE idProduct = ?";
        if ($stmt = $this->mysqli->prepare($getByIdQuery)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $type->setId($row['idProduct'])->setNom($row['nomType']);
            }
            return $type;
            $stmt->close();
        }
        $this->mysqli->close();
    }

    public function getAll()
    {
        $listeTypes = [];
        $getAllTypesQuery = "SELECT * FROM type";
        if ($stmt = $this->mysqli->prepare($getAllTypesQuery)){
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $type = new \Entity\Type();
                $type->setId($row['idType'])->setNom($row['nomType']);
                $listeTypes[] = $type;
            }
            return $listeTypes;
            $stmt->close();
        }
        $this->mysqli->close();
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