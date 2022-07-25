<?php
    class Restaurant{
        // coordonnees
        public $nom;
        public $adresse;
        public $restaurateur;
        public $description;
        public $devise;
        // carte(plats)
        public $plats;
        

        public function __construct($nom, $adresse, $restaurateur, $description, $devise)
        {
            $this->nom = $nom;
            $this->adresse = $adresse;
            $this->restaurateur = $restaurateur;
            $this->description = $description;
            $this->devise = $devise;
        }
        
        public function setPlats($types, $prix, $descriptions){
            $types = explode(',', $types);
            $prix = explode(',', $prix);
            $descriptions = explode('&', $descriptions);
            $out = array_map(null, $types, $prix, $descriptions);
            $this->plats = $out;
        }

        public function toXML($filename){
            $xml_template = "<portail></portail>";;
            $xml = new SimpleXMLElement($xml_template);
            $xml->addChild('fiche');
            $coord = $xml->fiche->addChild('coordonnees');
            $coord->addChild('nom', $this->nom);
            $coord->addChild('adresse', $this->adresse);
            $coord->addChild('restaurateur', $this->restaurateur);
            $coord->addChild('description', $this->description);
            $xml->addChild('carte');
            foreach($this->plats as $plat){
                $new_plat = $xml->carte->addChild('plat');
                $new_plat->addAttribute('typeRepase', $plat[0]);
                $prix = $new_plat->addChild('prix', $plat[1]);
                $prix->addAttribute('devise', $this->devise);
                $new_plat->addChild('descriptionPlat', $plat[2]);
            }

            $xml->asXML($filename.'.xml');

        }

    }
?>