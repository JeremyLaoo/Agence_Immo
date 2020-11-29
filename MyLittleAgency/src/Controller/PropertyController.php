<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
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

   /**
    *   @var EntityManagerInterface
    */
   private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */

    public function index():Response
    {

    /* Entree des valeurs en dur dans la DB */

    /*    $property = new Property();
        $property->setTitle('Appartement T3 à Villejuif')
        ->setPrice(275000)
        ->setRooms(3)
        ->setBedrooms(2)
        ->setDescription("My Little Agency vous propose aux pieds des écoles, commerces, transports et accès aux grands axes routiers un appartement de 3 pièces de 80 m² offrant : une entrée avec placard, un double séjour, une cuisine aménagée, trois chambres, une salle de bains, une salle d'eau, WC séparés. Deux places de parking au sous-sol sécurisé ainsi qu'une cave accompagnent cet appartement ! Idéalement situé, laissez vous séduire par ses volumes et sa luminosité , une visite s'impose !")
        ->setSurface(55)
        ->setFloor(5)
        ->setHeat(1)
        ->setCity('Villejuif')
        ->setAddress('10 rue Marguerite Chapon')
        ->setPostalCode('94800')
        ->setImg('https://www.planete-deco.fr/wp-content/uploads/2017/10/BI0-2.jpg');
        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();
    */
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

        return $this->render('property/index.html.twig',
            ['current_menu' => 'properties']
        );
    }

          /* Fin */
  /* Deuxième méthode pour recuperer les donnees de la DB */

  /* public function index(PropertyRepository $repository):Response
      {
          $this->repository
          return $this->render('property/index.html.twig',
              ['current_menu' => 'properties']
          );
      } */


  /* Fin de la Deuxième méthode pour recuperer les donnees de la DB */

    /**
     * @Route("/biens/{slug}-{id}", name="property.show", requirements={"slug": "[a-z0-9\-]*"})
     * @return Response
     */

    public function show($slug, $id): Response
    {
        $property = $this->repository->find($id);
        return $this->render('property/show.html.twig',[
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }
}