<script>

    $(function (){
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleDateString('en-GB', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    
        $("#weeklyViolation_tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Weekly Violation Report ' + formattedDate
                },
                {
                    extend: 'csvHtml5',
                    title: 'Weekly Violation Report ' + formattedDate
                },
                {
                    extend: 'pdfHtml5',
                    title: 'Weekly Violation Report ' + formattedDate,
                    pageSize: 'A4',
                    orientation: 'landscape',
                    customize: function (doc) {
                        // Add custom header
                        doc.content.splice(0, 1, {
                            text: [
                                { text: 'Weekly Violation Report\n', fontSize: 12, bold: true, alignment: 'center' },
                                { text: 'System Generated Report\n\n', fontSize: 11, alignment: 'center' },
                                { text: 'Generated Date: ' + formattedDate, fontSize: 9, alignment: 'center' }
                            ],
                            margin: [0, 0, 0, 12]
                        });

                        // Adjust table layout
                        var tableBody = doc.content[1].table.body;
                        var totalColumns = tableBody[0].length;

                        // Reduce table font size and allow text wrapping
                        doc.styles.tableBodyEven.fontSize = 8;
                        doc.styles.tableBodyOdd.fontSize = 8;
                        doc.styles.tableHeader.fontSize = 9;
                        doc.content[1].table.body.forEach(function (row) {
                            row.forEach(function (cell) {
                                cell.alignment = 'center'; // Center-align text
                                cell.noWrap = false; // Allow text wrapping
                            });
                        });
                    }
                },
                {
                    extend: 'print',
                    title: '',
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div style="text-align: center; font-size: 14pt;">Weekly Violation Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                            );
                    }
                },
                {
                    extend:'colvis'
                }
            ],
        }).buttons().container().appendTo('#weeklyViolation_tbl_wrapper .col-md-6:eq(0)');
        
    });
</script>