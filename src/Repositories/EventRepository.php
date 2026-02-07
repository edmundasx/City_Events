<?php
declare(strict_types=1);

namespace App\Repositories;

use DateTimeImmutable;
use PDO;

final class EventRepository
{
    public function __construct(private PDO $pdo) {}

    public function homepageEvents(
        int $limit = 12,
        bool $onlyFuture = true,
    ): array {
        $futureClause = $onlyFuture ? "AND e.event_date >= NOW()" : "";

        $sql = "
            SELECT e.id, e.title, e.location, e.event_date, e.price, e.cover_image
            FROM events e
            WHERE e.status = 'approved'
            {$futureClause}
            ORDER BY e.event_date ASC
            LIMIT :limit
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map(static function (array $r): array {
            $dt = new DateTimeImmutable($r["event_date"]);

            $price = (float) $r["price"];
            $priceLabel =
                $price <= 0.0
                    ? "Nemokamai"
                    : "€" . number_format($price, 2, ".", "");

            return [
                "id" => (int) $r["id"],
                "title" => (string) $r["title"],
                "date" => $dt->format("Y-m-d"),
                "time" => $dt->format("H:i"),
                "location" => (string) $r["location"],
                "price" => $priceLabel,
                "image" => (string) ($r["cover_image"] ?? ""),
            ];
        }, $rows);
    }
}
