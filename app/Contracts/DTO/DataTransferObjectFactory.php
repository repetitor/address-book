<?php

namespace App\Contracts\DTO;

interface DataTransferObjectFactory
{
    public function fromArray(array $data): DataTransferObject;
}
