<?php

namespace App\Application\Actions\Vehicle;

use App\Application\Actions\Action;
use App\Domain\Services\VehicleServiceInterface;
use Psr\Log\LoggerInterface;

abstract class VehicleAction extends Action
{
    protected VehicleServiceInterface $vehicleService;

    public function __construct(LoggerInterface $logger,
                                VehicleServiceInterface $vehicleService
    ) {
        parent::__construct($logger);
        $this->vehicleService = $vehicleService;
    }
}
