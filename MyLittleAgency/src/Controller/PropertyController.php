<?php
namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PropertyController extends AbstractController
{
    public function index():Response
    {
        $property = new Property();
        $property->setTitle('Appartement T3 à Vitry Sur Seine')
            ->setPrice(250000)
            ->setRooms(3)
            ->setBedrooms(2)
            ->setDescription("My Little Agency vous propose à deux pas des transports, commerces et écoles, dans un secteur calme et arboré cet appartement de trois pièces comprenant : une entrée avec placard , un salon, une cuisine équipée, deux chambres, une salle de bains, WC séparés .Vous pourrez également profiter d'un balcon sans vis à vis")
            ->setSurface(68)
            ->setFloor(4)
            ->setHeat(1)
            ->setCity('Vitry Sur Seine')
            ->setAddress('22 avenue Lucien Francais')
            ->setPostalCode('94400');
        $em = $this->getDoctrine()->getManager();
        $em->persist($property);
        $em->flush();
        return $this->render('property/index.html.twig',
            ['current_menu' => 'properties']
        );
    }
}