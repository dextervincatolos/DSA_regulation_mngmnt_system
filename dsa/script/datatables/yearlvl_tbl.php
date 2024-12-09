
<script>

    $(function () {
        var currentDate = new Date();
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var formattedDate = currentDate.toLocaleDateString('en-US', options);
        
        $("#yearlvl_tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'DSA Year level list ' + formattedDate,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                },
                {
                    extend: 'csvHtml5',
                    title: 'DSA Year level list ' + formattedDate,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                },
                {
                    extend: 'pdfHtml5',
                    title: 'DSA Year level list ' + formattedDate,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                    customize: function (doc) {
                        doc.content.splice(0, 1, {
                            text: [
                                { text: 'DSA Year level list\n', fontSize: 14, bold: true,alignment: 'center'},
                                { text: 'System Generated Report\n\n', fontSize: 12,alignment: 'center' },
                                { text: 'Generated Date: ' + formattedDate, fontSize: 9,alignment: 'center' }
                            ],
                            margin: [0, 0, 0, 12]
                        });
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length).fill('*'); // Equal column widths
                        doc.content[1].alignment = 'center'; // Center the table
                    }
                },
                {
                    extend: 'print',
                    title: '',
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div style="text-align: center; font-size: 14pt;">DSA Year level list</div>' +
                                '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                            );
                    }
                },
                {
                    extend:'colvis'
                }
            ],
        }).buttons().container().appendTo('#yearlvl_tbl_wrapper .col-md-6:eq(0)');
        
    });
</script>