@if(session('success'))
    <div class="container">
        <div class="alert alert-success alert-dismissible fade in margin-top" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <ul>
                <li>{{session('success')}}</li>
            </ul>
        </div>
    </div>
@endif