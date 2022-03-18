<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Company;
use App\Models\Share;

use App\Repositories\CompanyRepository;
use App\Repositories\ShareholderRepository;

class CompanyController extends Controller {
    /**
     * The Company repository instance
     *
     * @var CompanyRepository
     */
    protected $companies;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        $this->companies = new CompanyRepository();
        $this->shareholders = new ShareholderRepository();
    }
    /**
     * Display a list of all companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $companies = $this->companies->getAll();
        return view('companies.index', compact('companies'));
    }
    /**
     * Display a form to create a new Company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $ownerTypes = [
            'Person' => 'Person',
            'Company' => 'Company'
        ];

        $owner_persons = $this->shareholders->getAll();
        $owner_companies = $this->companies->getAll();

        return view('companies.create', array(
            'persons' => $owner_persons,
            'ownertypes' => $ownerTypes,
            'companies' => $owner_companies
        ));
    }
    /**
     * Add shares to Company.
     *
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function addshares($id) {
        $Company = $this->companies->find($id);

        $shareHolderTypes = [
            'Person' => 'Person',
            'Company' => 'Company'
        ];

        $persons = $this->shareholders->getAll();
        $companies = $this->companies->getAll();

        //total shares for company
        //TODO: seperate based on SOLID principles (Single Responsibility)
        $total_shares = Share::where('company_id', $id)->sum('share');
        $balance = 100 - $total_shares;

        return view('shares.create', array(
            'persons' => $persons,
            'shareholdertypes' => $shareHolderTypes,
            'companies' => $companies,
            'company' => $Company,
            'sharesreminaing' => $balance
        ));
    }

    public static function getOwner($owner_type, $owner_id) {
        if($owner_type == 'Person'){
            $shareholders = new ShareHolderRepository();
            $person = $shareholders->find($owner_id);
            return $person->firstname .' '. $person->lastname;
        }

        //TODO: Add logic for Company owner

    }

    /**
     * Create a new Company.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->companies->create($request->all());
        return redirect('/companies');
    }
    /**
     * Display an Company
     *
     * @param type $id
     * @return type
     */
    public function show($id) {
        $Company = $this->companies->find($id);
        return view('companies.show', compact('Company'));
    }
    /**
     * Display a form to edit an Company.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return $id;
        $Company = $this->companies->find($id);
        return view('companies.edit', compact('Company'));
    }
    /**
     * Update an Company.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->companies->update($request->all(), $id);
        return redirect('/companies');
    }
    /**
     * Delete an Company
     *
     * @param type $id
     * @return \Illuminate\Http\Response
     */
    public function destory($id) {
        $this->companies->delete($id);
        return redirect('/companies');
    }
}
