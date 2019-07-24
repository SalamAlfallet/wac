<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Download;
use Storage;

class DownloadsController extends Controller
{
    public function index(){

        return view('admin.downloads.index')->with([
            'download'=> Download::paginate(),


          ]);
    }


    public function store(Request $request){

        $request->validate([

            'name' => 'required|max:255',
            'file' => 'required'
            ]);

       $file=$request->file('file');
        Download::create([
            'name' => $request->post('name'),
            'filepath' => $file->store('downloads'),
            'mimetype' =>$file->getClientMimeType(),
            'size' =>$file->getClientSize(),
            'user_id' => $request->user()->id,
            'downloads'=>0,



            ]);
return redirect()->action('admin\DownloadsController@index')->with('success','File Created !');

    }


    public function downloads($id){


        $download= Download::findOrfail($id);
        $download->increment('downloads',1);
        $ext=pathinfo(storage_path('app/'. $download->filepath ),PATHINFO_EXTENSION);
        return Storage::download($download->filepath ,$download->name . '.'. $ext);

    //   return response()->download(storage_path('app/'. $download->filepath ),$download->name . '.'. $ext);
    }


    public function preview($id){


        $download= Download::findOrfail($id);
        $download->increment('downloads',1);


    return response()->file(storage_path('app/'. $download->filepath ));
    }

    public function delete($id){


        $download= Download::findOrfail($id);
        $download->delete();
        Storage::delete($download->filepath);

        return redirect()->action('admin\DownloadsController@index')->with('success','File Deleted !');
    }


}
