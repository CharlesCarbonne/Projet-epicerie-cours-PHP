<?php
namespace Service;
use Entity\Type;

class TypeService
{
    public function getById($id){
        return \RepoFactory::createRepository(\RepoFactory::TYPE)->getById($id);
    }

    public function getAll(){
        return \RepoFactory::createRepository(\RepoFactory::TYPE)->getAll();
    }

}