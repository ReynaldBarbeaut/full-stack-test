<?php

namespace App\Domain\Services;

use App\Domain\DomainException\DomainRecordNotFoundException;

interface VehicleServiceInterface
{
    /**
     * @throws DomainRecordNotFoundException
     */
    public function getAllModelYearsByVehicleMake(int $id): array;
}