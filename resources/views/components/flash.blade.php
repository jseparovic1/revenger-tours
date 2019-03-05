@if(Session::has('status'))
    <script>
        toastr.success({{ Session::get('status') }})
    </script>
@endif
