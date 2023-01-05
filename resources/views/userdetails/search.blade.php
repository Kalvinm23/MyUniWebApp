@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="row">               
                @if(count($users) > 0)
                @foreach($users as $user)
                <div class="col-lg-6 col-md-6 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">
                               ID: #{{$user->user_id}}
                            </h4>
                            <p class="card-text">Name: {{$user->first_name}} {{$user->last_name}}</p>
                            <p class="card-text">Email: <?php echo \App\Http\Controllers\UserDetailsController::showemail($user->user_id);?></p>
                            <p class="card-text">Contact Number: {{$user->contact_number}}</p>
                            <a type ="button" class="btn btn-success btn-lg" href="/userdetails/{{$user->user_id}}">View</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
@endsection