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
          'nome'       => new sfValidatorString(array('max_length' => 255)),
          'email'   => new sfValidatorEmail(),
          'telefone' => new sfValidatorString(array('max_length' => 14)),
          'celular' => new sfValidatorString(array('max_length' => 14)),
        ));


        $this->widgetSchema->setNameFormater('solicitacao[%s]');

    }
}

?>