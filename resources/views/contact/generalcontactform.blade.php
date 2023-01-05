@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card card-info">
                <div class="card-heading">
                    <div class="card-title">
                        <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'ContactFormController@generalcontactsend', 'method' => 'POST', 'files' => true, 'autocomplete' => 'off']) !!}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('name', 'Full Name')}}
                                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Full Name'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('email', 'Email Address')}}
                                    {{Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email Address'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{Form::label('message', 'Message')}}
                                    {{Form::textarea('message', '', [ 'class' => 'form-control', 'placeholder' => 'Enter Message'])}}
                                    </div>        
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            {{Form::submit('Send Message', ['class' => 'btn btn-primary btn-lg'])}}
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
