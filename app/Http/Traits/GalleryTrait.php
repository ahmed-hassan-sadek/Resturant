<?php
namespace App\Http\Traits;

trait GalleryTrait{

    private function getGalleryById($galleryId)
    {
        return $this->galleryModel::find($galleryId);
    }

    private function getGallery()
    {
        return $this->galleryModel::with('category')->get();
    }
}
