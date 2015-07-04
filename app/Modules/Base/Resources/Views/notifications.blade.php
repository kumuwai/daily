@if ($errors->any())
    <div class="row">
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Errors Found</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div><!-- /.alert -->
    </div><!-- /.row -->
@endif
