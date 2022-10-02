<?php
class Product
{
	private $id;
	private $name;
	private $description;
	private $price;
	private $image;
	private $id_group;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function setImage($image)
	{
		$this->image = $image;
	}

	public function getImage()
	{
		return $this->image;
	}

	public function setGroup($id_group)
	{
		$this->id_group = $id_group;
	}

	public function getGroup()
	{
		return $this->id_group;
	}

	public function read()
	{
		echo "product_id=" . $this->id . "<br>";
		echo "product_name=" . $this->name . "<br>";
		echo "product_description=" . $this->description . "<br>";
		echo "product_price=" . $this->price . "<br>";
		echo "id_group=" . $this->id_group . "<br>";
	}

	public function create()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare(
			"INSERT INTO products (product_id, product_name, product_description, product_price, product_image, id_group) VALUES (:id, :name, :description, :price, :image, :group)"
		);
		$st->bindValue(":id", $this->getId());
		$st->bindValue(":name", $this->getName());
		$st->bindValue(":description", $this->getDescription());
		$st->bindValue(":price", $this->getPrice());
		$st->bindValue(":image", $this->getImage());
		$st->bindValue(":group", $this->getGroup());

		return $st->execute();
	}

	public function update()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare(
			"UPDATE products SET product_name = :name, product_description = :description, product_price = :price, id_group = :group WHERE product_id = :id"
		);
		$st->bindValue(":id", $this->getId());
		$st->bindValue(":name", $this->getName());
		$st->bindValue(":description", $this->getDescription());
		$st->bindValue(":price", $this->getPrice());
		$st->bindValue(":group", $this->getGroup());

		return $st->execute();
	}

	public function delete()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("DELETE FROM products WHERE product_id = :id");
		$st->bindValue(":id", $this->getId());

		return $st->execute();
	}

	public function getAllProducts()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("SELECT * FROM products p  LEFT OUTER JOIN groups g ON p.id_group = g.group_id ORDER BY p.created_at DESC");
		$st->execute();

		return $st;
	}

	public function findProductById()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("SELECT * FROM products WHERE product_id = :id");
		$st->bindValue(":id", $this->getId());
		$st->execute();

		return $st;
	}
}
