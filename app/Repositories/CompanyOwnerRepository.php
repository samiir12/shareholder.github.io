<?php

namespace App\Repositories;

use App\Models\CompanyOwner;
use App\Interfaces\CompanyOwnerInterface;

class CompanyOwnerRepository implements CompanyOwnerInterface {
    public function getAll() {
        return CompanyOwner::all();
    }
    public function create($request) {
        return CompanyOwner::create($request);
    }
    public function delete($id) {
        return CompanyOwner::destroy($id);
    }
    public function update($request, $id) {
        return CompanyOwner::where('id', $id)->update($request);
    }
    public function find($id) {
        return CompanyOwner::find($id);
    }
}
