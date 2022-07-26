<?php

class Cinema {

    public $titre;
    public $duree;
    public $genre;
    public $realisateur;
    public $annee_production;
    public $langue_diffusion;
    public $synopsis;
    public $note_presse;
    public $note_spectateurs;
    public $acteurs;
    public $horaires;

    public function __construct($titre, $duree, $genre, $realisateur, $annee_production, $langue_diffusion, $synopsis, $note_presse, $note_spectateurs) {

        $this->titre = $titre;
        $this->duree = $duree;
        $this->genre = $genre;
        $this->realisateur = $realisateur;
        $this->annee_production = $annee_production;
        $this->langue_diffusion = $langue_diffusion;
        $this->synopsis = $synopsis;
        $this->note_presse = $note_presse;
        $this->note_spectateurs = $note_spectateurs;
    }

    public function setActeurs($acteurs){
        $this->acteurs = explode(',', $acteurs);
    }

    public function setHoraires($horaires){
        $this->horaires = explode('&', $horaires);
    }

    public function toXML($filename){
        $xml_template = "<cinema></cinema>";
        $vars = get_object_vars($this);
        $xml = new SimpleXMLElement($xml_template);
        foreach($vars as $k=>$v){
            if(is_array($v))
                $xml->addChild($k);
            else
                $xml->addChild($k,$v);
        }
        // add acteurs
        foreach($this->acteurs as $acteur)
            $xml->acteurs->addChild('acteur', $acteur);
            
        // add horaires
        foreach($this->horaires as $horaire)
            $xml->horaires->addChild('horaire', $horaire);

        $xml->asXML('../'.$filename.'.xml');
    }
}
?>