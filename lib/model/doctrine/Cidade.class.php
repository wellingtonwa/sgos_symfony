<?php

/**
 * Cidade
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sgos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Cidade extends BaseCidade
{
    public function __toString(){
        return sprintf('%s(%s-%s)', $this->getNome(), $this->getEstado()->getSigla(), $this->getEstado()->getPais()->getSigla());
    }

    
    public function save(Doctrine_Connection $conn = null){

        if($this->isNew()){
            $this->setCreatedAt(date('Y-m-d H:i:s'));
            $this->setUpdatedAt("");
        }
        else{
            $this->setCreatedAt($this->getCreatedAt());
            $this->setUpdatedAt(date('Y-m-d H:i:s'));
        }
        return parent::save($conn);
    }
}