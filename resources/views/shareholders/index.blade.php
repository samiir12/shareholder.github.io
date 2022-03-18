@extends('layouts.app')

@section('content')

    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

     <a class="btn btn-primary mb-3" href="/shareholders/create">Add new Shareholder</a>
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

      @foreach($shareholders as $shareholder)
      <tr valign="middle">
        <td class="align-middle">{{$shareholder['firstname']}}</td>
        <td class="align-middle">{{$shareholder['lastname']}}</td>
        <td class="align-middle">{{$shareholder['email']}}</td>
        <td class="align-middle">{{$shareholder['mobile']}}</td>
        <td class="align-middle">{{$totalCapital}}</td>
        <td class="align-middle"><a href="{{action('ShareholderController@edit', $shareholder['id'])}}" class="btn btn-warning">Edit</a></td>
        <td class="align-middle">
          <form action="{{action('ShareholderController@destroy', $shareholder['id'])}}" method="post">
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
