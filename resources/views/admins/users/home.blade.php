@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  @role(('admin'))
                    <p align="right"><a class="btn btn-primary btn-s" href="{{ action('UserController@create') }}">Create User</a></p>
                  @endrole
                    <table class="table">
                        <tbody>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->display_name }}</td>
                            <td>
                              <p>
                                <a class="btn btn-info btn-s" href="{{ action('HomeController@show', [$user->id]) }}">Show</a>
                                @role(('admin'))
                                 |
                                  <a class="btn btn-primary btn-s" href="{{ action('UserController@edit', [$user->id]) }}">Edit</a>
                                @endrole
                              </p>
                              @role(('admin'))
                                <form action="{{ action('UserController@destroy', [$user->id]) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button type="submit" class="btn btn-danger btn-s">Delete</button>
                                </form>
                              @endrole
                            </td>
                          </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
