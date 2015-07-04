<?php namespace Kumuwai\Playground\Modules\Project001\Http\Controllers;

use Input;
use Redirect;
use Illuminate\Http\Request;
use Kumuwai\Playground\Http\Requests;
use Kumuwai\Playground\Http\Controllers\UIController;
use Kumuwai\Playground\Modules\Project001\Contact;


class ContactsController extends UIController
{
    protected $project = 'project001';

    private $repo;

    public function __construct(Contact $repo)
    {
        parent::__construct();

        $this->repo = $repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contacts = $this->repo->paginate(20);

        return view('project001::contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('project001::contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|alpha|max:30',
            'last_name' => 'alpha|max:30',
            'email' => 'required|email|max:80',
        ]);

        $new = $this->repo->create([
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'email' => Input::get('email'),
        ]);

        return Redirect::to('/project001/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contact = $this->repo->findOrFail($id);

        return view('project001::contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $contact = $this->repo->findOrFail($id);

        return view('project001::contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|alpha|max:30',
            'last_name' => 'alpha|max:30',
            'email' => 'required|email|max:80',
        ]);

        $contact = $this->repo->findOrFail($id);

        $contact->update([
            'first_name' => Input::get('first_name'),
            'last_name' => Input::get('last_name'),
            'email' => Input::get('email'),
        ]);

        return Redirect::to('/project001/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $contact = $this->repo->findOrFail($id);

        $contact->delete();

        return Redirect::to('/project001/');
    }
}
