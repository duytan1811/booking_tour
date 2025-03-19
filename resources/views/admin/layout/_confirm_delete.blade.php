<script>
    function confirmDelete(event, element) {
        event.preventDefault();
        swal({
            title: '@lang('layouts.confirm_delete.title')',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#1e88e5',
            cancelButtonColor: '#fc4b6c',
            confirmButtonText: '@lang('layouts.buttons.submit')',
            cancelButtonText: '@lang('layouts.buttons.cancel')',
        },function () {
            $(element).parent('form').submit();
        });
    }

</script>
