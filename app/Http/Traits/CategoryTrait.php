<?php
namespace App\Http\Traits;

trait CategoryTrait{

    private function getcategoryById($catId)
    {
        return $this->catModel::find($catId);
    }

    private function getCategory()
    {
        return $this->catModel::get();
    }
}
