
<script>
    $(function () {
        var currentDate = new Date();
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var formattedDate = currentDate.toLocaleDateString('en-US', options);
        
        $("#course_tbl").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'DSA courses report ' + formattedDate,
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column
                },
            },
            {
                extend: 'csvHtml5',
                title: 'DSA courses report ' + formattedDate,
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column
                },
            },
            {
                extend: 'pdfHtml5',
                title: 'DSA courses report ' + formattedDate,
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column
                },
                customize: function (doc) {
                    doc.content.splice(0, 1, {
                        text: [
                            { text: 'DSA courses report\n', fontSize: 14, bold: true,alignment: 'center'},
                            { text: 'System Generated Report\n\n', fontSize: 12,alignment: 'center' },
                            { text: 'Generated Date: ' + formattedDate, fontSize: 9,alignment: 'center' }
                        ],
                        margin: [0, 0, 0, 12]
                    });
                     // Adjust table layout
                     var tableBody = doc.content[1].table.body;
                        var totalColumns = tableBody[0].length;

                        // Set specific widths for each column
                        doc.content[1].table.widths = [
                            '15%', // ID
                            '35%', // Student Name
                            '50%',
                        ];

                       
                        doc.content[1].table.body.forEach(function (row) {
                            row.forEach(function (cell) {
                                cell.alignment = 'left'; // Center-align text
                                cell.noWrap = false; // Allow text wrapping
                            });
                        });

                        // Adjust table alignment and margins
                        doc.content[1].margin = [10, 0, 10, 0];
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
                            '<div style="text-align: center; font-size: 14pt;">DSA courses report</div>' +
                            '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                            '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                        );
                }
            },
            {
                extend:'colvis'
            }
        ],
        }).buttons().container().appendTo('#course_tbl_wrapper .col-md-6:eq(0)');
        
    });
</script>