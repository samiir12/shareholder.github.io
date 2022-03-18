<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Share;
use App\Repositories\ShareRepository;

class ShareController extends Controller {
    /**
     * The Share repository instance
     *
     * @var ShareRepository
     */
    protected $shares;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->shares = new ShareRepository();
        $this->middleware('auth');
    }
    /**
     * Display a list of all shares.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $shares = $this->shares->getAll();

        return View('shares.index', array(
            'shares' => $shares
        ));

    }
    /**
     * Display a form to create a new Share.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('shares.create');
    }
    /**
     * Create a new Share.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->shares->create($request->all());
        return redirect('/companies');
    }
    /**
     * Display an Share
     *
     * @param type $id
     * @return type
     */
    public function show($id) {
        $Share = $this->shares->find($id);
        return view('shares.show', compact('Share'));
    }
    /**
     * Display a form to edit an Share.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return $id;
        $Share = $this->shares->find($id);
        return view('shares.edit', compact('Share'));
    }
    /**
     * Update an Share.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->shares->update($request->all(), $id);
        return redirect('/shares');
    }
    /**
     * Delete an Share
     *
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id) {
        $this->shares->delete($id);
        return redirect('/shares');
    }
}
