<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class PricingController extends Controller
{
    public function index()
    {
        $pricing = Pricing::all();
        return view('admin.pricing.index', compact('pricing'));
    }

    public function create() {
        $pricing = Pricing::all();
        return view('admin.pricing.create', compact('pricing'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $pricing = Pricing::create($request->all());
            if ($request->image) {
                $this->storeImage($pricing);
            }
            return redirect()->route('pricing.index');
        }
    }



    public function edit($id)
    {
        $pricing = Pricing::find($id);
        return view('admin.pricing.edit', compact('pricing'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $pricing = Pricing::find($id);
            $pricing->update($request->all());
            if ($request->image) {
                $this->storeImage($pricing);
            }
        }
        return redirect()->route('pricing.index');
    }






    public function destroy($id)
    {
        $pricing = Pricing::find($id);
        if ($pricing->image){
            unlink(public_path() . '/storage/' . $pricing->image );
        }
        $pricing->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('pricing.index');
    }

    

    private function storeImage($pricing)
    {
        if (request()->has('image')) {
            $pricing->update([
                'image' => \request()->image->store('pricing', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $pricing->image));
        $image->save();
    }

}
