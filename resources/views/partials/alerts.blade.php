@if ($errors->any())
<div class="row ">
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@elseif (session('success'))
<div class="row ">
    <div class="alert alert-success">
        <ul class="mb-0">
                <li>{{ session('success') }}</li>
        </ul>
    </div>
</div>
@endif
