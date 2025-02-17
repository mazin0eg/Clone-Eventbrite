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
        $stmt = $db->query("SELECT * FROM event");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventsByOrganisateur($id_organisateur)
    {
        $stmt = $this->db->prepare("SELECT * FROM event WHERE id_organisateur = ?");
        $stmt->execute([$id_organisateur]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addEvent($data, $id_organisateur)
    {
        $stmt = $this->db->prepare("INSERT INTO event (titre, description, date, lieu, prix, capacite, id_organisateur, id_category) VALUES (?, ?, ?, ?, ?, ?, ?, NULL)");
        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['date'],
            $data['lieu'],
            $data['prix'],
            $data['capacite'],
            $id_organisateur
        ]);
    }

    public function editEvent($data, $id_organisateur)
    {
        $stmt = $this->db->prepare("UPDATE event SET titre=?, description=?, date=?, lieu=?, prix=?, capacite=? WHERE id=? AND id_organisateur=?");
        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['date'],
            $data['lieu'],
            $data['prix'],
            $data['capacite'],
            $data['id'],
            $id_organisateur
        ]);
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