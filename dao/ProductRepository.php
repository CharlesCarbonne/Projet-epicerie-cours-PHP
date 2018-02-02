<?php

class ProductRepository implements RepositoryInterface
{
    /** @var  mysqli */
    private $mysqli;
    private $typeRepository;

    public function __construct($mysqli, $typeRepository)
    {
        $this->mysqli = $mysqli;
        $this->typeRepository = $typeRepository;
    }

    public function getById($id)
    {
        $product = new \Entity\Product();
        $getByIdQuery = "SELECT * FROM product WHERE idProduct = ?";
        if ($stmt = $this->mysqli->prepare($getByIdQuery)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $product->setId($row['idProduct'])
                    ->setNom($row['nomProduct'])
                    ->setPrix($row['prixProduct'])
                    ->setType($this->typeRepository->getById($row['typeProduct']))
                    ->setMoisSemis($row['moisSemisProduct'])
                    ->setStock($row['stockProduct'])
                    ->setAvatarName($row['avatarProduct']);
            }
            $stmt->close();
        }
        return $product;
    }

    public function getAll()
    {
        $listeProducts = [];
        $getAllProductsQuery = "SELECT * FROM product";
        if ($stmt = $this->mysqli->prepare($getAllProductsQuery)) {
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $product = new \Entity\Product();
                $product->setId($row['idProduct'])
                    ->setNom($row['nomProduct'])
                    ->setPrix($row['prixProduct'])
                    ->setType($this->typeRepository->getById($row['typeProduct']))
                    ->setMoisSemis($row['moisSemisProduct'])
                    ->setStock($row['stockProduct'])
                    ->setAvatarName($row['avatarProduct']);
                $listeProducts[] = $product;
            }
            $stmt->close();
        }
        return $listeProducts;
    }

    public function getAllByTypeId($idType)
    {
        $listeProducts = [];
        $getAllProductsQuery = "SELECT * FROM product WHERE typeProduct = ?";

        if ($stmt = $this->mysqli->prepare($getAllProductsQuery)) {
            $stmt->bind_param('i', $idType);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $product = new \Entity\Product();
                $product->setId($row['idProduct'])
                    ->setNom($row['nomProduct'])
                    ->setPrix($row['prixProduct'])
                    ->setType($this->typeRepository->getById($row['typeProduct']))
                    ->setMoisSemis($row['moisSemisProduct'])
                    ->setStock($row['stockProduct'])
                    ->setAvatarName($row['avatarProduct']);
                $listeProducts[] = $product;
            }
            $stmt->close();
        }
        return $listeProducts;
    }

    /** @var \Entity\Product $object */

    public function create($object)
    {
        $nomProduct = $object->getNom();
        $prixProduct = $object->getPrix();
        $typeProduct = $object->getType()->getId();
        $moisSemis = $object->getMoisSemis();
        $stockProduct = $object->getStock();
        $avatarProduct = $object->getAvatarName();
        $query = "INSERT INTO product (nomProduct, prixProduct, typeProduct, moisSemisProduct, stockProduct, avatarProduct) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('sdiiis', $nomProduct, $prixProduct, $typeProduct, $moisSemis, $stockProduct, $avatarProduct);
        $stmt->execute();
        $stmt->close();
        return $this->mysqli->insert_id;
    }

    /** @var \Entity\Product $object */
    public function update($object)
    {
        $idProduct = $object->getId();
        $nomProduct = $object->getNom();
        $prixProduct = $object->getPrix();
        $typeProduct = $object->getType()->getId();
        $moisSemis = $object->getMoisSemis();
        $stockProduct = $object->getStock();
        $avatarProduct = $object->getAvatarName();
        $query = "UPDATE product SET nomProduct = ?, prixProduct = ?, typeProduct = ?, moisSemisProduct = ?, stockProduct = ?, avatarProduct = ? WHERE idProduct = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('sdiiisi', $nomProduct, $prixProduct, $typeProduct, $moisSemis, $stockProduct, $avatarProduct, $idProduct);
        $stmt->execute();
        $stmt->close();
    }

    /**@var \Entity\Product $object */
    public function delete($object)
    {
       $idProduct = $object->getId();
        $query = "DELETE FROM product WHERE idProduct = ?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param('i', $idProduct);
        $stmt->execute();
        $stmt->close();
    }
}