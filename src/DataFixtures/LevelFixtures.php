<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Level;

/**
 * Classe qui gère les fixtures d'un objet Level qui représente le niveau d'un joueur
 */
class LevelFixtures extends Fixture
{
    /**
     * Fonction qui permet de charger les fixtures: enregistrement des niveaux en base de données
     *
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i<4; $i++){
            $level = new Level();
            switch($i){
                case 0:
                    $level->setImage('level1_concept.png'); 
                    $level->setNomLevel('conception');
                    break;
                case 1:
                    $level->setImage('level2_dev.png'); 
                    $level->setNomLevel('developpement');
                    break;
                case 2:
                    $level->setImage('level3_prod.png'); 
                    $level->setNomLevel('production');
                    break;
                case 3:    
                    $level->setImage('404.png'); 
                    $level->setNomLevel('404'); 
                    break;
            }
            $manager->persist($level);
        }

        $manager->flush();
    }
}
