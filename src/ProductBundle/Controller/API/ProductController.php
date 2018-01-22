<?php

namespace ProductBundle\Controller\API;

use ProductBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/api/products/")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        $body = $request->getContent();
        $data = json_decode($body, true);
        $product = new Product();
        $product->setName($data['name']);
        $product->setListPrice($data['listPrice']);
        $product->setFinishedGoods($data['finishedGoods']);
        $product->setProductNumber($data['productNumber']);
        $product->setMakeFlag($data['makeFlag']);
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        $data = $this->serializeProduct($product);
        $response = new JsonResponse($data, 201);
        return $response;
    }

    /**
     * @Route("/api/products/{id}", name="get_product")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('ProductBundle:Product');
        /** @var  $product Product*/
        $product = $repo->findOneBy(['id'=> $id]);
        if (!$product) {
            throw $this->createNotFoundException(sprintf(
                'No product found with id "%s"',
                $id
            ));
        }
        $data = $this->serializeProduct($product);
        return new JsonResponse($data, 200);
    }


    /**
     * @Route("/api/products/")
     * @Method("GET")
     */
    public function listAction()
    {
        $products = $this->getDoctrine()->getRepository('ProductBundle:Product')->findAll();
        $data = array('products' => array());
        foreach ($products as $product) {
            $data['products'][] = $this->serializeProduct($product);
        }
        $response = new Response(json_encode($data), 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    private function serializeProduct(Product $product)
    {
        return $data = array(
            'name' => $product->getName(),
            'listPrice' => $product->getListPrice(),
            'finishedGoods' => $product->getFinishedGoods(),
            'productNumber' => $product->getProductNumber(),
            'makeFlag' => $product->getMakeFlag(),
        );
    }

}