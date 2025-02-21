<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class Ticket
{
    private $id;
    private $type;
    private $total_quantity;
    private $price;
    private $id_event;

    public function __construct($id, $type, $total_quantity, $price, $id_event)
    {
        $this->id = $id;
        $this->type = $type;
        $this->total_quantity = $total_quantity;
        $this->price = $price;
        $this->id_event = $id_event;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getTotalQuantity()
    {
        return $this->total_quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getIdEvent()
    {
        return $this->id_event;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setTotalQuantity($total_quantity)
    {
        $this->total_quantity = $total_quantity;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setIdEvent($id_event)
    {
        $this->id_event = $id_event;
    }
    public function save()
    {
        $db = Database::getInstance()->getConnection();
        $sql = "INSERT INTO ticket (type, total_quantity, price, id_event) VALUES (:type, :total_quantity, :price, :id_event)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':type', $this->type);
        $stmt->bindParam(':total_quantity', $this->total_quantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $this->price, PDO::PARAM_STR);
        $stmt->bindParam(':id_event', $this->id_event, PDO::PARAM_INT);

        $stmt->execute();

        $this->id = $db->lastInsertId();
    }

    
    public static function getEventTicket($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM ticket WHERE id_event = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    
}
