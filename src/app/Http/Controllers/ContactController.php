<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }

   public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['firstname', 'lastname', 'gender', 'email', 'post','address', 'build', 'content']);
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)

{
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'gender' => 'required',
        'email' => 'required|email',
        'post' => 'required',
        'address' => 'required',
        'build' => 'nullable',
        'content' => 'required',
    ]);

    // fullnameの値を生成
    $fullname = $validatedData['firstname'] . ' ' . $validatedData['lastname'];

    // データベースに保存
    $formdata = new Contact();
    $formdata->fullname = $fullname;
    $formdata->gender = $validatedData['gender'];
    $formdata->email = $validatedData['email'];
$formdata->post = $validatedData['post'];
$formdata->address = $validatedData['address'];
$formdata->build = $validatedData['build'];
$formdata->content = $validatedData['content'];
$formdata->save();



      return view('thanks');
    }


    public function manage(Request $request)
    {
       $contact = DB::table('contacts')->paginate(10);
        return view('manage', compact('contact'));
    }







    public function manage2()
    {
        $contact = Contact::paginate(10);
        return view('manage2', ['contact' => $contact]);
    }


    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
    $email = $request->input('email');
    $gender = $request->input('gender');
    $start_date = $request->input('start_date');
    $end_date = $request->input('end_date');
            
    $query = DB::table('contacts');

    if ($fullname) {
        $query->where('fullname', 'like', '%' . $fullname . '%');
    }
    
    if ($email) {
        $query->where('email', 'like', '%' . $email . '%');
    }
    
    if ($gender) {
        $query->where('gender','=', $gender);
    }
    
    if ($start_date) {
        $query->where('created_at', '>=', $start_date);
    }
    
    if ($end_date) {
        $query->where('created_at', '<=', $end_date);
    }
    
    $contact = $query->paginate(10);
    
    

        return view('manage', compact('contact'));
    }





  public function destroy($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->back();
}

} 

