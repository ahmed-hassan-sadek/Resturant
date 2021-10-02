<?php
namespace App\Http\Traits;

trait AboutTrait{

    private function getaboutById($aboutId)
    {
        return $this->aboutModel::find($aboutId);
    }

    private function getAbout()
    {
        return $this->aboutModel::first();
    }
}
