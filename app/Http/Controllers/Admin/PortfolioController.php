<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolio'));
    }

    public function create() {
        $portfolio = Portfolio::all();
        return view('admin.portfolio.create', compact('portfolio'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $portfolio = Portfolio::create($request->all());
            if ($request->image) {
                $this->storeImage($portfolio);
            }
            return redirect()->route('portfolio.index');
        }
    }



    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit', compact('portfolio'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $portfolio = Portfolio::find($id);
            $portfolio->update($request->all());
            if ($request->image) {
                $this->storeImage($portfolio);
            }
        }
        return redirect()->route('portfolio.index');
    }






    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        if ($portfolio->image){
            unlink(public_path() . '/storage/' . $portfolio->image );
        }
        $portfolio->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('portfolio.index');
    }

    

    private function storeImage($portfolio)
    {
        if (request()->has('image')) {
            $portfolio->update([
                'image' => \request()->image->store('portfolio', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $portfolio->image));
        $image->save();
    }

}
