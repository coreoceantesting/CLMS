function deleteUser(userId) 
{
    document.getElementById('deleteForm' + userId).submit();
}

   $(document).ready(function() {
    $('#completed_list,#pending_list').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf', 'print'
        ],
        order: [[3, 'desc']]
    } );

    $('#test').multipleSelect({
        filter: true,
        placeholder: 'Select Test'
      })
} );