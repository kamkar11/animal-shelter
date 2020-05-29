<?php


namespace App\Controller;


use App\Entity\Animal;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/animal")
 */
class AnimalController extends AbstractController
{

    /**
     * @Route("/", name="animal_list")
     */
    public function list(Request $request){

        $limit = $request->get('limit', 10);
        $repository = $this->getDoctrine()->getRepository(Animal::class);
        $items = $repository->findAll();

        return $this->json(
            [
                'limit' => $limit,
                'data' => $items
            ]

        );
    }

    /**
     * @Route("/{id}", name="animal_by_id", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function animalById($id){
        return $this->json(
            $this->getDoctrine()->getRepository(Animal::class)->find($id)
        );
    }

    /**
     * @Route("/{name}", name="animal_by_name", methods={"GET"})
     */
    public function animalByName($name){
        return $this->json(
            $this->getDoctrine()->getRepository(Animal::class)->findOneBy(['name' => $name])
        );
    }

    /**
     * @Route("/add", name="animal_add", methods={"POST"})
     */
    public function addAnimal(Request $request){

        /** @var Serializer $serializer */
       $serializer = $this->get('serializer');

       $animal = $serializer->deserialize($request->getContent(),Animal::class, 'json');

       $em = $this->getDoctrine()->getManager();
       $em->persist($animal);
       $em->flush();

       return $this->json($animal);
    }



}