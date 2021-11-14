<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationStoreRequest;
use App\Http\Requests\FormationUpdatePictureRequest;
use App\Http\Requests\FormationUpdateRequest;
use App\Models\Formation;
use App\Models\FormationByCategories;
use App\Models\FormationByTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    public function index()
    {
        // $formations = DB::table('formations')->get();
        $formations = Formation::paginate(5);

        $formationsByTypes = DB::table('formations_types')->get();
        $types = DB::table('types')->get();

        $formationsByCategories = DB::table('formations_categories')->get();
        $categories = DB::table('categories')->get();

        return view('Formations.list', compact(['formations','formationsByTypes','types', 'formationsByCategories','categories']));
    }

    public function details($id)
    {
        $formation = Formation::find($id);
        return view('Formations.details', compact('formation'));
    }

    public function add()
    {
        $types = DB::table('types')->get();
        $categories = DB::table('categories')->get();
        return view('Formations.add', compact(['types', 'categories']));
    }

    public function store(FormationStoreRequest $request)
    {
        
        $params = $request->validated();
        $file = Storage::put('public',$params['picture']);
        
        $params['picture'] = substr($file,7);
        $formation = Formation::create($params);
        $getOnJson = json_encode($formation);
        $f = strpos($getOnJson, 'id":');
        $str = substr($getOnJson, $f);
        $str = str_replace('id":','',$str);
        $str = str_replace('}','',$str);
        $id = intval($str);
        $params2 = $request->all();
        $type = intval($params2['types']);
        $category = intval($params2['categories']);

        FormationByTypes::create([
            'type_id'=> $type,
            'formation_id' => $id
        ]);

        FormationByCategories::create([
            'category_id'=> $category,
            'formation_id' => $id
        ]);

        return redirect()->route('formationsList');
        
    }

    public function update($id) 
    {
        $types = DB::table('formations_types')->where('formation_id',$id)->first();
        $categories = DB::table('formations_categories')->where('formation_id',$id)->first();
        $formation = DB::table('formations')->find($id);
        $alltypes = DB::table('types')->get();
        $allcategories = DB::table('categories')->get();
        return view('Formations.update', compact(['formation','types','categories', 'allcategories','alltypes']));
    }

    public function sendUpdate($id, FormationUpdateRequest $request)
    {
        $params = $request->validated();
        $formation = Formation::find($id);
        $formation->update($params);
        $params2 = $request->all();

        
        $type = intval($params2['types']);
        $category = intval($params2['categories']);
        
        DB::table('formations_categories')->where('formation_id', '=', $id)->delete();
        DB::table('formations_types')->where('formation_id', '=', $id)->delete();

        FormationByTypes::create([
            'type_id'=> $type,
            'formation_id' => $id
        ]);

        FormationByCategories::create([
            'category_id'=> $category,
            'formation_id' => $id
        ]);
        
       return redirect()->route('formationDetails', $id);
    }

    public function sendUpdatePicture($id, FormationUpdatePictureRequest $request)
    {
        $params = $request->validated();
        $formation = Formation::find($id);
        
        if(Storage::exists("public/$formation->picture"))
        {
            Storage::delete("public/$formation->picture");
        }

        $file = Storage::put('public',$params['picture']);    
        $params['picture'] = substr($file,7);
        $formation->picture = $params['picture'];
        $formation->save();
        return redirect()->route('formationDetails', $id);
    }

    public function delete($id)
    {
        $formation = Formation::find($id);
        if(Storage::exists("public/$formation->picture"))
        {
            Storage::delete("public/$formation->picture");
        }
        DB::table('formations_categories')->where('formation_id', '=', $id)->delete();
        DB::table('formations_types')->where('formation_id', '=', $id)->delete();
        $formation->delete();
        return redirect()->route('formationsList');
    }
}
