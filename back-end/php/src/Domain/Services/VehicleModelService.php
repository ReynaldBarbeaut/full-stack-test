<?php

namespace App\Domain\Services;

use App\Domain\DomainException\DomainRecordNotFoundException;
use App\Domain\VehicleModel\VehicleModel;
use App\Domain\VehicleModel\VehicleModelRepository;

class VehicleModelService implements VehicleModelServiceInterface
{

    private VehicleModelRepository $vehicleMakeRepository;

    public function __construct(VehicleModelRepository $vehicleMakeRepository)
    {
        $this->vehicleMakeRepository = $vehicleMakeRepository;
    }

    /**
     * @throws DomainRecordNotFoundException
     */
    public function getAllByVehicleMake(int $id): array
    {
        $vehicleModels = $this->vehicleMakeRepository->findAllByVehicleMake($id);

        return array_map(function($vehicleModel) {
            return VehicleModel::fromData($vehicleModel)->jsonSerialize();
        }, $vehicleModels);
    }
}