$(document).ready(function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="x-csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '.btn_report_file', function (event) {
        event.preventDefault();
        var $this = $(this);
        var file_id = $this.data('fid');

        $.ajax({
            url: '/file/report',
            type: 'post',
            dataType: 'json',
            data: {
                file_id: file_id
            },
            success: function (response) {
                if (response.success) {
                    Swal.fire({
                        type: 'success',
                        title: 'موفق',
                        text: response.message,
                    });
                } else if (!response.success) {
                    Swal.fire({
                        type: 'error',
                        title: 'ناموفق',
                        text: response.message,
                    });
                }
            },
            error: function (response) {
                if (!response.success) {
                    Swal.fire({
                        type: 'error',
                        title: 'ناموفق',
                        text: response.message,
                    });
                }
            }
        });
    })
});
