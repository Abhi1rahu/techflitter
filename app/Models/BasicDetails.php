<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','email','file_name','mobile','file_extension'
    ];

    public function saveDetails($data){
        $createdgame = BasicDetails::create($data);
    }

    public function viewDetails(){
        return BasicDetails::get();
    }

    public function viewDetailsById($id){
        return BasicDetails::where('id',$id)->get();
    }
}
