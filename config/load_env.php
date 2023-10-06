<?php

$envFilePath = __DIR__ . '/.env';

if (file_exists($envFilePath)) {
    
    $envFile = file($envFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($envFile) {
        foreach ($envFile as $line) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            putenv("$key=$value");
        }
    }
}