<?php

class Product
{
    public $id;
    public $name;
    public $price;
    public $ownerId;

    public function __construct($id, $name, $price, $ownerId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->ownerId = $ownerId;
    }

    public function __toString()
    {
        return $this->name . ', id: ' . $this->id . ', ownerId: ' . $this->ownerId;
    }
}

class User
{
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name . ', id: ' . $this->id;
    }

    public function notify($message)
    {
        echo 'Hello ' . $this . '. You have a new message: ' . $message;
    }
}

class UserProductRelation
{
    public $productId;
    public $customerId;

    public function __construct($productId, $customerId)
    {
        $this->productId = $productId;
        $this->customerId = $customerId;
    }
}

class Bid extends UserProductRelation
{
    public $amount;

    public function __construct($productId, $customerId, $amount)
    {
        parent::__construct($productId, $customerId);
        $this->amount = $amount;
    }
}

class Wish extends UserProductRelation
{
}

class AuctionMarketplace
{
    private static $instance;
    private $products;
    private $users;

    private $wishlist;
    private $bids;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new AuctionMarketplace();
        }

        return self::$instance;
    }

    public function addProduct($product)
    {
        $this->products[$product->id] = $product;
    }

    public function addUser($user)
    {
        $this->users[$user->id] = $user;
    }

    public function addProductToWishlist($productId, $customerId)
    {
        //customer add product to wishlist
        $this->wishlist[] = new Wish($productId, $customerId);

        $message = 'User: ' . $this->users[$customerId] . ' wanted Product: ' . $this->products[$productId] . '<br>';
        echo $message;

        $this->notifyInterestedCustomersAndProductOwner($productId, $customerId, $message);
    }

    public function removeProductFromWishlist($productId, $customerId, $notify = true)
    {
        foreach ($this->wishlist as $index => $wish) {
            if ($wish->productId === $productId && $wish->customerId === $customerId) {
                //customer remove product from wishlist
                unset($this->wishlist[$index]);

                if ($notify) {
                    $message = 'User: ' . $this->users[$customerId] . ' remove Product: ' . $this->products[$productId] . ' from wishlist <br>';
                    echo $message;

                    $this->notifyInterestedCustomersAndProductOwner($productId, $customerId, $message);
                }

                return;
            }
        }
    }

    public function productBid($productId, $customerId, $amount)
    {
        //customer add product to wishlist
        $this->addProductToWishlist($productId, $customerId);
        //customer make bid for product
        $this->bids[] = new Bid($productId, $customerId, $amount);

        $message = 'User: ' . $this->users[$customerId] . ' offer ' . $amount . ' for Product: ' . $this->products[$productId] . '<br>';
        echo $message;

        $this->notifyInterestedCustomersAndProductOwner($productId, $customerId, $message);
    }

    public function withdrawProductBid($productId, $customerId)
    {
        foreach ($this->bids as $index => $bid) {
            if ($bid->productId === $productId && $bid->customerId === $customerId) {
                //customer withdraw bid for product
                unset($this->bids[$index]);

                $message = 'User: ' . $this->users[$customerId] . ' withdraw bid for Product: ' . $this->products[$productId] . '<br>';
                echo $message;

                $this->notifyInterestedCustomersAndProductOwner($productId, $customerId, $message);

                return;
            }
        }
    }

    public function sellProduct($productId, $customerId)
    {
        foreach ($this->bids as $index => $bid) {
            if ($bid->productId === $productId && $bid->customerId === $customerId) {
                // remove bid of customer
                unset($this->bids[$index]);

                // set new product owner (sell product)
                $this->products[$productId]->ownerId = $customerId;

                // remove product from customer's wishlist
                $this->removeProductFromWishlist($productId, $customerId, false);

                $product = $this->products[$productId];
                $message = 'User: ' . $this->users[$product->ownerId]
                . ' sells Product: ' . $product . ' to User: '
                    . $this->users[$customerId] . '<br>';
                echo $message;

                $this->notifyInterestedCustomers($productId, $customerId, $message);

                return;
            }
        }
    }

    private function notifyInterestedCustomersAndProductOwner($productId, $customerId, $message)
    {
        //notify all interested customers to product
        $this->notifyInterestedCustomers($productId, $customerId, $message);

        //notify product owner
        echo '<br> Notifying product owner... <br>';
        $this->users[$this->products[$productId]->ownerId]->notify($message);

        echo '<br>';
    }

    private function notifyInterestedCustomers($productId, $customerId, $message)
    {
        echo '<br> Notifying all interested customers... <br>';
        foreach ($this->wishlist as $wish) {
            if ($wish->productId === $productId && $wish->customerId !== $customerId) {
                $this->users[$wish->customerId]->notify($message);
            }
        }
        echo '<br>';
    }

    public function listWishlists()
    {
        $customersWishlists = [];

        foreach ($this->wishlist as $wish) {
            $customersWishlists[$wish->customerId][] = $wish->productId;
        }

        $this->listCollection('Wishlists', $customersWishlists, $this->users, $this->products);
    }

    public function listBids()
    {
        $bidsForProducts = [];

        foreach ($this->bids as $bid) {
            $bidsForProducts[$bid->productId][] = $bid->customerId;
        }

        $this->listCollection('Bids', $bidsForProducts, $this->products, $this->users);
    }

    private function listCollection($collectionName, $collection, $primaryCollection, $secondaryCollection)
    {
        echo '<br> ' . $collectionName . '<ul>';
        foreach ($collection as $primaryId => $secondaryIds) {
            echo '<li>' . $primaryCollection[$primaryId] . '</li>';
            echo '<ol>';
            foreach ($secondaryIds as $secondaryId) {
                echo '<li>' . $secondaryCollection[$secondaryId] . '</li>';
            }
            echo '</ol>';
        }
        echo '</ul>';
    }
}

$user1 = new User(1, 'Marko Markovic');
$user2 = new User(2, 'Nikola Nikolic');
$user3 = new User(3, 'Ivan Ivanovic');
$user4 = new User(4, 'Jovan Jovanovic');

$product1 = new Product(1, 'laptop', 1000, 4); //user4 is owner of product1

AuctionMarketplace::getInstance()->addUser($user1);
AuctionMarketplace::getInstance()->addUser($user2);
AuctionMarketplace::getInstance()->addUser($user3);
AuctionMarketplace::getInstance()->addUser($user4);

AuctionMarketplace::getInstance()->addProduct($product1);

AuctionMarketplace::getInstance()->addProductToWishlist($product1->id, $user1->id); //user1 wish product1
AuctionMarketplace::getInstance()->listWishlists();

AuctionMarketplace::getInstance()->productBid($product1->id, $user2->id, 1200); //user2 make offer for product1
AuctionMarketplace::getInstance()->listBids();
AuctionMarketplace::getInstance()->listWishlists();

AuctionMarketplace::getInstance()->productBid($product1->id, $user3->id, 1400); //user3 make offer for product1
AuctionMarketplace::getInstance()->listBids();
AuctionMarketplace::getInstance()->listWishlists();

AuctionMarketplace::getInstance()->sellProduct($product1->id, $user3->id); //user4 sell product to user3
AuctionMarketplace::getInstance()->listBids();
AuctionMarketplace::getInstance()->listWishlists();

AuctionMarketplace::getInstance()->withdrawProductBid($product1->id, $user2->id); //user2 withdraw bid for product1
AuctionMarketplace::getInstance()->listBids();
AuctionMarketplace::getInstance()->listWishlists();

AuctionMarketplace::getInstance()->removeProductFromWishlist($product1->id, $user1->id); //user1 remove product1 from wishlist
AuctionMarketplace::getInstance()->removeProductFromWishlist($product1->id, $user2->id); //user2 remove product1 from wishlist
AuctionMarketplace::getInstance()->listWishlists();
