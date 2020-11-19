<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Storage;

class CookbookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $recipes = Recipe::orderBy('created_at', 'desc')->paginate(10);
        return view('recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
       //return redirect()->route('recipes.index')
            //->with('success','Product created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required',
            'recipe_image' => 'image|nullable|max:1999'
        ]);
        //File Upload
        if ($request->hasFile('recipe_image')){
            //Get filenname with the extension
            $filenameWithExt= $request->file('recipe_image')->getClientOriginalName();
            //Get just filename
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension= $request->file('recipe_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore= $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('recipe_image')->storeAs('public/recipe_images', $fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }

        //create Recipe
        $recipe = new Recipe;
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->preparation = $request->input('preparation');
        $recipe->user_id = auth()->user()->id;
        $recipe->recipe_image = $fileNameToStore;
        $recipe->save();

        return redirect()->route('cookbook.index')
            ->with('success','Recipe created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.show')->with('recipe', $recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        return view('recipes.edit')->with('recipe', $recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'preparation' => 'required'
        ]);

        //File Upload
        if ($request->hasFile('recipe_image')){
            $filenameWithExt= $request->file('recipe_image')->getClientOriginalName();
            $filename =pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension= $request->file('recipe_image')->getClientOriginalExtension();
            $fileNameToStore= $filename. '_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('recipe_image')->storeAs('public/recipe_images', $fileNameToStore);
        }

        //update Recipe
        $recipe = Recipe::find($id);
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->preparation = $request->input('preparation');
        if ($request->hasFile('recipe_image')){
            $recipe->recipe_image = $fileNameToStore;
        }
        $recipe->save();



        return redirect()->route('cookbook.index')
            ->with('success','Recipe Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();

        if ($recipe->recipe_image != 'noimage.jpg'){
            //delete images
            Storage::delete('public/recipe_images/'.$recipe->recipe_image);
        }

        return redirect()->route('cookbook.index')
            ->with('success','Recipe deleted successfully');
    }
}
