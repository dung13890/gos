<?php

namespace App\Services;

use App\Contracts\Services\UploadService;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\Upload\StoreUpload;
use App\Jobs\Upload\UpdateUpload;
use App\Jobs\Upload\DeleteUpload;
use App\Jobs\Upload\DestroyUpload;
use App\Jobs\Upload\SummernoteUpload;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Urls\UrlBuilderFactory;

class UploadServiceJob extends AbstractServiceJob implements UploadService
{
    public function store(array $attributes)
    {
        return $this->dispatch(new StoreUpload($attributes));
    }

    public function update(Model $entity, array $attributes)
    {
    }

    public function delete(Model $entity)
    {
    }

    public function destroy(array $ids)
    {
    }

    public function summernote(array $attributes)
    {
        return $this->dispatch(new SummernoteUpload($attributes));
    }

    public function getReponseImage($path, $params)
    {
        $server = app()['glide'];
        try {
            SignatureFactory::create(env('GLIDE_SIGNKEY'))->validateRequest($path, $params);
            return $server->getImageResponse($path, $params);
        } catch (SignatureException $e) {
            dd($e->getMessage());
            return redirect(asset('assets/img/backend/no_image.jpg'));
        }
    }
}
