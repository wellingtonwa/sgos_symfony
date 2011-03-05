<?php

class SolicitacaoForm extends BaseSolicitacaoForm{


    public function   configure() {


        unset(
            $this['created_at'],
            $this['updated_at']
                );

        $this->widgetSchema['email']->setOption('label', 'E-mail');
        $this->widgetSchema['telefone1']->setOption('label', 'Telefone Comercial');
        $this->widgetSchema['telefone2']->setOption('label', 'Telefone Celular');

        $this->setValidators(array(
          'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
          'nome'        => new sfValidatorString(array('max_length' => 255, 'required'=>true)),
          'email'       => new sfValidatorEmail(array('required'=>true)),
          'telefone1'   => new sfValidatorString(array('max_length' => 14, 'required'=>true)),
          'telefone2'   => new sfValidatorString(array('max_length' => 14, 'required'=>true)),
          'descricao_problema' =>new sfValidatorString(array('required'=>true)),
        ));

        $this->widgetSchema->setNameFormat('solicitacao[%s]');

    }
}

?>