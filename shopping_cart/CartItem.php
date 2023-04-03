<?php

class CartItem
{
    private Product $product;
    private int $quantity;

    /**
     * CartItem constructor
     *
     * @param \Product $product
     * @param int $quantity
     */

    public function __construct(\Product $product, $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    /**
     * @return \Product
     */

    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param \Product $product
     */

    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return int
     */

    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function increaseQuantity($amount = 1)
    {
        $product = $this->getProduct();
        if ($product->getAvailableQuantity() > $this->getQuantity() + $amount){
            $this->setQuantity($this->quantity + $amount);
        }
    }

    public function decreaseQuantity($amount = 1)
    {
        if ($this->getQuantity() - $amount >= 1){
            $this->setQuantity($this->quantity - $amount);
        }
    }
}