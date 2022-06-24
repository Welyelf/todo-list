<?php

namespace App\Http\Controllers;

use App\Category;
use App\ToDoList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('name', 'ASC')->get();
        $lists = ToDoList::all();
        return view('home', compact('categories', 'lists'));
    }
}
