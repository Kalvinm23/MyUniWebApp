@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Update Profile</h2>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => ['UserDetailsController@update', $userdetails->id], 'method' => 'POST', 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('firstname', 'First Name')}}
                                    {{Form::text('firstname', $userdetails->first_name, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('lastname', 'Last Name')}}
                                    {{Form::text('lastname', $userdetails->last_name, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('address', 'Address')}}
                                    {{Form::text('address', $userdetails->address, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('postcode', 'Postcode')}}
                                    {{Form::text('postcode', $userdetails->postcode, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('city', 'City')}}
                                    {{Form::text('city', $userdetails->city, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('contactnumber', 'Contact Number')}}
                                    {{Form::number('contactnumber',  $userdetails->contact_number, ['class' => 'form-control'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Update', ['class' => 'btn btn-primary btn-lg'])}}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
    </div>
    </div>  
@endsection
