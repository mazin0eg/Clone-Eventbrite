<?php
namespace App\Models;
use App\Core\Database;
use PDO;

class Event
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public static function getAllEvents()
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query("
        SELECT e.*, c.name AS category_name
        FROM event e
        JOIN category c ON e.id_category = c.id
    ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEventsByOrganisateur($id_organisateur)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
        SELECT e.*, c.name AS category_name
        FROM event e
        JOIN category c ON e.id_category = c.id
        WHERE e.id_organisateur = ?
    ");
        $stmt->execute([$id_organisateur]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getEventById($id)
    {
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("
        SELECT e.*, c.name AS category_name
        FROM event e
        JOIN category c ON e.id_category = c.id
        WHERE e.id = ?
    ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function addEvent($data, $id_organisateur, $imagePath)
    {
        $stmt = $this->db->prepare("INSERT INTO event (titre, description, date, lieu, prix, capacite, id_organisateur, id_category, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['date'],
            $data['lieu'],
            $data['prix'],
            $data['capacite'],
            $id_organisateur,
            $data['id_category'],
            $imagePath
        ]);
    }

    public function editEvent($data, $id_organisateur, $imagePath = null)
    {
        // If new image is provided, update image as well
        if ($imagePath) {
            $stmt = $this->db->prepare("UPDATE event SET titre=?, description=?, date=?, lieu=?, prix=?, capacite=?, id_category=?, image=? WHERE id=? AND id_organisateur=?");
            return $stmt->execute([
                $data['titre'],
                $data['description'],
                $data['date'],
                $data['lieu'],
                $data['prix'],
                $data['capacite'],
                $data['id_category'],
                $imagePath,
                $data['id'],
                $id_organisateur
            ]);
        } else {
            // No new image, keep the existing one
            $stmt = $this->db->prepare("UPDATE event SET titre=?, description=?, date=?, lieu=?, prix=?, capacite=?, id_category=? WHERE id=? AND id_organisateur=?");
            return $stmt->execute([
                $data['titre'],
                $data['description'],
                $data['date'],
                $data['lieu'],
                $data['prix'],
                $data['capacite'],
                $data['id_category'],
                $data['id'],
                $id_organisateur
            ]);
        }
    }

    public function deleteEvent($id, $role, $id_organisateur)
    {
        if ($role === 'admin') {
            $stmt = $this->db->prepare("DELETE FROM event WHERE id=?");
            return $stmt->execute([$id]);
        } else {
            $stmt = $this->db->prepare("DELETE FROM event WHERE id=? AND id_organisateur=?");
            return $stmt->execute([$id, $id_organisateur]);
        }
    }
}
?>