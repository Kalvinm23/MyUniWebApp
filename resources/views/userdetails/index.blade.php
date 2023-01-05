@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            {!! Form::open(['action' => ['UserDetailsController@search', 1], 'method' => 'POST', 'files' => true, 'autocomplete' => 'off']) !!}
                            <td>
                                {{Form::number('userid', '', ['class' => 'form-control', 'placeholder' => 'Search Users ID', 'required' => 'required'])}}
                            </td>
                            <td>
                                {{Form::submit('Search', ['class' => 'btn btn-primary btn-lg'])}}
                            </td>
                            {!! Form::close() !!}
                        </tr>
                        <tr>
                            {!! Form::open(['action' => ['UserDetailsController@search', 2], 'method' => 'POST', 'files' => true, 'autocomplete' => 'off']) !!}
                            <td>
                                {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Search Users Email', 'required' => 'required'])}}
                            </td>
                            <td>
                                {{Form::submit('Search', ['class' => 'btn btn-primary btn-lg'])}}
                            </td>
                            {!! Form::close() !!}
                        </tr>
                        <tr>
                            {!! Form::open(['action' => ['UserDetailsController@search', 3], 'method' => 'POST', 'files' => true, 'autocomplete' => 'off']) !!}
                            <td>
                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Search Users Name', 'required' => 'required'])}}
                            </td>
                            <td>
                                {{Form::submit('Search', ['class' => 'btn btn-primary btn-lg'])}}
                            </td>
                            {!! Form::close() !!}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
    </div>
    </div>  
@endsection
