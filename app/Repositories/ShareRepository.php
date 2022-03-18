<?php

namespace App\Repositories;

use App\Models\Share;
use App\Interfaces\ShareInterface;

class ShareRepository implements ShareInterface {
    public function getAll() {
        return Share::all();
    }
    public function create($request) {
        return Share::create($request);
    }
    public function delete($id) {
        return Share::destroy($id);
    }
    public function update($request, $id) {
        return Share::where('id', $id)->update($request);
    }
    public function find($id) {
        return Share::find($id);
    }
}
