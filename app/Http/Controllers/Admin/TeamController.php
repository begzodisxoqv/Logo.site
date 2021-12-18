<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('admin.team.index', compact('team'));
    }

    public function create() {
        $team = Team::all();
        return view('admin.team.create', compact('team'));
    }



    public function store(Request $request) {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
           
        ]);
        if ($valid) {
            $team = Team::create($request->all());
            if ($request->image) {
                $this->storeImage($team);
            }
            return redirect()->route('team.index');
        }
    }



    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.team.edit', compact('team'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'title_1' => ['nullable', 'string'],
            'text' => ['nullable', 'string'],
            
        ]);


        if ($valid) {
            $team = Team::find($id);
            $team->update($request->all());
            if ($request->image) {
                $this->storeImage($team);
            }
        }
        return redirect()->route('team.index');
    }






    public function destroy($id)
    {
        $team = Team::find($id);
        if ($team->image){
            unlink(public_path() . '/storage/' . $team->image );
        }
        $team->delete();
        Alert::success('Успешно', 'Данные удалены!');
     
        return redirect()->route('team.index');
    }

    

    private function storeImage($team)
    {
        if (request()->has('image')) {
            $team->update([
                'image' => \request()->image->store('team', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $team->image));
        $image->save();
    }

}
