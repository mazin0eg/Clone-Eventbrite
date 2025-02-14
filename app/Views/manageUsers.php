<?php
require_once "../Models/User.php";
//
$admin = new Admin($pdo);
$users = $admin->getAllUsers();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'])) {
    $userId = $_POST['user_id'];
    if ($_POST['action'] === 'ban') {
        $admin->banUser($userId);
    } else {
        $admin->unbanUser($userId);
    }
    header('Location: manageusers.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Users</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
      tailwind.config = {
          theme: {
              extend: {
                  colors: {
                      primary: '#6D28D9',
                      secondary: '#1E40AF',
                      accent: '#DB2777',
                      background: '#1F2937',
                      inputBg: '#374151',
                      textColor: '#F3F4F6',
                  },
              },
          },
      };
  </script>
</head>
<body class="bg-background text-textColor p-6">
  <div class="max-w-5xl mx-auto bg-inputBg p-8 rounded-xl shadow-2xl border-2 border-secondary">
    <h1 class="text-4xl font-extrabold mb-6 text-primary">Manage Users</h1>
    <table class="w-full text-sm border border-secondary rounded-lg overflow-hidden">
      <thead>
        <tr class="bg-secondary text-white">
          <th class="p-3">Avatar</th>
          <th class="p-3">Username</th>
          <th class="p-3">Email</th>
          <th class="p-3">Role</th>
          <th class="p-3">Status</th>
          <th class="p-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr class="bg-background border-b border-gray-700 hover:bg-gray-800">
            <td class="p-3">
              <img src="<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-primary">
            </td>
            <td class="p-3 text-accent font-bold">
              <?= htmlspecialchars($user['username']) ?>
            </td>
            <td class="p-3">
              <?= htmlspecialchars($user['email']) ?>
            </td>
            <td class="p-3">
              <?= htmlspecialchars($user['role']) ?>
            </td>
            <td class="p-3 font-semibold <?= $user['active'] ? 'text-green-400' : 'text-red-400' ?>">
              <?= $user['active'] ? 'Active' : 'Banned' ?>
            </td>
            <td class="p-3">
              <form method="POST" class="inline-block">
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                <input type="hidden" name="action" value="<?= $user['active'] ? 'ban' : 'unban' ?>">
                <button type="submit" class="px-4 py-1 rounded-full text-sm font-bold text-white shadow-md transition-transform duration-200 transform hover:scale-105 <?= $user['active'] ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' ?>">
                  <?= $user['active'] ? 'Ban' : 'Unban' ?>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>

