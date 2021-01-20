@extends('layouts.app')
@section('content')

<div class = "w-100 h-100 d-flex justify-content-center align-items-center">
    <div class ="w-50 text-center">
        <h1 class= "display-2 text-white">To Do List</h1>
         <h3 class= "text-white pt-5">By Mel Espiloy</h3>
    <form action="{{route('Todolist.store')}}" method="POST">
        @csrf
        <div class="input-group mb-3 w-100">
            <input type="text"class= "form-control form-control-lg" name='title' placeholder= "Add some task" aria-label="Username"aria-describedby="button-addon2">
            <div class= "input-group-append">
                <button class = "btn btn-success" type="Submit" id="button-addon2">Add to the task</button>

            </div>
        </div>
    </form>

        <h2 class= "text-white pt-2">Todo List Task</h2>
        <div class= "bg-white w-100">
            @foreach($todolist as $todolist)
            <div class="w-100 d-flex align-items-center justify-content-between">
            <div class= "p-4">@if($todolist->completed == 0)
            
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-right" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <line x1="5" y1="12" x2="19" y2="12" />
            <line x1="15" y1="16" x2="19" y2="12" />
            <line x1="15" y1="8" x2="19" y2="12" />
            </svg>

            @else
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="12" r="9" />
            <path d="M9 12l2 2l4 -4" />
            </svg>    
            @endif  {{$todolist->title}}</div>   
          
            <div class ="mr-3 d-flex items-center">
                @if($todolist->completed == 0)
                <form action="{{route('Todolist.update',$todolist->id)}}"method="POST">
                @method('PUT')
                @csrf
                <input type="text" name="completed" value ="1" hidden>
                <button class="btn btn-success"> Completed Task</button>
                </form>
                @else
                <form action="{{route('Todolist.update',$todolist->id)}}"method="POST">
                @method('PUT')
                @csrf
                <input type="text" name="completed" value ="0" hidden>
                <button class="btn btn-warning"> Uncompleted Task</button>
                </form>
                @endif
            
            </div>
            </div>          
            @endforeach
            
        </div>
    </div>
</div>
@endsection