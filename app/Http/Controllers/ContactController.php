<?php

namespace App\Http\Controllers;
use App\Http\Traits\ContactTrait;
use App\Models\Contact;
use App\Models\Info;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * 1- call file abouttrait 
     * 2- call file imagetrait
     */
    use ContactTrait;

    /**
     * 1- private variable
     * 2- constructor to get data from model about
     */
    private $contactModel;
    public function __construct(Contact $contact)
    {
        $this->contactModel = $contact;
    }

    /**
     * 1- get data from constructor
     * 2- return view with data
     */

    public function index()
    {
         $contacts = $this->getContact();
        return view('admin.contacts.index' , compact('contacts'));
    }

    public function show()
    {
        $contacts = $this->getContact();
        $informations = Info::get()->groupBy('key');
        return view('web.contact', compact('contacts' , 'informations'));
    }

    
    /**
     * @param Request $request
     * 1- validation
     * 2- store image
     * 3- store database
     * 4- return to user with message
     */
   public function store(Request $request)
   {
    $request->validate([
        'name' => 'required|min:3|max:254',
        'body' => 'required|min:3',
        'email' => 'required|email:rfc,dns'
    ]);
    $this->contactModel::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->body,
    ]);

    session()->flash('done', 'Message Was Sended');
    return redirect(route('index'));
       
   }



}
