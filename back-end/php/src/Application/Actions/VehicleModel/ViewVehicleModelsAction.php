<?php

namespace App\Application\Actions\VehicleModel;

use Psr\Http\Message\ResponseInterface as Response;

class ViewVehicleModelsAction extends VehicleModelAction
{
    public function action(): Response
    {
        $vehicleMakeId = (int)$this->resolveArg('vehicle_make_id');
        $this->logger->info("Vehicle make of id `${vehicleMakeId}` was viewed.");

        return $this->respondWithJSON($this->vehicleModelService->getAllByVehicleMake($vehicleMakeId));
    }
}
