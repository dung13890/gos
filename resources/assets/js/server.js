$(document).ready(function() {
    if (typeof flash_message !== 'undefined' && flash_message) {
        var e = JSON.parse(flash_message);
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "progressBar": false,
            "preventDuplicates": true,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "400",
            "hideDuration": "600",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        e.code == 0 ? toastr.success(e.message) : toastr.error(e.message);
    }
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".searchclear").click(function(){
        $(".searchinput").val('');
    });
});

function alertDestroy(route) {
    swal({
        title: "Bạn chắc chắn chứ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Chắc chắn!",
        cancelButtonText: "Hủy",
        closeOnConfirm: true
    }, function() {
        $.post(route, {_method: 'DELETE'}, function (data) {
            window.location.reload();
        });
    });
};

function renderTable(route, columns, options, callback, selector) {
    var route = route || null;
    var columns = columns || [];
    var options = options || {};
    var selector = selector || "#table-index";

    var defaultOptions = {
        processing: true,
        serverSide: true,
        ajax: route,
        sorting: [0, 'desc'],
        columns: columns,
        bLengthChange: false,
        pageLength: 15,
        language: {
            search:"_INPUT_",
            lengthMenu: "_MENU_",
        }
    };

    options = $.extend(defaultOptions, options);

    if (typeof callback === 'function') setTimeout(callback, 500);
    if (route) {
        $(selector).DataTable(options);
        $('.dataTables_filter input').remove();
        $("#filter").append($(".dataTables_length")).append($(".dataTables_filter"));
    } else {
        return;
    }
}