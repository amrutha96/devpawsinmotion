{!! $data !!}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('select.caretaker_select').change(function () {
            var appointmentId = $(this).parent().find('#appointment_id').val();
            var caretakerId = $(this).val();
            $.ajax({
                url: '{{ route("admin.assign") }}',
                type: 'POST',
                data: {
                    appointment_id: appointmentId,
                    caretaker_id: caretakerId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    window.location.reload();
                },
                error: function (xhr, status, error) {
                    alert('Something went wrong!!!')
                }
            });

        });

        $('.status_checkbox').on('change', function () {
            var appointmentId = $(this).parent().find('#appointment_id_check').val();
            var status = $(this).is(':checked') ? 'completed' : 'assigned';

            // Send AJAX request to update status
            $.ajax({
                url: '{{ route("admin.completestatus") }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: 'application/json',
                data: JSON.stringify({
                    appointment_id: appointmentId,
                    status: status
                }),
                success: function (response) {
                    // Handle response
                    console.log(response);
                }
            });
        });
    });

</script>
