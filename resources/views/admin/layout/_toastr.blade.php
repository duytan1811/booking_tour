@if(\Illuminate\Support\Facades\Session::has('flash_mess'))
    <script>
        $.toast({
            heading: '{!! __('layouts.stauts.success') !!}',
            text: '{!! \Illuminate\Support\Facades\Session::get('flash_mess') !!}',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
    </script>
@endif
@if(\Illuminate\Support\Facades\Session::has('flash_error'))
    <script>
        $.toast({
            heading:'{!! __('layouts.stauts.danger') !!}',
            text: '{!! \Illuminate\Support\Facades\Session::get('flash_error') !!}',
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3000,
            stack: 6
        });
    </script>
@endif
