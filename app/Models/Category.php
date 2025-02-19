<?php
namespace App\Models;
use App\Core\Database;
use PDO;
class Category
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getAllCategories()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id, name FROM category");
        $stmt->execute();
        $categories = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = new Category($row['id'], $row['name']);
        }

        return $categories;
    }
}
