@extends('layouts.app')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new company</div>

                    <div class="panel-body">
                        <form action="{{route('storeCompany')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>

                            <div class="form-group @if ($errors->has('name')) has-error @endif">
                                <input type="text" placeholder="Enter name of company" name="name"/>
                                @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                            </div>

                            <div class="form-group @if ($errors->has('logo')) has-error @endif">
                                <input type="file" name="logo" id="logo">
                                @if ($errors->has('logo')) <p class="help-block">{{ $errors->first('logo') }}</p> @endif
                            </div>

                            <input type="submit" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection