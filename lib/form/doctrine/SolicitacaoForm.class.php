<?php

class SolicitacaoForm extends BaseSolicitacaoForm{


    public function   configure() {


        unset($this['created_at'], $this['updated_at'], $this['idOrdemServico']);

        $this->widgetSchema['email']->setOption('label', 'E-mail');
        $this->widgetSchema['telefone1']->setOption('label', 'Telefone Comercial');
        $this->widgetSchema['telefone2']->setOption('label', 'Telefone Celular');

        $this->setValidators(array(
          'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false), array('required'=>'Campo obrigatório')),
          'nome'        => new sfValidatorString(array('max_length' => 255, 'required'=>true), array('required'=>'Campo obrigatório')),
          'email'       => new sfValidatorEmail(array('required'=>true), array('required'=>'Campo obrigatório')),
          'telefone1'   => new sfValidatorString(array('max_length' => 14, 'required'=>true), array('required'=>'Campo obrigatório')),
          'telefone2'   => new sfValidatorString(array('max_length' => 14, 'required'=>true), array('required'=>'Campo obrigatório')),
          'descricao_problema' =>new sfValidatorString(array('required'=>true), array('required'=>'Campo obrigatório')),
        ));
        
        
        $this->widgetSchema->setNameFormat('solicitacao[%s]');

    }
}



?>