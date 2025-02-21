<?php

namespace App\Models;
use App\Models\User;
use App\Core\Database;
use PDO;

class Participant extends User
{
    public function reserveTicket($ticketId)
    {
        $pdo = Database::getInstance()->getConnection();

        $sql = "INSERT INTO reservations (id_ticket, id_participant) 
            VALUES (:ticketId, :participantId)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ticketId', $ticketId, PDO::PARAM_INT);
        $stmt->bindParam(':participantId', $this->id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}