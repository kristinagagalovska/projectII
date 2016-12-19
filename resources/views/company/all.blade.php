@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{route('createCompany')}}">Create Company</a></div>

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
                                <th>Logo</th>
                                <th>Name of company</th>
                                <th>Action</th>
                            </tr>

                            @foreach($companies as $company)
                                    <tr>
                                        <td><img src="{{ url('images/' . $company->images) }}" width="42" height="42">
                                        </td>
                                        <td>{{$company->name}}</td>

                                        <td>
                                            <form method="GET" action="{{route('editCompany', $company->id)}}">
                                                <input type="hidden" name="_method" value="EDIT"/>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                <button type="submit">Edit</button>
                                            </form>
                                            <form method="POST" action="{{route('deleteCompany', $company->id)}}">
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                                <button type="submit">Delete</button>
                                            </form>
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