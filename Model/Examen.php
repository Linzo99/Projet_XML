<?php
class Examen {
    
    public $code;
    public $titre;
    public $annee;
    public $mois;
    public $questions;

    public function __construct($code, $titre, $annee, $mois){
        $this->code = $code;
        $this->titre = $titre;
        $this->annee = $annee;
        $this->mois = $mois;
    }

    public function setQuestions($questions){
        $this->questions = $questions;
    }

    public function toXML($filename){
        $xml_template = "<examen></examen>";;
        $xml = new SimpleXMLElement($xml_template);
        $xml->addChild('code', $this->code);
        $xml->addChild('titre', $this->titre);
        $xml->addChild('date');
        $xml->date->addAttribute('annee', $this->annee);
        $xml->date->addAttribute('mois', $this->mois);
        $xml->addChild('questions');
        // add questions as partie
        foreach($this->questions as $question){
            $quest = $xml->questions->addChild('question');
            $quest->addChild('partie', $question);
        }

        $xml->asXML($filename.'.xml');
    }
}
?>