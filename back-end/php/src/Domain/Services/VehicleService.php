<?php

namespace App\Domain\Services;

use App\Domain\Vehicle\Vehicle;
use App\Domain\Vehicle\VehicleRepository;

class VehicleService implements VehicleServiceInterface
{

    private VehicleRepository $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function getAllYearsByVehicleMake(int $id): array
    {
        $vehicleYears = $this->vehicleRepository->findYearsVehicleMake($id);

        return array_map('intval', $vehicleYears);
    }

    public function getAllVehicleByVehicleMake(int $id): array
    {
        $vehicles = $this->vehicleRepository->findVehiclesByVehicleMake($id);

        return array_map(function ($vehicle) {
            return array_map('intval', $vehicle);
        }, $vehicles);
    }
}