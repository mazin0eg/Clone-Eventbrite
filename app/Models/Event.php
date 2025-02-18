<?php
namespace App\Models;
use App\Core\Database;


class Event
{
    private $id;
    private $titre;
    private $description;
    private $date;
    private $lieu;
    private $prix;
    private $capacite;
    private $id_organisateur;
    private $image;
    private $id_category;

    // Constructor to initialize the event's attributes (no database connection here)
    public function __construct($id = null, $titre = null, $description = null, $date = null, $lieu = null, $prix = null, $capacite = null, $id_organisateur = null, $image = null, $id_category = null)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->date = $date;
        $this->lieu = $lieu;
        $this->prix = $prix;
        $this->capacite = $capacite;
        $this->id_organisateur = $id_organisateur;
        $this->image = $image;
        $this->id_category = $id_category;
    }

    
    // Add Event to the database (insert)
    public function addEvent(): bool
    {
        $sql = "INSERT INTO events (titre, description, date, lieu, prix, capacite, id_organisateur, image, id_category) 
                VALUES (:titre, :description, :date, :lieu, :prix, :capacite, :id_organisateur, :image, :id_category)";
        
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        return $stmt->execute([
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':date' => $this->date,
            ':lieu' => $this->lieu,
            ':prix' => $this->prix,
            ':capacite' => $this->capacite,
            ':id_organisateur' => $this->id_organisateur,
            ':image' => $this->image,
            ':id_category' => $this->id_category
        ]);
    }

  
    public function updateEvent(): bool
    {
        $sql = "UPDATE events SET 
                titre = :titre, 
                description = :description, 
                date = :date, 
                lieu = :lieu, 
                prix = :prix, 
                capacite = :capacite, 
                id_organisateur = :id_organisateur, 
                image = :image, 
                id_category = :id_category
                WHERE id = :id";
        
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        return $stmt->execute([
            ':id' => $this->id,
            ':titre' => $this->titre,
            ':description' => $this->description,
            ':date' => $this->date,
            ':lieu' => $this->lieu,
            ':prix' => $this->prix,
            ':capacite' => $this->capacite,
            ':id_organisateur' => $this->id_organisateur,
            ':image' => $this->image,
            ':id_category' => $this->id_category
        ]);
    }

    
    public function deleteEvent(): bool
    {
        $sql = "DELETE FROM events WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        return $stmt->execute([':id' => $this->id]);
    }

 
    public static function getAllEvents(): array
    {
        $sql = "SELECT * FROM events";
        $stmt = Database :: getInstance()->getConnection()->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

 
    public static function getEventById($id): ?array
    {
        $sql = "SELECT * FROM events WHERE id = :id";
        $stmt = Database::getInstance()->getConnection()->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}

?>

