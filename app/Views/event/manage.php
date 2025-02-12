<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Événements</title>
    <script>
        function showEditForm(id, titre, description, date, lieu, prix, capacite) {
            document.getElementById('editForm').style.display = 'block';
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_titre').value = titre;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_lieu').value = lieu;
            document.getElementById('edit_prix').value = prix;
            document.getElementById('edit_capacite').value = capacite;
        }
    </script>
</head>
<body>
    <h2>Gestion des Événements</h2>

    <?php if ($_SESSION['role'] === 'organisateur'): ?>
        <h3>Ajouter un événement</h3>
        <form method="POST">
            <input type="text" name="titre" placeholder="Titre" required>
            <input type="text" name="description" placeholder="Description" required>
            <input type="date" name="date" required>
            <input type="text" name="lieu" placeholder="Lieu" required>
            <input type="number" name="prix" placeholder="Prix" required>
            <input type="number" name="capacite" placeholder="Capacité" required>
            <button type="submit" name="add">Ajouter</button>
        </form>
    <?php endif; ?>

    <h3>Liste des événements</h3>
    <ul>
        <?php foreach ($events as $event): ?>
            <li>
                <?= htmlspecialchars($event['titre']) ?> - <?= htmlspecialchars($event['date']) ?> - <?= htmlspecialchars($event['lieu']) ?>
                <?php if ($_SESSION['role'] === 'organisateur' && $_SESSION['user_id'] == $event['id_organisateur']): ?>
                    <button onclick="showEditForm('<?= $event['id'] ?>', '<?= $event['titre'] ?>', '<?= $event['description'] ?>', '<?= $event['date'] ?>', '<?= $event['lieu'] ?>', '<?= $event['prix'] ?>', '<?= $event['capacite'] ?>')">Modifier</button>
                <?php endif; ?>
                <?php if ($_SESSION['role'] === 'admin' || ($_SESSION['role'] === 'organisateur' && $_SESSION['user_id'] == $event['id_organisateur'])): ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $event['id'] ?>">
                        <button type="submit" name="delete" onclick="return confirm('Voulez-vous vraiment supprimer cet événement ?')">Supprimer</button>
                    </form>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Formulaire de modification caché -->
    <div id="editForm" style="display: none;">
        <h3>Modifier l'événement</h3>
        <form method="POST">
            <input type="hidden" id="edit_id" name="id">
            <input type="text" id="edit_titre" name="titre" required>
            <input type="text" id="edit_description" name="description" required>
            <input type="date" id="edit_date" name="date" required>
            <input type="text" id="edit_lieu" name="lieu" required>
            <input type="number" id="edit_prix" name="prix" required>
            <input type="number" id="edit_capacite" name="capacite" required>
            <button type="submit" name="edit">Modifier</button>
        </form>
    </div>
</body>
</html>
