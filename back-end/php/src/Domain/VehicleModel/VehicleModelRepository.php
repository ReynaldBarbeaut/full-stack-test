<?php

namespace App\Domain\VehicleModel;

use App\Domain\DomainException\DomainRecordNotFoundException;
use PDO;

class VehicleModelRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws DomainRecordNotFoundException
     */
    public function findAllByVehicleMake(int $id): array
    {
        $sql = "SELECT DISTINCT vm.vehicle_model_id, vm.name 
            FROM vehicle_model vm
            LEFT JOIN vehicle v ON v.vehicle_model_id = vm.vehicle_model_id
            WHERE v.vehicle_make_id = ?;";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        $records = $stmt->fetchAll();

        if (!count($records)) {
            throw new DomainRecordNotFoundException("Vehicle models for vehicle $id not found");
        }

        return $records;
    }
}