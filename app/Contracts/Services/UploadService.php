<?php

namespace App\Contracts\Services;

interface UploadService extends AbstractService
{
    public function getReponseImage($path, $params);
}
