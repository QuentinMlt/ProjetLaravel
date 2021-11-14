<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterStoreRequest;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function store($formationId, ChapterStoreRequest $request)
    {
        $params = $request->validated();
        $params['formation_id'] = $formationId;
        $f = Chapter::create($params);
        return back();
    }

    public function delete($id)
    {
        $chapter = Chapter::find($id);
        $chapter->delete();
        return back();
    }
}
