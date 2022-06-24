<?php

namespace App\Http\Controllers;

use App\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        ToDoList::create([
            'title' => $request->toDoTitle,
            'is_done' => 0,
            'category_id' => $request->category
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
        $todo = ToDoList::find($id);
        $todo->delete();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  $id  ID of the resource to update
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $todo = ToDoList::find($id);
        $todo->is_done = request('is_done');
        $todo->save();
        return json_encode(array('statusCode'=>200));
    }
}
