<?php
namespace App\Http\Traits;

trait InfoTrait {
    private function getInfoById($infoId)
    {
       return $this->infoModel::find($infoId);
    }
}

