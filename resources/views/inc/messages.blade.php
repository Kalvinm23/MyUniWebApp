@if(count($errors) > 0)
    @foreach($errors->all() as $error) 
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <div class="alert alert-danger">
                {{$error}}
            </div>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    @endforeach
@endif

@if(session('success'))
<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endif

@if(session('error'))
<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    </div>
    <div class="col-lg-2">
    </div>
</div>
@endif