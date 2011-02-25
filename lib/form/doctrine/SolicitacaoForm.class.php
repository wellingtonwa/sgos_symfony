<?php

class SolicitacaoForm extends sfForm{


    public function   configure() {
        
        $this->setWidgets(array(
          'nome'       => new sfWidgetFormInputText(),
          'email'      => new sfWidgetFormInputText(),
          'telefone'   => new sfWidgetFormInputText(),
          'celular'    => new sfWidgetFormInputText(),
          'descricao_problema'    => new sfWidgetFormTextarea(array('label'=>'Descricao do problema')),
        ));

        $this->setValidators(array(
          'nome'       => new sfValidatorString(array('max_length' => 255, 'required'=>true)),
          'email'   => new sfValidatorEmail(array('required'=>true)),
          'telefone' => new sfValidatorString(array('max_length' => 14, 'required'=>true)),
          'celular' => new sfValidatorString(array('max_length' => 14, 'required'=>true)),
          'descricao_problema' =>new sfValidatorString(array('required'=>true)),
        ));

        $this->widgetSchema->setNameFormat('solicitacao[%s]');

    }
}

?>