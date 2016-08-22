var datatableColumns = [
    {data: 'id', name: 'id', searchable: false},
    {data: 'code', name: 'code'},
    {data: 'name', orderable: true, name: 'name'},
    {data: 'manager', orderable: true, name: 'manager'},
    {data: 'member', orderable: true, name: 'member', searchable: false},
    {data: 'founding', orderable: true, name: 'founding'},
    {data: 'actions', name: 'actions', orderable: false, searchable: false, sClass: "text-center"}
];

var datatableOptions = {
    createdRow: function (row, data, index) {
        $('td', row).eq(0).css('display', 'none');
        
        if (data.actions.show) {
            $('td', row).eq(2).html('<a title="' + data.actions.show.label + '" href="' + data.actions.show.uri + '">' + data.name + '</a>');
        }

        var actions = data.actions;
        if (! actions || actions.length < 1) {
            return ;
        }

        var actionHtml = $('td', row).eq(6);
        actionHtml.html('');

        if (actions.edit) { 
            actionHtml.append('<a href="#newProvider" title ="' + actions.edit.label + '" id="' + data.id + '" data-toggle="modal" class="btn btn-default btn-xs edit-room" ><i class="fa fa-pencil"></i></a>');
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