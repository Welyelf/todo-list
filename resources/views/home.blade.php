<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>To Do List</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        </link>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-white">
                        <div class="card-body">
                            <h3>TO DO LIST</h3>
                            <p>
                                <strong>Show Category :</strong> @foreach($categories as $category) <a class="nav-link" data-toggle="tab" href="#{{strtolower($category->name)}}" role="tab" aria-selected="false">
                                    {{ $category->name }}
                                </a> | @endforeach <a class="nav-link active" data-toggle="tab" href="#all" role="tab" aria-selected="true">All</a>
                            </p>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="todo-list"> @foreach($lists as $todo) <div class="todo-item">
                                            <div class="checker">
                                                <span class="">
                                                    <input type="checkbox" id='{{ $todo->id }}' class="checkbox" @if($todo->is_done) checked @endif> </span>
                                            </div>
                                            <span> @if($todo->is_done) <s>{{ $todo->title }}</s> @else {{ $todo->title }} @endif </span>
                                            <a href="javascript:void(0);" id='{{ $todo->id }}' data-token='@csrf' class="float-right remove-todo-item">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div> @endforeach </div>
                                </div> @foreach($categories as $category) <div class="tab-pane" id="{{strtolower($category->name)}}" role="tabpanel">
                                    <div class="todo-list"> @foreach($lists as $todo) @if($todo->category_id === $category->id) <div class="todo-item">
                                            <div class="checker">
                                                <span class="">
                                                    <input id='{{ $todo->id }}' type="checkbox" class="checkbox" @if($todo->is_done) checked @endif> </span>
                                            </div>
                                            <span> @if($todo->is_done) <s>{{ $todo->title }}</s> @else {{ $todo->title }} @endif </span>
                                            <a href="javascript:void(0);" id='{{ $todo->id }}' class="float-right remove-todo-item">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </div> @endif @endforeach </div>
                                </div> @endforeach
                            </div>
                            <hr>
                            <form action="{{url('todo-add')}}" method="POST"> @csrf <div class="form-group row">
                                    <div class="col-md-8">
                                        <label for="toDoTitle">Add TO DO</label>
                                        <input type="text" class="form-control" id="toDoTitle" name='toDoTitle' aria-describedby="toDoTitle">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select class="form-control" name="category">
                                                <option>Choose Category</option> @foreach($categories as $category) <option value='{{ $category->id }}'>{{ $category->name }}</option> @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add To Do</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <h3>CATEGORIES</h3>
                            <form class="form-group row" action="{{url('category-add')}}" method="POST"> @csrf <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" id="categoryName" name="categoryName">
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2">Add Category</button>
                                </div>
                            </form>
                            <div class="todo-list"> @foreach($categories as $category) <div class="todo-items">
                                    <a href="javascript:void(0);" id='{{ $category->id }}' class="float-left remove-category">
                                        <i class="fa fa-close remove-category"></i>
                                    </a>
                                    <span class='category-title'>
                                        <strong>{{ $category->name }}</strong>
                                    </span>
                                </div> @endforeach </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
</html>