<script type="text/javascript">
    $(document).ready(function () {
        $('#transaction_table').DataTable({
            /*dom: "<'row'<'col-sm-3'l><'col-sm-3'f><'col-sm-6'p>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",*/
            dom: "<'row'<'col-sm-3'l><'col-sm-3'><'col-sm-6'p>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            paging: true,
            pageLength: 10,
            ajax: function ( data, callback, settings ) {
                $.ajax({
                    url: '/player/transactions',
                    type: 'post',
                    contentType: 'application/x-www-form-urlencoded',
                    data: {
                        page: data.start,
                        limit: data.length
                    },
                    success: function( data, textStatus, jQxhr ){
                        data = JSON.parse(data);
                        callback({
                            data: data.data,
                            recordsTotal:  data.total_records,
                            recordsFiltered:  data.records_filtered
                        });
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                    }
                });
            },
            serverSide: true,
            columns: [
                { data: "ref_id" },
                { data: "type" },
                { data: "amount" },
                { data: "closing_balance" },
                { data: "created_at" }
                //{ data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
            ]
        });

        $('.dataTables_length').addClass('bs-select');
        $('#deposit_table').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
