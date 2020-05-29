<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
            'race' => 'dog'
        ],
        [
            'id' => 2,
            'name' => 'buro',
            'race' => 'cat'
        ]
    ];

    /**
     * @Route("/", name="animal_list")
     */
    public function list(){
        return new JsonResponse(self::ANIMALS);
    }

    /**
     * @Route("/{id}", name="animal_by_id", requirements={"id"="\d+"})
     */
    public function animalById($id){
        return new JsonResponse(
            self::ANIMALS[array_search($id, array_column(self::ANIMALS, 'id'))]
        );
    }

    /**
     * @Route("/{race}", name="animal_by_race")
     */
    public function animalByRace($race){
        return new JsonResponse(
            self::ANIMALS[array_search($race, array_column(self::ANIMALS, 'race'))]
        );
    }


}