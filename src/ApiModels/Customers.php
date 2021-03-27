<?php

namespace Sashalenz\Binotel\ApiModels;

use Illuminate\Support\Collection;
use Sashalenz\Binotel\DataTransferObjects\CustomerDataTransferObject;
use Sashalenz\Binotel\Exceptions\BinotelException;

final class Customers extends BaseModel
{
    private const MODEL = 'customers';

    /**
     * @return Collection
     * @throws BinotelException
     */
    public function list(): Collection
    {
        $response = $this->method(self::MODEL .'/list')->request();

        info($response);

        return CustomerDataTransferObject::collectFromArray($response->toArray());
    }
}
