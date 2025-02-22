<?php
declare(strict_types=1);

use App\Application\Actions\Vehicle\UpdateVehicleStateAction;
use App\Application\Actions\Vehicle\ViewVehiclesAction;
use App\Application\Actions\Vehicle\ViewVehicleYearsAction;
use App\Application\Actions\VehicleMake\ListVehicleMakesAction;
use App\Application\Actions\VehicleMake\ViewVehicleMakesAction;
use App\Application\Actions\VehicleModel\ViewVehicleModelsAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello candidate! Good luck for the test and happy coding =P');
        return $response;
    });

    $app->group('/api', function (Group $group) {
        $group->get('/vehicle-makes', ListVehicleMakesAction::class);
        $group->get('/vehicle-makes/{id}', ViewVehicleMakesAction::class);
        $group->get('/vehicle-models/{vehicle_make_id}', ViewVehicleModelsAction::class);
        $group->get('/vehicle-years/{vehicle_make_id}', ViewVehicleYearsAction::class);
        $group->get('/vehicles-coverage/{vehicle_make_id}', ViewVehiclesAction::class);
        $group->post('/update-vehicles-state', UpdateVehicleStateAction::class);
    });
};
