<?php

class Group
{
	private $id;
	private $name;

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

	public function read()
	{
		echo "group_id=" . $this->id . "<br>";
		echo "group_name=" . $this->name . "<br>";
	}

	public function create()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("INSERT INTO groups (group_id, group_name) VALUES (:id, :name)");
		$st->bindValue(":id", $this->getId());
		$st->bindValue(":name", $this->getName());

		return $st->execute();
	}

	public function update()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("UPDATE groups SET group_name = :name WHERE group_id = :id");
		$st->bindValue(":id", $this->getId());
		$st->bindValue(":name", $this->getName());

		return $st->execute();
	}

	public function delete()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("DELETE FROM groups WHERE group_id = :id");
		$st->bindValue(":id", $this->getId());

		return $st->execute();
	}

	public function getAllGroups()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("SELECT * FROM groups ORDER BY created_at DESC");
		$st->execute();

		return $st;
	}

	public function findGroupById()
	{
		$pdo = new Connection();

		$st = $pdo->conn->prepare("SELECT * FROM groups WHERE group_id = :id");
		$st->bindValue(":id", $this->getId());
		$st->execute();

		return $st;
	}
}
