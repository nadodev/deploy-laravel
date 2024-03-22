<?php

namespace App\Observers;

use App\Models\Noticia;

class CopyImage
{
    public function saved(Noticia $model)
    {
        $originalImagePath = storage_path('app/public/app/images/' . $model->image);
        $newImagePath = storage_path('app/images/' . $model->image);

        if (file_exists($originalImagePath)) {
            // Copia a imagem para o novo diretório
            copy($originalImagePath, $newImagePath);
        }
    }
}
