@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <strong><li>{{ $error }}</li></strong>
        @endforeach
    </div>
@endif
@if (session()->has('val_errors'))
    <div class="alert alert-danger">
        @foreach (session()->get('val_errors') as $k=>$v)
            <?php
              $msg=array_values($v);
            ?>
            <strong><li>{{ $msg[0][0] }}</li></strong>
        @endforeach
    </div>
@endif
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if (session()->has('canvas'))
        {!! session()->get('canvas') !!}
@endif
