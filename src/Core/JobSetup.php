<?php

namespace WebHireU\Core;

class JobSetup
{
    public static function run(): void
    {
        $db = Database::connection();

        $db->exec(
            'CREATE TABLE IF NOT EXISTS jobs (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                company TEXT NOT NULL,
                location TEXT NOT NULL,
                description TEXT NOT NULL,
                created_at TEXT NOT NULL
            )'
        );

        $db->exec(
            'CREATE TABLE IF NOT EXISTS applications (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                job_id INTEGER NOT NULL,
                created_at TEXT NOT NULL,
                UNIQUE(user_id, job_id)
            )'
        );

        $count = (int) $db->query('SELECT COUNT(*) FROM jobs')->fetchColumn();

        if ($count === 0) {
            JobSeeder::run();
        }
    }
}
