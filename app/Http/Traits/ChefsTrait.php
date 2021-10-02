<?php
namespace App\Http\Traits;

trait ChefsTrait{

    private function getChefById($chefId)
    {
        return $this->chefModel::find($chefId);
    }

    private function getChefs()
    {
        return $this->chefModel::get();
    }
}
