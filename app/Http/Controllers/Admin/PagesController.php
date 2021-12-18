<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class PagesController extends Controller
{
    public function index()
    {
        $pages = Pages::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create() {
        $pages = Pages::all();
        return view('admin.pages.create', compact('pages'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $pages = Pages::create($request->all());
            if ($request->image) {
                $this->storeImage($pages);
            }
            return redirect()->route('pages.index');
        }
    }



    public function edit($id)
    {
        $pages = Pages::find($id);
        return view('admin.pages.edit', compact('pages'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $pages = Pages::find($id);
            $pages->update($request->all());
            if ($request->image) {
                $this->storeImage($pages);
            }
        }
        return redirect()->route('pages.index');
    }






    public function destroy($id)
    {
        $pages = Pages::find($id);
        if ($pages->image){
            unlink(public_path() . '/storage/' . $pages->image );
        }
        $pages->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('pages.index');
    }

    

    private function storeImage($pages)
    {
        if (request()->has('image')) {
            $pages->update([
                'image' => \request()->image->store('pages', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $pages->image));
        $image->save();
    }

}
