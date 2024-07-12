<?php

namespace App\Application\Actions\VehicleModel;

use App\Application\Actions\Action;
use App\Domain\Services\VehicleModelServiceInterface;
use Psr\Log\LoggerInterface;

abstract class VehicleModelAction extends Action
{
    protected VehicleModelServiceInterface $vehicleModelService;

    public function __construct(LoggerInterface $logger,
                                VehicleModelServiceInterface $vehicleModelService
    ) {
        parent::__construct($logger);
        $this->vehicleModelService = $vehicleModelService;
    }
}
