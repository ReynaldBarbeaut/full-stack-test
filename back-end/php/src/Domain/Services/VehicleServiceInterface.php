<?php

namespace App\Domain\Services;

use App\Domain\DomainException\DomainRecordNotFoundException;

interface VehicleServiceInterface
{
    /**
     * @throws DomainRecordNotFoundException
     */
    public function getAllYearsByVehicleMake(int $id): array;

    /**
     * @throws DomainRecordNotFoundException
     */
    public function getAllVehicleByVehicleMake(int $id): array;
}