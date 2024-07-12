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
            throw new DomainRecordNotFoundException("Vehicles for vehicle make id $id not found");
        }

        return $records;
    }

    /**
     * @throws DomainRecordNotFoundException
     */
    public function findVehiclesByVehicleMake(int $id): array
    {
        $sql = "SELECT DISTINCT vm.name, v.vehicle_year 
            FROM vehicle v
            LEFT JOIN vehicle_model vm ON vm.vehicle_model_id = v.vehicle_model_id 
            WHERE v.vehicle_make_id = ?
            AND v.state = 1;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_GROUP|PDO::FETCH_COLUMN);

        if (!count($records)) {
            throw new DomainRecordNotFoundException("Active vehicles for vehicle make id: $id not found");
        }

        return $records;
    }
}