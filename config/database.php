<?php
function loadEnv()
{
  $envFile = __DIR__ . '/../.env';

  if (file_exists($envFile)) {
    foreach (file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
      if (strpos($line, '=') !== false) {
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
      }
    }
  }
}

loadEnv();

return [
  'host' => getenv('DB_HOST'),
  'port' => getenv('DB_PORT'),
  'database' => getenv('DB_NAME'),
  'username' => getenv('DB_USER'),
  'password' => getenv('DB_PASSWORD')
];
