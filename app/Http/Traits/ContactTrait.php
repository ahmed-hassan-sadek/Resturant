<?php
namespace App\Http\Traits;

trait ContactTrait{

    private function getContactId($contactId)
    {
        return $this->contactModel::find($contactId);
    }

    private function getContact()
    {
        return $this->contactModel::get();
    }
}
