@extends('layouts.app')

@section('nav')
	@include('partials.admin-nav')
@endsection

@section('content')
 <div class="container">
 	 <div class="bs-example" style="margin-top:120px">
    <table class="table table-striped">
      <thead>
        <tr>
          <td>#</td>
          <td>Username</td>
          <td>Email</td>
          <td>Join Date</td>
        </tr>
      </thead>
      <tbody>
      	@foreach($users as $user)
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at }}</td>
         @endforeach
        </tr>
	 </tbody>
    </table>
  </div>
 </div>
@endsection