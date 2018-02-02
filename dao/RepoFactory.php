<?php

class RepoFactory
{
    const USER = "user";
    const PRODUCT = "product";
    const TYPE = "type";

    /**
     * @param $repoName
     * @return RepositoryInterface
     */
    public static function createRepository($repoName) : RepositoryInterface
    {

        $config = \Service\Configuration::getInstance();

        $mysqli = new mysqli($config->getHost(), $config->getUsername(), $config->getPassword(), $config->getDbName());
        if ($mysqli->connect_errno) {
            printf("Connection failed: %s\n", $mysqli->connect_errno);
            exit();
        }

        if ($repoName == self::USER){
            $ur = new UserRepository($mysqli);
            return $ur;
        } elseif($repoName == self::TYPE){
            $tr = new TypeRepository($mysqli);
            return $tr;
        }
        elseif($repoName == RepoFactory::PRODUCT){
            $pr = new ProductRepository($mysqli, RepoFactory::createRepository(self::TYPE));
            return $pr;
        }
    }

}