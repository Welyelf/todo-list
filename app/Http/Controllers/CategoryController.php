<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Category::create([
            'name' => $request->categoryName
        ]);
        //return ['success' => true, 'message' => 'Added!'];
        return redirect('/')->with('status', 'Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id  ID of the resource to remove
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Category::find($id);
        $todo->delete();
    }

}
