<?php

/**
 * Incluimos a injeção da model
 */
include_once("models/Product.php");

class ProductDAO implements ProductDAOInterface {
  
  //conexao
  private $conn;

  /**
   * Construtor da conexao
   */
  public function __construct(PDO $conn)
  {
    $this->conn = $conn;
  }

  /**
   * Busca todos os produtos
   */
  public function findAll()
  {
    $products = array();
    $stmp = $this->conn->query("SELECT * FROM products");

    $data = $stmp->fetchAll();

    foreach ($data as $atribute) {

      $product = new product();

      $product->setId($atribute["id_product"]);
      $product->setName($atribute["name_product"]);
      $product->setDesc($atribute["description"]);

      array_push($products, $product);
    }

    return $products;

  }

  /**
   * Cria uma isntancia de objeto Produto inserindo no banco de dados
   */
  public function create(product $product)
  {
    $stmp = $this->conn->prepare("INSERT INTO products(name_product, description) VALUES (:name_product, :description)");

    $stmp->bindValue(":name_product", $product->getName());
    $stmp->bindValue(":description", $product->getDesc());

    $stmp->execute();
  }
}