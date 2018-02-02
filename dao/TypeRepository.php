<?php

class TypeRepository implements RepositoryInterface
{

    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function getById($id)
    {
        $type = new \Entity\Type();
        $getByIdQuery = "SELECT * FROM type WHERE idType = ?";
        if ($stmt = $this->mysqli->prepare($getByIdQuery)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $type->setId($row['idType'])->setNom($row['nomType']);
            }
            $stmt->close();
        }
        return $type;
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
            $stmt->close();
        }
        return $listeTypes;
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

    public function getAllByTypeId($idType)
    {
        // TODO: Implement getAllByTypeId() method.
    }
}