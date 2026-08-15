<?php

namespace WebHireU\Core;

final class EmployerSetup
{
    public static function run(): void
    {
        Database::connect()->exec(
            'CREATE TABLE IF NOT EXISTS employers (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL UNIQUE,
                company TEXT NOT NULL,
                description TEXT NOT NULL,
                created_at TEXT NOT NULL
            )'
        );
    }
}
