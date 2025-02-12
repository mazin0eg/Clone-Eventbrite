<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Événements</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        function showEditForm(id, titre, description, date, lieu, prix, capacite) {
            document.getElementById('editForm').classList.remove('hidden');
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_titre').value = titre;
            document.getElementById('edit_description').value = description;
            document.getElementById('edit_date').value = date;
            document.getElementById('edit_lieu').value = lieu;
            document.getElementById('edit_prix').value = prix;
            document.getElementById('edit_capacite').value = capacite;
        }

        function closeEditForm() {
            document.getElementById('editForm').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-900 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Gestion des Événements</h2>

        <!-- Formulaire d'ajout -->
        <?php if ($_SESSION['role'] === 'organisateur'): ?>
            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <h3 class="text-lg font-semibold mb-2">Ajouter un événement</h3>
                <form method="POST" class="space-y-3">
                    <input type="text" name="titre" placeholder="Titre" required class="w-full p-2 border rounded">
                    <input type="text" name="description" placeholder="Description" required class="w-full p-2 border rounded">
                    <input type="date" name="date" required class="w-full p-2 border rounded">
                    <input type="text" name="lieu" placeholder="Lieu" required class="w-full p-2 border rounded">
                    <input type="number" name="prix" placeholder="Prix" required class="w-full p-2 border rounded">
                    <input type="number" name="capacite" placeholder="Capacité" required class="w-full p-2 border rounded">
                    <button type="submit" name="add" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter</button>
                </form>
            </div>
        <?php endif; ?>

        <!-- Liste des événements -->
        <h3 class="text-lg font-semibold mb-2">Liste des événements</h3>
        <ul class="space-y-3">
            <?php foreach ($events as $event): ?>
                <li class="bg-white p-4 shadow rounded flex justify-between items-center">
                    <span class="font-semibold"><?= htmlspecialchars($event['titre']) ?> - <?= htmlspecialchars($event['date']) ?> - <?= htmlspecialchars($event['lieu']) ?></span>
                    
                    <div class="flex space-x-2">
                        <?php if ($_SESSION['role'] === 'organisateur' && $_SESSION['user_id'] == $event['id_organisateur']): ?>
                            <button onclick="showEditForm('<?= $event['id'] ?>', '<?= $event['titre'] ?>', '<?= $event['description'] ?>', '<?= $event['date'] ?>', '<?= $event['lieu'] ?>', '<?= $event['prix'] ?>', '<?= $event['capacite'] ?>')" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                Modifier
                            </button>
                        <?php endif; ?>

                        <?php if ($_SESSION['role'] === 'admin' || ($_SESSION['role'] === 'organisateur' && $_SESSION['user_id'] == $event['id_organisateur'])): ?>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $event['id'] ?>">
                                <button type="submit" name="delete" onclick="return confirm('Voulez-vous vraiment supprimer cet événement ?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                    Supprimer
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Formulaire de modification (Modal) -->
    <div id="editForm" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h3 class="text-lg font-semibold mb-4">Modifier l'événement</h3>
            <form method="POST" class="space-y-3">
                <input type="hidden" id="edit_id" name="id">
                <input type="text" id="edit_titre" name="titre" required class="w-full p-2 border rounded">
                <input type="text" id="edit_description" name="description" required class="w-full p-2 border rounded">
                <input type="date" id="edit_date" name="date" required class="w-full p-2 border rounded">
                <input type="text" id="edit_lieu" name="lieu" required class="w-full p-2 border rounded">
                <input type="number" id="edit_prix" name="prix" required class="w-full p-2 border rounded">
                <input type="number" id="edit_capacite" name="capacite" required class="w-full p-2 border rounded">
                <div class="flex justify-between">
                    <button type="submit" name="edit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Modifier
                    </button>
                    <button type="button" onclick="closeEditForm()" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
