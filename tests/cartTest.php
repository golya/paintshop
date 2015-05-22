<?php

require_once '../lib/product.php';
require_once '../lib/cart.php';

use lib\Product as Product;
use lib\Cart as Cart;


class CartTest extends PHPUnit_Framework_TestCase
{

    private $cart;

    public function setUp()
    {
        $this->cart = new Cart();
    }

    public function testShouldGetAnEmptyCart()
    {
        $this->assertCartCount(0);
    }

    public function testShouldAddAProductToTheCart()
    {
        $this->addAProductToTheCart();
        $this->assertCartCount(1);
    }

    public function testShouldRaiseAnError()
    {
        $this->addAProductToTheCart('not valid product');
        $this->assertCartCount(0);
    }

    public function testShouldRemoveASpecificProductFromTheCart()
    {
        $product = $this->addAProductToTheCart();
        $this->cart->removeProduct($product);
        $this->assertCartCount(0);
    }

    public function testShouldReceiveWithProducts()
    {
        $product = $this->addAProductToTheCart();
        $products = $this->cart->getProducts();
        $this->assertEquals(iterator_to_array($products), [$product]);
        $this->assertCartCount(1);
    }

    public function testShouldPurgeTheCart()
    {
        $this->addAProductToTheCart();
        $this->cart->purgeCart();
        $this->assertCartCount(0);
    }

    private function addAProductToTheCart($product = null)
    {
        if (!$product) {
            $product = new Product();
        }
        $this->cart->addProduct($product);
        return $product;
    }

    private function assertCartCount($count)
    {
        $this->assertEquals($this->cart->getCount(), $count);
    }
}