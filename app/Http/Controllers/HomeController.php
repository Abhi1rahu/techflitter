<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Storage;
use Illuminate\Support\Facades\Cache;
use Validator;
use App\Models\BasicDetails;
use Illuminate\Support\Facades\Mail;
use App\Mail\AddDataMail;
use App\Mail\DeleteDataMail;


class HomeController extends Controller
{


public function home(Request $request)
{

        return view('basic-details');

}

Public function saveDetails(Request $request){

    $data = $request->all();
    $validator = $this->validateGame($request);
 
    if ($validator->fails())
    {
        return redirect()->back()->with(['errors'=>$validator->errors()]);
    }

    $file = $request->file('file');
    $file_name = str_replace(" ","-",substr($file->getClientOriginalName(),0,strrpos($file->getClientOriginalName(),'.')));
    $file_extension = $file->getClientOriginalExtension();

    Storage::put($file_name.$file_extension, file_get_contents($file), 'public');
    $storagePath = 'http://127.0.0.1:8080'.Storage::disk('local')->getAdapter()->getPathPrefix().$file_name.'.'.$file_extension;
  
    $data['file_name'] = $file_name;
    $data['file_extension'] = $file_extension;

    unset($data['_token']);
    unset($data['file']);
    
    $this->detailsm()->saveDetails($data);

    $details = [
        'title' => 'Mail from techflitter for adding details',
        'body' => 'This is generic reminder from techflitter team that we have added your data and stored your file. You can see your file using this link.
        ' .$storagePath,
        'name' => $data['name'],
    ];

    Mail::to($data['email'])->send(new AddDataMail($details));

    return redirect('/view-details')->with('status','Details added successfully.');

}

public function validateGame($request){
    $validator = Validator::make($request->all(), [                
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email','max:255'],
            'mobile' => ['required','digits:10','gt:5000000000'],
            'file.*' => ['required','mimes:image,pdf,docx,zip']
        ],
        $messages = [
            'name.required' => 'Enter Name.',
            'email.required' => 'Enter Email',
            'mobile.required' => 'Enter Mobile Number',
            'file.required' => 'Add File'
           
        ]);

    return $validator;
}

public function viewDetails(){
    $data = $this->detailsm()->viewDetails();

    return view('view-details',compact('data'));
}

public function deleteDetails($id){

    $data = $this->detailsm()->viewDetailsById($id);
    if (Storage::exists($data->file_name.$file_extension)) {
        Storage::delete($data->file_name.$file_extension);
    }
    $details = [
        'title' => 'Mail from techflitter for delete details',
        'body' => 'This is generic reminder from techflitter team that we have delete your data. Thank you for connect with us.',
        'name' => $data->name,
    ];

    Mail::to($data['email'])->send(new DeleteDataMail($details));

    return redirect('/view-details')->with('status','Details added successfully.');
}

public function detailsm()
{
    $details = new BasicDetails();
    return $details;
}
}