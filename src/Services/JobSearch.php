<?php

namespace WebHireU\Services;

use WebHireU\Core\Database;

class JobSearch
{
    public static function search(
        string $query = '',
        string $location = ''
    ): array {
        $sql = 'SELECT * FROM jobs WHERE 1=1';
        $params = [];

        if ($query !== '') {
            $sql .= ' AND (title LIKE :query OR company LIKE :query OR description LIKE :query)';
            $params['query'] = '%' . $query . '%';
        }

        if ($location !== '') {
            $sql .= ' AND location LIKE :location';
            $params['location'] = '%' . $location . '%';
        }

        $sql .= ' ORDER BY id DESC';

        $stmt = Database::connection()->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }
}
