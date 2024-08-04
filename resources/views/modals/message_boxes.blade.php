@if (session('success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title:"{{ session('title') }}",
                text: "{{ session('message') }}",
                icon: 'success',
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'btn btn-primary mx-2',
                },
            });
        });
    </script>
@endif

@if (session('warning'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title:"{{ session('title') }}",
                text: "{{ session('message') }}",
                icon: 'warning',
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'btn btn-primary mx-2',
                },
            });
        });
    </script>
@endif

@if (session('failed'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                title:"{{ session('title') }}",
                text: "{{ session('message') }}",
                icon: 'error',
                customClass: {
                    actions: 'my-actions',
                    confirmButton: 'btn btn-primary mx-2',
                },
            });
        });
    </script>
@endif

