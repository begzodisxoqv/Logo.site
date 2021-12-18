<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('admin.services.index', compact('services'));
    }

    public function create() {
        $services = Services::all();
        return view('admin.services.create', compact('services'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $services = Services::create($request->all());
            if ($request->image) {
                $this->storeImage($services);
            }
            return redirect()->route('services.index');
        }
    }



    public function edit($id)
    {
        $services = Services::find($id);
        return view('admin.services.edit', compact('services'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $services = Services::find($id);
            $services->update($request->all());
            if ($request->image) {
                $this->storeImage($services);
            }
        }
        return redirect()->route('services.index');
    }






    public function destroy($id)
    {
        $services = Services::find($id);
        if ($services->image){
            unlink(public_path() . '/storage/' . $services->image );
        }
        $services->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('services.index');
    }

    

    private function storeImage($services)
    {
        if (request()->has('image')) {
            $services->update([
                'image' => \request()->image->store('services', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $services->image));
        $image->save();
    }

}
