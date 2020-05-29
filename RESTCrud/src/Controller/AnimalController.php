<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/animal")
 */
class AnimalController extends AbstractController
{

    private const ANIMALS = [
        [
            'id' => 1,
            'name' => 'reksio',
            'biography' => 'alirtharth pira prhap thraeth pah paretp aert aerhtagvfaourg gawt ouagaeritgarefgi rg gr iag',
            'race' => 'dog'
        ],
        [
            'id' => 2,
            'name' => 'buro',
            'biography' => 'akurfuar ratgaeriyargf lragf ilare lhgarlt arelth gaerl traelg relt raelth ',
            'race' => 'cat'
        ]
    ];

    /**
     * @Route("/", name="animal_list")
     */
    public function list(){
        return $this->json(self::ANIMALS);
    }

    /**
     * @Route("/{id}", name="animal_by_id", requirements={"id"="\d+"})
     */
    public function animalById($id){
        return $this->json(
            self::ANIMALS[array_search($id, array_column(self::ANIMALS, 'id'))]
        );
    }

    /**
     * @Route("/{name}", name="animal_by_name")
     */
    public function animalByName($name){
        return $this->json(
            self::ANIMALS[array_search($name, array_column(self::ANIMALS, 'name'))]
        );
    }


}