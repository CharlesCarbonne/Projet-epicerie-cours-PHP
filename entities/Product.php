<?php

namespace Entity {
    class Product
    {

        protected $id;
        protected $nom;
        protected $prix;
        protected $type;
        protected $mois_semis;
        protected $stock;
        protected $avatarName;

        public function __construct($id = null, $nom = null, $prix = null, $type = null, $mois_semis = null, $stock = null, $avatarName = null)
        {
            $this->id = $id;
            $this->nom = $nom;
            $this->prix = $prix;
            $this->type = $type;
            $this->mois_semis = $mois_semis;
            $this->stock = $stock;
            $this->avatarName = $avatarName;
        }

        /**
         * @return null
         */
        public function getAvatarName()
        {
            return $this->avatarName;
        }

        /**
         * @param null $avatarName
         * @return Product
         */
        public function setAvatarName($avatarName)
        {
            $this->avatarName = $avatarName;
            return $this;
        }

        /**
         * @return null
         */
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getNom()
        {
            return $this->nom;
        }

        /**
         * @param mixed $nom
         * @return Product
         */
        public function setNom($nom)
        {
            $this->nom = $nom;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getPrix()
        {
            return $this->prix;
        }

        /**
         * @param mixed $prix
         * @return Product
         */
        public function setPrix($prix)
        {
            $this->prix = $prix;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @param mixed $type
         * @return Product
         * @throws \Exception
         */
        public function setType($type)
        {

            if(!$type instanceof Type){
                throw new \Exception('Le type fourni n\'est pas valide');
            }
            $this->type = $type;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getMoisSemis()
        {
            return $this->mois_semis;
        }

        /**
         * @param mixed $mois_semis
         * @return Product
         */
        public function setMoisSemis($mois_semis)
        {
            $this->mois_semis = $mois_semis;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getStock()
        {
            return $this->stock;
        }

        /**
         * @param mixed $stock
         * @return Product
         */
        public function setStock($stock)
        {
            $this->stock = $stock;
            return $this;
        }



    }
}