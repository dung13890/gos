
var datatableColumns = [
    {data: 'id', name: 'id', searchable: false},
    {data: 'username', name: 'username'},
    {data: 'email', orderable: true, name: 'email'},
    {data: 'phone', orderable: true, name: 'phone'},
    {data: 'rooms', orderable: true, name: 'rooms', searchable: false},
    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
];

var datatableOptions = {
    createdRow: function (row, data, index) {
        $('td', row).eq(0).css('display', 'none');
        if (data.actions.show) {
            $('td', row).eq(1).html('<a title="' + data.actions.show.label + '" href="' + data.actions.show.uri + '">' + data.username + '</a>');
        }
        var actions = data.actions;
        
        if (! actions || actions.length < 1) {
            return;
        }

        var actionHtml = $('td', row).eq(5);

        actionHtml.html('');

        if (actions.edit) { 
            actionHtml.append('<a title ="' + actions.edit.label + '" class="btn btn-default btn-xs" href="' + actions.edit.uri + '"><i class="fa fa-pencil"></i></a>');
        }

        if (actions.delete) { 
            actionHtml.append('<a title ="' + actions.delete.label + '" class="btn btn-danger btn-xs handle-delete" href="' + actions.delete.uri + '"><i class="fa fa-times"></i></a>');
        }
    }
};

$(function() {
    renderTable(datatableRoute, datatableColumns, datatableOptions, function () {
        $('.handle-delete').click(function (e) {
            e.preventDefault();
            alertDestroy($(this).attr('href'));
        });

        $('#table-index_wrapper .row:first').remove();

        $('.searchinput').keyup(function() {
            $('#table-index').DataTable().search($(this).val()).draw() ;
        });
    });

    $(".input-datepicker").datepicker({
        todayHighlight: true, 
        format: 'dd/mm/yyyy', 
        orientation: 'bottom auto',
        language: "vi",
        endDate: 'd'
    });
});