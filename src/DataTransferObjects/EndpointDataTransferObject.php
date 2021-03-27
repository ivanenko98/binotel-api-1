<?php

namespace Sashalenz\Binotel\DataTransferObjects;

final class EndpointDataTransferObject extends BinotelDataTransferObject
{
    public int $id;
    public string $login;
    public string $internalNumber;
    public string $status;

    public static function fromArray(array $array): self
    {
        return new self([
            'id' => (int) $array['id'],
            'login' => $array['login'],
            'internalNumber' => $array['internalNumber'],
            'status' => $array['status']
        ]);
    }
}
