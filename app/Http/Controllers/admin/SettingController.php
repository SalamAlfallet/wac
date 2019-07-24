<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Setting;
use App\Tag;

class SettingController extends Controller
{
    public function index()
    {

        return view('admin.setting.index')->with([

            'Settings' => Setting::all()
        ]);
    }





    public function update(Request $request)
    {

  $request->validate([

            'title' => 'required|max:255',
            'sitUrl' => 'required|max:255',
            'facebook' => 'required|max:255',
            'instgram' => 'required|max:255',
            'twitter' => 'required|max:255',
            'siteTitle' => 'required|max:255',
            'countPosts' => 'required|max:255',
            'countComments' => 'required|max:255'
        ]);
        $setting = Setting::all();

        foreach ($setting as $set) {

            $result = Setting::where('constant', $set->constant)->update(['value' => $request->input($set->constant)]);
        }

        if ($result == 1) {
            return redirect()->back()->with(['message'=> 'edit Success !','type'=> 'success']);
        } else {

            return redirect()->back()->with(['message'=>'Fail  Edit !','type'=> 'error']);
        }


        // return redirect(route('admin.tag'))->with('message', sprintf('Tag: "%s" add success !', $tag->name));
    }
    public function delete($id)
    {

        $tags = Tag::findOrfail($id);

        $tags->delete();
        return redirect(route('admin.tag'))
            ->with('message', sprintf('Tag "%s" deleted!', $tags->name));
    }

    public function editTag($id)
    {
        $tags = Tag::findOrfail($id);

        return  view('admin.tags.editTags', [
            'tags' =>  $tags,


        ]);
    }



    public function updateTag(Request $request, $id)
    {
        $tags = Tag::findOrfail($id);
        $tags->name = $request->input('name');
        $tags->save();
        return redirect(route('admin.tag'))->with('message', sprintf('Tags: "%s" update success !', $tags->name));
    }
}
