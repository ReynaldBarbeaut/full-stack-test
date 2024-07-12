<?php

namespace App\Domain\Vehicle;

use App\Domain\DomainException\DomainRecordNotFoundException;
use PDO;

class VehicleRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws DomainRecordNotFoundException
     */
    public function findYearsVehicleMake(int $id): array
    {
        $sql = "SELECT DISTINCT vehicle_year FROM vehicle
            WHERE vehicle_make_id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (!count($records)) {
            throw new DomainRecordNotFoundException("Vehicles for vehicle make $id not found");
        }

        return $records;
    }
}