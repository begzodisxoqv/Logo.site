<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class AboutsController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index', compact('abouts'));
    }

    public function create() {
        $abouts = About::all();
        return view('admin.about.create', compact('abouts'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $abouts = About::create($request->all());
            if ($request->image) {
                $this->storeImage($abouts);
            }
            return redirect()->route('abouts.index');
        }
    }



    public function edit($id)
    {
        $abouts = About::find($id);
        return view('admin.about.edit', compact('abouts'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $abouts = About::find($id);
            $abouts->update($request->all());
            if ($request->image) {
                $this->storeImage($abouts);
            }
        }
        return redirect()->route('abouts.index');
    }






    public function destroy($id)
    {
        $abouts = About::find($id);
        if ($abouts->image){
            unlink(public_path() . '/storage/' . $abouts->image );
        }
        $abouts->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('abouts.index');
    }

    

    private function storeImage($abouts)
    {
        if (request()->has('image')) {
            $abouts->update([
                'image' => \request()->image->store('abouts', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $abouts->image));
        $image->save();
    }

}
