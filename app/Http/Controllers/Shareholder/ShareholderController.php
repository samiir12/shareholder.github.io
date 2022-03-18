<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Shareholder;
use App\Repositories\ShareholderRepository;

class ShareholderController extends Controller {
    /**
     * The Shareholder repository instance
     *
     * @var ShareholderRepository
     */
    protected $shareholders;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->shareholders = new ShareholderRepository();
        $this->middleware('auth');
    }
    /**
     * Display a list of all shareholders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $shareholders = $this->shareholders->getAll();
        $totalCapital = 0;

        return View('shareholders.index', array(
            'shareholders' => $shareholders,
            'totalCapital' => $totalCapital,
        ));

    }
    /**
     * Display a form to create a new Shareholder.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('shareholders.create');
    }
    /**
     * Create a new Shareholder.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->shareholders->create($request->all());
        return redirect('/shareholders');
    }
    /**
     * Display an Shareholder
     *
     * @param type $id
     * @return type
     */
    public function show($id) {
        $Shareholder = $this->shareholders->find($id);
        return view('shareholders.show', compact('Shareholder'));
    }
    /**
     * Display a form to edit an Shareholder.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return $id;
        $Shareholder = $this->shareholders->find($id);
        return view('shareholders.edit', compact('Shareholder'));
    }
    /**
     * Update an Shareholder.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->shareholders->update($request->all(), $id);
        return redirect('/shareholders');
    }
    /**
     * Delete an Shareholder
     *
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id) {
        $this->shareholders->delete($id);
        return redirect('/shareholders');
    }
}
