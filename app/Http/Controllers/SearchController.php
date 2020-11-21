<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller
{
    public function index()
    {
        return view('recipes.index');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $recipes=DB::table('recipes')->where('name','LIKE','%'.$request->search."%")->get();
            if($recipes)
            {
                foreach ($recipes as $key => $recipe) {
                    $output.='<div class="card mb-3">'.
                        '<div class="row no-gutters"'.
                        '<div class="col-md-4">'.$recipe->recipe_image.'</div>'.
                        '<div class="col-md-8">'.
                        '<div class="card-body">'.
                        '<h5 class="card-title">'.$recipe->name.'</h5>'.
                        '<p class="card-text">'.$recipe->description.'</p>'.
                        '<p class="card-text">'.$recipe->ingredients.'</p>'.
                        '<div>'.
                        '</div>'.
                        '</div>';

                }
                return Response($output);
            }
        }
    }
}
