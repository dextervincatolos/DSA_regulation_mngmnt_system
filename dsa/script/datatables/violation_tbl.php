
<script>

    $(function (){
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleDateString('en-GB', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        $("#violation_tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'DSA Student violations report ' + formattedDate
                },
                {
                    extend: 'csvHtml5',
                    title: 'DSA Student violations report ' + formattedDate
                },
                {
                    extend: 'pdfHtml5',
                    title: 'DSA Student violations report ' + formattedDate,
                    customize: function (doc) {
                        doc.content.splice(0, 1, {
                            text: [
                                { text: 'DSA Student violations report\n', fontSize: 14, bold: true,alignment: 'center'},
                                { text: 'System Generated Report\n\n', fontSize: 12,alignment: 'center' },
                                { text: 'Generated Date: ' + formattedDate, fontSize: 9,alignment: 'center' }
                            ],
                            margin: [0, 0, 0, 12]
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
                                '<div style="text-align: center; font-size: 14pt;">DSA Student violations report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">System Generated Report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDate + '</div><br>'
                            );
                    }
                },
                {
                    extend:'colvis'
                }
            ],
        }).buttons().container().appendTo('#violation_tbl_wrapper .col-md-6:eq(0)');
        
    });
</script>