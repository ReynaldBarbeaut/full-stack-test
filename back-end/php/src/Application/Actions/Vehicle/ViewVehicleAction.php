<?php

namespace App\Application\Actions\Vehicle;

use Psr\Http\Message\ResponseInterface as Response;

class ViewVehicleAction extends VehicleAction
{
    public function action(): Response
    {
        $vehicleMakeId = (int)$this->resolveArg('vehicle_make_id');
        $this->logger->info("Vehicle years for vehicle make of id `${vehicleMakeId}` were viewed.");

        return $this->respondWithJSON($this->vehicleService->getAllModelYearsByVehicleMake($vehicleMakeId));
    }
}
