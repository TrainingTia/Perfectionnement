<?php

// Classe Item représentant un article dans le panier d'achat
class Item {
  public $id;
  public $name;
  public $price;
  public $quantity;

  // Constructeur pour initialiser les propriétés d'un article
  public function __construct($id, $name, $price, $quantity) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->quantity = $quantity;
  }
}

// Classe Cart représentant le panier d'achat
class Cart {
  private $items = [];

  // Ajouter un article au panier
  public function addItem($item) {
    array_push($this->items, $item);
  }

  // Supprimer un article du panier
  public function removeItem($id) {
    foreach ($this->items as $key => $item) {
      if ($item->id == $id) {
        unset($this->items[$key]);
        break;
      }
    }
  }

  // Calculer le montant total du panier
  public function getTotal() {
    $total = 0;
    foreach ($this->items as $item) {
      $total += $item->price * $item->quantity;
    }
    return $total;
  }

  // Obtenir la liste des articles dans le panier
  public function getItems() {
    return $this->items;
  }
}

// Créer un objet Cart et ajouter des articles
$cart = new Cart();
$cart->addItem(new Item(1, "Article 1", 10, 2));
$cart->addItem(new Item(2, "Article 2", 5, 3));
$cart->addItem(new Item(3, "Article 3", 20, 1));

// Afficher le montant total du panier
echo "Le montant total est de " . $cart->getTotal() . "€";

?>
