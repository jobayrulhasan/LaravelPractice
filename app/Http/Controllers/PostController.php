<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr; //toastr namespace



class PostController extends Controller
{
    function showData()
    {
        // $postdata = Post::get()->toArray();
        // echo "<pre>";
        // print_r($postdata); //if we want to see data in array
        // die;
        // return $postdata;
        $postdata = Post::latest()->simplePaginate(10);
        $TrashPostdata = Post::onlyTrashed()->latest()->simplePaginate(10); //for trash data
        return view('show_data', compact('postdata', 'TrashPostdata'));
    }

    function showDatatable() //jaquery datatable
    {
        $postdata = Post::all();
        return view('show_data_datatable', compact('postdata'));
    }

    public function addData()
    {
        return view('add_data');
    }
    public function storeData(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title' => 'required',
            ];
            $cm = [
                'title.required' => 'Title field is required *',
            ];
            $this->validate($request, $rules, $cm);

            $post = new Post();
            $post->title = $data['title'];
            $post->description = $data['description'];
            $post->status = '0';
            $post->save();


            //This is toastr code
            toastr::success('Data added successfully', 'Success!', ["positionClass" => "toast-top-right", "progressBar" => true, "timeOut" => "1000", "showDuration" => "300"]);
            return redirect('/show-data');
        }
    }
    public function editData($id = null)
    {
        $post = Post::findOrFail($id);
        return view('edit_data', compact('post'));
    }
    //Edit data
    public function storeEditData(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title' => 'required',
            ];
            $cm = [
                'title.required' => 'Title field is required *',
            ];
            $this->validate($request, $rules, $cm);

            $post = Post::findOrFail($id);
            $post->title = $data['title'];
            $post->description = $data['description'];
            $post->save();


            //This is toastr code
            toastr::success('Data edited successfully', 'Success!', ["positionClass" => "toast-top-right", "progressBar" => true, "timeOut" => "1000", "showDuration" => "300"]);
            return redirect('/show-data');
        }
    }
    public function deleteData($id = null)
    {
        Post::findOrFail($id)->delete();
        toastr::success('Find it in Trash section', 'Success!', ["positionClass" => "toast-top-right", "progressBar" => true, "timeOut" => "1000", "showDuration" => "300"]);
        return redirect()->back();
    }


    //For restoring process
    public function restoreData($id)
    {
        Post::withTrashed()->findOrFail($id)->restore();
        toastr::success('Data restored successfully', 'Success!', ["positionClass" => "toast-top-right", "progressBar" => true, "timeOut" => "1000", "showDuration" => "300"]);
        return redirect()->back();
    }
    public function deleteForeverData($id = null)
    {
        Post::onlyTrashed()->findOrFail($id)->forceDelete();
        toastr::success('Data forever deleted successfully', 'Success!', ["positionClass" => "toast-top-right", "progressBar" => true, "timeOut" => "1000", "showDuration" => "300"]);
        return redirect()->back();
    }
    //change status
    public function changeStatus($id)
    {
        $postStatus = Post::select('status')->where('id', $id)->first();
        if ($postStatus->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        Post::where('id', $id)->update(['status' => $status]);
        toastr::success('Status successfully changed', 'Success!', ["positionClass" => "toast-top-right", "progressBar" => true, "timeOut" => "1000", "showDuration" => "300"]);
        return redirect()->back();
    }
}
