<?php

class Cart
{
    /**
     * @var cartItem[]
     */
    private array $items = [];

    /**
     * @return \CartItem[]
     */

    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param \CartItem[] $items
     */

    public function setItems($items)
    {
        $this->items = $items;
    }
    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int     $quantity
     * @return \CartItem
     * @throws \Exception
     */

    public function addProduct(Product $product, int $quantity)
    {
        if ($product->getAvailableQuantity() < $quantity){
            throw new Exception('You can not add Product to Cart');
        }
        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        return $cartItem;
    }

    private function findCartItem(int $productId)
    {
        foreach ($this->items as $cartItem){
            if ($cartItem->getProduct()->getId() === $productId){
                return $cartItem;
            }
        }
        return null;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */

    public function removeProduct(Product $product)
    {
        $cartItem = $this->findCartItem($product->getId());
        foreach ($this->items as $index => $item){
            if ($item === $cartItem){
                unset($this->items[$index]);
            }
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */

    public function getTotalQuantity()
    {
        $total = 0;
        foreach ($this->items as $cartItem){
            $total+= $cartItem->getQuantity();
        }
        return $total;
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */

    public function getTotalSum()
    {
        $sum = 0;
        foreach ($this->items as $cartItem) {
            $sum+= $cartItem->getProduct()->getPrice() * $cartItem->getQuantity();
        }
        return $sum;
    }

}