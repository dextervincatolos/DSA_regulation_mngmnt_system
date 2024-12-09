<script>
    $(function () {
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleDateString('en-GB', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        $("#student_tbl").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'DSA Student Record ' + formattedDate,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: 'DSA Student Record ' + formattedDate,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'DSA Student Record ' + formattedDate,
                    pageSize: 'A4',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                    customize: function (doc) {
                        // Add custom header
                        doc.content.splice(0, 1, {
                            text: [
                                { text: 'DSA Student Record\n', fontSize: 14, bold: true, alignment: 'center' },
                                { text: 'System Generated Report\n\n', fontSize: 12, alignment: 'center' },
                                { text: 'Generated Date: ' + formattedDate, fontSize: 9, alignment: 'center' }
                            ],
                            margin: [0, 0, 0, 12]
                        });

                        // Adjust table layout
                        var tableBody = doc.content[1].table.body;
                        var totalColumns = tableBody[0].length;

                        // Set specific widths for each column
                        doc.content[1].table.widths = [
                            '5%', // ID
                            '15%', // Student Name
                            '15%', // Department
                            '15%', // Course
                            '10%', // Gender
                            '15%', // Contact
                            '15%',
                            '10%'  // Email
                        ];

                        // Reduce table font size and allow text wrapping
                        doc.styles.tableBodyEven.fontSize = 7;
                        doc.styles.tableBodyOdd.fontSize = 7;
                        doc.styles.tableHeader.fontSize = 9;
                        doc.content[1].table.body.forEach(function (row) {
                            row.forEach(function (cell) {
                                cell.alignment = 'center'; // Center-align text
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
                                '<div style="text-align: center; font-size: 14pt;">DSA Student Record</div>' +
                                '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                            );
                    }
                },
                {
                    extend: 'colvis'
                }
            ],
        }).buttons().container().appendTo('#student_tbl_wrapper .col-md-6:eq(0)');
    });
</script>
