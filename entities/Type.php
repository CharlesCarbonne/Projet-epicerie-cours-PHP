<?php

namespace Entity {

    class Type
    {

        protected $id;
        protected $nom;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $id
         * @return type
         */
        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        /**
         * @return mixed
         */
        public function getNomType()
        {
            return $this->nom;
        }

        /**
         * @param mixed $nom
         * @return Type
         */
        public function setNom($nom)
        {
            $this->nom = $nom;
            return $this;
        }



    }
}