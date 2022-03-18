<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\CompanyOwner;
use App\Repositories\CompanyOwnerRepository;

class CompanyOwnerController extends Controller {
    /**
     * The CompanyOwner repository instance
     *
     * @var CompanyOwnerRepository
     */
    protected $owners;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->owners = new CompanyOwnerRepository();
        $this->middleware('auth');
    }
    /**
     * Display a list of all owners.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $owners = $this->owners->getAll();

        return View('owners.index', array(
            'owners' => $owners
        ));

    }
    /**
     * Display a form to create a new CompanyOwner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('owners.create');
    }
    /**
     * Create a new CompanyOwner.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->owners->create($request->all());
        return redirect('/owners');
    }
    /**
     * Display an CompanyOwner
     *
     * @param type $id
     * @return type
     */
    public function show($id) {
        $CompanyOwner = $this->owners->find($id);
        return view('owners.show', compact('CompanyOwner'));
    }
    /**
     * Display a form to edit an CompanyOwner.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return $id;
        $CompanyOwner = $this->owners->find($id);
        return view('owners.edit', compact('CompanyOwner'));
    }
    /**
     * Update an CompanyOwner.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->owners->update($request->all(), $id);
        return redirect('/owners');
    }
    /**
     * Delete an CompanyOwner
     *
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id) {
        $this->owners->delete($id);
        return redirect('/owners');
    }
}
