

@if (session()->has('status'))

                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session()->get('status') }}
                </div>
            @elseif( session()->has('failed'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    {{ session()->get('failed') }}
                </div>
@endif
