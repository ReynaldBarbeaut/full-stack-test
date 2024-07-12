<?php

namespace App\Domain\Services;

use App\Domain\DomainException\DomainRecordNotFoundException;

interface VehicleModelServiceInterface
{
    /**
     * @throws DomainRecordNotFoundException
     */
    public function getAllByVehicleMake(int $id): array;
}