@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Your Profile</h4>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                    <input id="name" name="name" value="{{$userdetails->first_name}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                    <input id="lastname" name="lastname" value="{{$userdetails->last_name}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email Address</label> 
                                <div class="col-8">
                                    <input id="email" name="email" value="{{$user->email}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contactnumber" class="col-4 col-form-label">Contact Number</label> 
                                <div class="col-8">
                                    <input id="contactnumber" name="contactnumber" value="{{$userdetails->contact_number}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" class="col-4 col-form-label">Address</label> 
                                <div class="col-8">
                                    <input id="address" name="address" value="{{$userdetails->address}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="town" class="col-4 col-form-label">Town</label> 
                                <div class="col-8">
                                    <input id="town" name="town" value="{{$userdetails->city}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="postcode" class="col-4 col-form-label">Postcode</label> 
                                <div class="col-8">
                                    <input id="postcode" name="postcode" value="{{$userdetails->postcode}}" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            @if (Auth::user()->permission == 2 && $user->permission != 2)
                            <div class="form-group row">
                                <label for="status" class="col-4 col-form-label">Status</label> 
                                <div class="col-8">
                                    <input id="status" name="status" value="@if($user->status == 1) Active @else Inactive @endif" class="form-control here" type="text" disabled>
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <a type ="button" class="btn btn-primary" href="{{$userdetails->id}}/edit">Update My Profile</a>
                                </div>
                            </div>
                            @if (Auth::user()->permission == 2 && $user->permission != 2)
                            <div class="form-group row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-8">
                                    @if($user->status == 1)
                                    <a type ="button" class="btn btn-block btn-danger" onclick="return confirm('Are you sure you want to suspend {{$userdetails->first_name}} {{$userdetails->last_name}}?')" href="status/{{$user->id}}">Suspend Account</a>
                                    @else
                                    <a type ="button" class="btn btn-block btn-success" onclick="return confirm('Are you sure you want to reinstate {{$userdetails->first_name}} {{$userdetails->last_name}}?')" href="status/{{$user->id}}">Reinstate Account</a>
                                    @endif
                                </div>
                                <div class="col-lg-2">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection

