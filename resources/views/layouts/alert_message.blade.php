@if ($errors->any())

<div class="alert alert-danger alert-dismissible">

    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

 

    <ul>

        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach

    </ul>

 

</div>

@endif

@if ($message = Session::get('error'))

<div class="alert alert-danger alert-dismissible">

    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    {{$message}}

</div>

@endif

@if ($message = Session::get('alert-danger'))

<div class="alert alert-danger alert-dismissible">

    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    {{$message}}

</div>

@endif

@if ($message = Session::get('alert-success'))

<div class="alert alert-success alert-dismissible">

    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

    {{$message}}

</div>

@endif