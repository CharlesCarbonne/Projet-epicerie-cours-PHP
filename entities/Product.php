<?php

namespace Entity {
    class Product
    {

        protected $nom;
        protected $prix;
        protected $type;
        protected $mois_semis;
        protected $stock;

        public function __construct($nom = null, $prix = null, $type = null, $mois_semis = null, $stock = null)
        {
            $this->nom = $nom;
            $this->prix = $prix;
            $this->type = $type;
            $this->mois_semis = $mois_semis;
            $this->stock = $stock;
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