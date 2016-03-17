<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Product;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

/**
 * Product controller.
 *
 * @Route("/product")
 */
class ProductController extends JsonController
{
    /**
     * @Route("")
     * @Method("POST")
     */
    public function createProductAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $requestData = json_decode($request->getContent(), true);
        $product = new Product();
        $properties = array('name', 'quantitySzczecinek', 'quantityWroclaw', 'basePrice', 'price', 'description', 'avaliable', 'avaliableFrom', 'avaliableUntil', 'externalUrl');
        try{
            foreach ($properties as $property)
            {
                if (array_key_exists($property, $requestData))
                {
                    $product->set($property, $requestData[$property]);
                }
                else if ($property != 'description' && $property != 'avaliableFrom' && $property != 'avaliableUntil' && $property != 'externalUrl')
                {
                    return $this->JsonFail('Pole ' . $property . ' jest wymagane' );
                }
            }
            $em->persist($product);
            $em->flush();
        } catch (Exception $e) {
            return $this->JsonFail('Dodawanie nie powiodło się');
        }
        return $this->JsonSuccess('Dodano produkt');
    }

    /**
     * @Route("/list")
     * @Method("GET")
     */
    public function listProductAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $context = SerializationContext::create()->setGroups(array('productList'));

        try{
            $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();
            $products = json_decode(SerializerBuilder::create()->build()->serialize($products, 'json', $context));

        } catch (Exception $e){
            return $this->JsonFail($e);
        }
        return $this->JsonData($products);
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     */
    public function getProductAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $context = SerializationContext::create()->setGroups(array('productList'));

        try{
            $product = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);
            $product = json_decode(SerializerBuilder::create()->build()->serialize($product, 'json', $context));

        } catch (Exception $e){
            return $this->JsonFail($e);
        }
        return $this->JsonData($product);
    }

    /**
     * @Route("/{id}")
     * @Method("PUT")
     */
    public function editProductAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $requestData = json_decode($request->getContent(), true);

        $product = $em->getRepository('AppBundle:Product')->find($id);
        $properties = array('name', 'quantitySzczecinek', 'quantityWroclaw', 'basePrice', 'price', 'description', 'avaliable', 'avaliableFrom', 'avaliableUntil', 'externalUrl');
        try{
            foreach ($properties as $property)
            {
                if (array_key_exists($property, $requestData))
                {
                    $product->set($property, $requestData[$property]);
                }
            }
            $em->persist($product);
            $em->flush();
        } catch (Exception $e) {
            return $this->JsonFail('Edycja nie powiodła się');
        }
        return $this->JsonSuccess('Edytowano produkt');
    }

    /**
     * @Route("/{id}")
     * @Method("DELETE")
     */
    public function removeProductAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $product = $em->getRepository('AppBundle:Product')->find($id);

        try{
            $em->remove($product);
            $em->flush();
        } catch (Exception $e) {
            $this->JsonFail('Usuwanie się nie powiodło');
        }
        return $this->JsonSuccess('Usunieto produkt');
    }   
}
