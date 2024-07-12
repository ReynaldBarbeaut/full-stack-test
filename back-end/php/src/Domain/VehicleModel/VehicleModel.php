<?php

namespace App\Domain\VehicleModel;

use JsonSerializable;

class VehicleModel implements JsonSerializable
{
    private int $id;

    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function fromData(array $data): self
    {
        return new self((int)$data['vehicle_model_id'], $data['name']);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
