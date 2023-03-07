@extends('layout.main')
 
@section('content')

<div class="container">
  <h2><center>To do list</center></h2>

  <div class="container">

    <form action="/create" method="POST">
      {{ csrf_field() }}

    <!-- mozi a i ne mora -->
       @if(count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </div>
      @endif

      <button type="submit" class="btn btn-primary right action_submit">Create</button>

      <div class="clearfix"></div>
      
      <div class="form-group">
        <label for="usr">Target:</label>
        <input type="text" class="form-control" id="usr" name="target" placeholder="Target...">
      </div>
      <div class="form-group">
        <label for="pwd">Ranking:</label>
        <input type="number" class="form-control" id="pwd" name="ranking" placeholder="Ranking..">
      </div>
      
    </form>
  </div>
             
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Target</th>
        <th>Rank</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($targets as $target)
      <tr>
        <td>{{$target->target}}</td>
        <td>{{$target->ranking}}</td>
        <td class="action_td">
            <a href="/edit/{{$target->id}}"><button type="button" class="btn btn-info">Edit</button></a>
            <a href="/delete/{{$target->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
{{$targets->links()}}
  
  @endsection


