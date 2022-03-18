@extends('layouts.app')

@section('content')

    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

     <a class="btn btn-primary mb-3" href="/shares/create">Add new share</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Total Capital</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($shares as $share)
      <tr valign="middle">
        <td class="align-middle">{{$share['firstname']}}</td>
        <td class="align-middle">{{$share['lastname']}}</td>
        <td class="align-middle">{{$share['email']}}</td>
        <td class="align-middle">{{$share['mobile']}}</td>
        <td class="align-middle">{{$totalCapital}}</td>
        <td class="align-middle"><a href="{{action('ShareController@edit', $share['id'])}}" class="btn btn-warning">Edit</a></td>
        <td class="align-middle">
          <form action="{{action('ShareController@destroy', $share['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
