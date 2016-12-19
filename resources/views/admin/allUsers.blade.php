@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">All users</div>

                    <div class="panel-body">
                        <style>
                            table, th, td {
                                border: 1px solid black;
                                border-collapse: collapse;
                            }
                            th, td {
                                padding: 5px;
                                text-align: left;
                            }
                        </style>
                        <table>
                            <tr>
                                <th>Firstname</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                            @foreach($users as $user)
                                <form action="" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <tr>
                                        <input type="hidden" name="id" value="{{$user->id}}"/>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><select name="position">
                                                <option value="0" @if($user->position == 0) selected @endif>Default
                                                    position
                                                </option>
                                                <option value="1" @if($user->position == 1) selected @endif>Admin
                                                </option>
                                                <option value="2" @if($user->position == 2) selected @endif>Position 2
                                                </option>
                                                <option value="3" @if($user->position == 3) selected @endif>Position 3
                                                </option>
                                            </select></td>
                                        <td><input type="submit" name="submit" value="Set Position"></td>
                                    </tr>
                                </form>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection