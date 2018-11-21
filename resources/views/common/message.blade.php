
@if (session()->has('success'))
    <div class="position-absolute" style="left:60%;top:135px;right:0;width:30%;z-index:50">
        <div class="alert alert-success alert-dismissible fade show m-0" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <strong> {{session('success')}}</strong>
        </div>
    </div>
@endif
