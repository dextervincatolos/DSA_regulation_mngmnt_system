
<script>

    $(function () {
        var currentDate = new Date();
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var formattedDate = currentDate.toLocaleDateString('en-US', options);
        
        $("#acads_tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'DSA Academic year report ' + formattedDate
                },
                {
                    extend: 'csvHtml5',
                    title: 'DSA Academic year report ' + formattedDate
                },
                {
                    extend: 'pdfHtml5',
                    title: 'DSA Academic year report ' + formattedDate,
                    customize: function (doc) {
                        doc.content.splice(0, 1, {
                            text: [
                                { text: 'DSA Academic year report\n', fontSize: 14, bold: true,alignment: 'center'},
                                { text: 'System Generated Report\n\n', fontSize: 12,alignment: 'center' },
                                { text: 'Generated Date: ' + formattedDate, fontSize: 9,alignment: 'center' }
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
                    customize: function (win) {
                        $(win.document.body)
                            .css('font-size', '10pt')
                            .prepend(
                                '<div style="text-align: center; font-size: 14pt;">DSA Academic year report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                            );
                    }
                },
                {
                    extend:'colvis'
                }
            ],
        }).buttons().container().appendTo('#acads_tbl_wrapper .col-md-6:eq(0)');
        
    });


</script>