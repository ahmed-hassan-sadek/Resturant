<?php
namespace App\Http\Traits;

trait ItemTrait{

    private function getitemById($itemId)
    {
        return $this->itemModel::find($itemId);
    }

    private function getItem()
    {
        return $this->itemModel::with('category')->get();
    }
}
