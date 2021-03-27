<?php

namespace Sashalenz\Binotel\ApiModels;

use Illuminate\Support\Collection;
use Sashalenz\Binotel\DataTransferObjects\CustomerDataTransferObject;
use Sashalenz\Binotel\Exceptions\BinotelException;

final class Customers extends BaseModel
{
    protected string $model = 'customers';

    /**
     * @return Collection
     * @throws BinotelException
     */
    public function list(): Collection
    {
        return CustomerDataTransferObject::collectFromArray(
            $this
                ->method('list')
                ->request()
                ->get('customerData')
        );
    }

    /**
     * @param int $id
     * @return CustomerDataTransferObject
     * @throws BinotelException
     */
    public function takeById(int $id): CustomerDataTransferObject
    {
        return CustomerDataTransferObject::fromArray(
            $this
                ->method('take-by-id')
                ->params([
                    'customerID' => $id
                ])
                ->request()
                ->get('customerData')
        );
    }
}
