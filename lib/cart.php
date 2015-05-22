<?php
namespace lib;

class Cart
{

    private $productList = array();


    public function getCount()
    {
        return count($this->productList);
    }

    public function addProduct(Product $product) {
        $this->productList[] = $product;
    }

    public function removeProduct(Product $product) {
        if(($key = array_search($product, $this->productList)) !== false) {
            unset($this->productList[$key]);
        }
    }

    public function getProducts()
    {
        foreach ($this->productList as $product) {
            yield $product;
        }
    }

    public function purgeCart()
    {
        $this->productList = array();
    }
}