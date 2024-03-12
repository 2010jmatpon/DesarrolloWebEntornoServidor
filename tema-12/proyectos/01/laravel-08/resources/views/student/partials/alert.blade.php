@if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Mensaje</strong> {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error</strong> {{session('error')}}
        <br>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        <br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
