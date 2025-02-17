<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evento - Manage Users</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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

<body class="bg-background min-h-screen">
  <div class="min-h-screen bg-black/40">
    <?php require_once APPROOT . '/app/Views/header.php'; ?>

    <!-- Main Content -->
    <div class="container max-w-6xl mx-auto px-4 pt-32 pb-16">
      <div class="bg-inputBg rounded-xl shadow-2xl border border-primary/20 overflow-hidden">
        <!-- Header Section -->
        <div class="p-6 border-b border-primary/20">
          <h1 class="text-3xl font-bold text-textColor">Manage Users</h1>
          <p class="text-textColor/70 mt-2">Manage and monitor user accounts</p>
        </div>

        <!-- Table Section -->
        <div class="p-6">
          <div class="overflow-x-auto">
            <table class="w-full">
              <thead>
                <tr class="bg-primary/10 border-b border-primary/20">
                  <th class="p-4 text-left text-textColor/80">Avatar</th>
                  <th class="p-4 text-left text-textColor/80">Username</th>
                  <th class="p-4 text-left text-textColor/80">Email</th>
                  <th class="p-4 text-left text-textColor/80">Role</th>
                  <th class="p-4 text-left text-textColor/80">Status</th>
                  <th class="p-4 text-left text-textColor/80">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($data['users'])): ?>
                  <?php foreach ($data['users'] as $user): ?>
                    <tr class="border-b border-primary/10 hover:bg-primary/5 transition-colors">
                      <td class="p-4">
                        <img src="<?= ROOTURL . '/storage/uploads/' . htmlspecialchars($user['avatar']) ?>"
                          alt="<?= htmlspecialchars($user['username']) ?>"
                          class="w-10 h-10 rounded-full object-cover border-2 border-accent">
                      </td>
                      <td class="p-4">
                        <span class="font-medium text-accent">
                          <?= htmlspecialchars($user['username']) ?>
                        </span>
                      </td>
                      <td class="p-4 text-textColor/80">
                        <?= htmlspecialchars($user['email']) ?>
                      </td>
                      <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-sm bg-primary/20 text-primary">
                          <?= htmlspecialchars($user['role']) ?>
                        </span>
                      </td>
                      <td class="p-4">
                        <span
                          class="px-3 py-1 rounded-full text-sm <?= $user['active'] ? 'bg-green-500/20 text-green-500' : 'bg-red-500/20 text-red-500' ?>">
                          <?= $user['active'] ? 'Active' : 'Banned' ?>
                        </span>
                      </td>
                      <td class="p-4">
                        <form method="POST" class="inline-block" action="/AdminController/manageBan">
                          <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                          <input type="hidden" name="action" value="<?= $user['active'] ? 'ban' : 'unban' ?>">
                          <button type="submit" class="px-4 py-2 rounded-full text-sm font-medium transition-all flex items-center gap-2 
                                                        <?= $user['active']
                                                          ? 'bg-red-500/20 text-red-500 hover:bg-red-500/30'
                                                          : 'bg-green-500/20 text-green-500 hover:bg-green-500/30' ?>">
                            <i class='bx <?= $user['active'] ? 'bx-block' : 'bx-check' ?>'></i>
                            <?= $user['active'] ? 'Ban User' : 'Unban User' ?>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="p-8 text-center text-textColor/60">
                      <div class="flex flex-col items-center gap-2">
                        <i class='bx bx-user-x text-4xl'></i>
                        <span class="font-medium">No users found</span>
                      </div>
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= ROOTURL ?>/js/menu.js"></script>
</body>

</html>