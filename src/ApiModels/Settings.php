<?php

namespace Sashalenz\Binotel\ApiModels;

use Illuminate\Support\Collection;
use Sashalenz\Binotel\DataTransferObjects\SettingsEmployeeDataTransferObject;
use Sashalenz\Binotel\DataTransferObjects\SettingsRoutesDataTransferObject;
use Sashalenz\Binotel\DataTransferObjects\SettingsVoiceFilesDataTransferObject;
use Sashalenz\Binotel\Exceptions\BinotelException;

final class Settings extends BaseModel
{
    protected string $model = 'settings';

    /**
     * @return Collection
     * @throws BinotelException
     */
    public function listOfEmployees(): Collection
    {
        return SettingsEmployeeDataTransferObject::collectFromArray(
            $this->method('list-of-employees')
                ->cache(5)
                ->request()
                ->get('listOfEmployees')
        );
    }

    /**
     * @return Collection
     * @throws BinotelException
     */
    public function listOfRoutes(): Collection
    {
        $data = $this->method('list-of-routes')
            ->cache(5)
            ->request()
            ->get('listOfRoutes');

        return collect($data)->mapWithKeys(fn ($key, $array) => [
            $key => SettingsRoutesDataTransferObject::collectFromArray($array)
        ]);
    }

    /**
     * @return Collection
     * @throws BinotelException
     */
    public function listOfVoiceFiles(): Collection
    {
        return SettingsVoiceFilesDataTransferObject::collectFromArray(
            $this->method('list-of-employees')
                ->cache(5)
                ->request()
                ->get('listOfEmployees')
        );
    }
}
