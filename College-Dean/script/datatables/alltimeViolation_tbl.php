<script>

    $(function (){
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleDateString('en-GB', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    
        $("#alltimeViolation_tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'All-time Violation Report ' + formattedDate,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                },
                {
                    extend: 'csvHtml5',
                    title: 'All-time Violation Report ' + formattedDate,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                },
                {
                    extend: 'pdfHtml5',
                    title: 'All-time Violation Report ' + formattedDate,
                    pageSize: 'A4',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                    customize: function (doc) {
                        // Add custom header
                        doc.content.splice(0, 1, {
                            text: [
                                { text: 'Violations Report\n', fontSize: 12, bold: true, alignment: 'center' },
                                { text: 'System Generated Report\n\n', fontSize: 11, alignment: 'center' },
                                { text: 'Generated Date: ' + formattedDate, fontSize: 9, alignment: 'center' }
                            ],
                            margin: [0, 0, 0, 12]
                        });

                        // Center the table horizontally
                        doc.content[1].table.widths = Array(doc.content[1].table.body[0].length).fill('*'); // Equal column widths
                        doc.content[1].alignment = 'center'; // Center the table

                      
                    }
                },
                {
                    extend: 'print',
                    title: '',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div style="text-align: center; font-size: 14pt;">All-time Violation Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                            );
                    }
                },
                {
                    extend:'colvis'
                }
            ],
        }).buttons().container().appendTo('#alltimeViolation_tbl_wrapper .col-md-6:eq(0)');
        
    });
</script>