var datatableRoute = 'units/datatable';

var datatableColumns = [
    {data: 'id', name: 'id', searchable: false},
    {data: 'name', name: 'name'},
    {data: 'short_name', name: 'short_name'},
    {data: 'description', name: 'description'},
    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"},
];

var datatableOptions = {
    createdRow: function (row, data, index) {
        $('td', row).eq(0).css('display', 'none');
        if (data.actions.show) {
            $('td', row).eq(1).html('<a title="' + data.actions.show.label + '" href="' + data.actions.show.uri + '">' + data.name + '</a>');
        }
        var actions = data.actions;

        if (! actions || actions.length < 1) {
            return;
        }

        var actionHtml = $('td', row).eq(4);
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
});
