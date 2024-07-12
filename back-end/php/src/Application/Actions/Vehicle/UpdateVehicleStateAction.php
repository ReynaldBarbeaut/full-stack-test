<?php

namespace App\Application\Actions\Vehicle;

use Psr\Http\Message\ResponseInterface as Response;

class UpdateVehicleStateAction extends VehicleAction
{
    public function action(): Response
    {
        $formData = $this->getFormData();
        $vehicleMakeId = (int)$formData['vehicleMakeId'];
        $modelId = (int)$formData['modelId'];
        $year = (int)$formData['year'];
        $state = (bool)$formData['state'];

        $this->logger->info("Update state for vehicles of year `${vehicleMakeId}` were viewed.");
        $success = $this->vehicleService->updateVehicleState($vehicleMakeId, $modelId, $year, $state);

        return $this->respondWithJSON(['success' => $success]);
    }
}
