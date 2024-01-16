<?php

namespace App\Contracts\DTO;

interface DataTransferObject
{
    public function toArray(): array;
}
