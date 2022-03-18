<?php

namespace App\Repositories;

use App\Models\Shareholder;
use App\Interfaces\ShareholderInterface;

class ShareholderRepository implements ShareholderInterface {
    public function getAll() {
        return Shareholder::all();
    }
    public function create($request) {
        return Shareholder::create($request);
    }
    public function delete($id) {
        return Shareholder::destroy($id);
    }
    public function update($request, $id) {
        return Shareholder::where('id', $id)->update($request);
    }
    public function find($id) {
        return Shareholder::find($id);
    }

    public function totalCapital($id) {
        return Shareholder::find($id);
    }
}
