<?php

namespace Entity {

    class Type
    {

        protected $nom;

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