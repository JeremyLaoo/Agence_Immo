<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PropertyController extends AbstractController
{

  /* Premiere methode pour recuperer les donnees de la DB */

    /**
    *   @var PropertyRepository
    */
   private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index():Response
    {

    /* Entree des valeurs en dur dans la DB */

        $property = new Property();
        $property->setTitle('Appartement T4 à Ivry Sur Seine')
        ->setPrice(290000)
        ->setRooms(4)
        ->setBedrooms(3)
        ->setDescription("My Little Agency vous propose aux pieds des écoles, commerces, transports ( RER A Boissy Saint Léger, Bus ) et accès aux grands axes routiers ( A86, N19 ) un appartement de 5 pièces de 96 m² offrant : une entrée avec placard, un double séjour, une cuisine aménagée, trois chambres, une salle de bains, une salle d'eau, WC séparés. Deux places de parking au sous-sol sécurisé ainsi qu'une cave accompagnent cet appartement ! Idéalement situé, laissez vous séduire par ses volumes et sa luminosité , une visite s'impose !")
        ->setSurface(80)
        ->setFloor(6)
        ->setHeat(1)
        ->setCity('Ivry Sur Seine')
        ->setAddress('7 rue Maurice Grandcoing')
        ->setPostalCode('94200');
        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();
        /* Fin Entree des valeurs en dur dans la DB */

        /* Recuperer un seul enregistrement par l id=

        $property = $this->repository->find(1);
        dump($property);

        Fin */

        /* Renvoi un tableau qui contient l'ensemble des biens

        $property = $this->repository->findAll();
        dump($property);

         Fin */

         /* Recuperer un enregistrement selon des critères ici il renvoi tous les enregistrement qui contient floor 4

                 $property = $this->repository->findOneBy(['floor'=>4]);
                 dump($property);

         Fin */

         /* Creation dans le propertyRepository.php une méthode pour récuperer un enregistrement  */

        $property = $this->repository->findAllVisible();
        dump($property);
        return $this->render('property/index.html.twig',
            ['current_menu' => 'properties']
        );
    }

  /* Fin de première méthode pour recuperer les donnees de la DB */
  /* Deuxième méthode pour recuperer les donnees de la DB */

  /* public function index(PropertyRepository $repository):Response
      {
          $this->repository
          return $this->render('property/index.html.twig',
              ['current_menu' => 'properties']
          );
      } */


  /* Fin de la Deuxième méthode pour recuperer les donnees de la DB */
}