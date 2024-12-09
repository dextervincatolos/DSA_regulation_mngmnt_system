
<script>

    $(function (){
        
        var uname = "<?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>"; // Safely escape the name
        var currentDate = new Date();
        // Format the date as "January 1, 2024"
        var options = { year: 'numeric', month: 'long', day: 'numeric' };
        var formattedDate = currentDate.toLocaleDateString('en-US', options);

        // Format the time as "3:15 PM"
        var formattedTime = currentDate.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });

        // Combine date and time
        var formattedDateTime = formattedDate + ', ' + formattedTime;
        
        $("#violation_tbl").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'DSA Student violations report ' + formattedDateTime,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    }
                },
                {
                    extend: 'csvHtml5',
                    title: 'DSA Student violations report ' + formattedDateTime,
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'DSA Student violations report ' + formattedDateTime,
                    pageSize: 'A4',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: ':not(:last-child)' // Exclude the last column
                    },
                    customize: function (doc) {
                        doc.content.splice(0, 1, {
                            text: [
                                { text: 'DSA Student violations report\n', fontSize: 14, bold: true,alignment: 'center'},
                                { text: 'System Generated Report\n\n', fontSize: 12,alignment: 'center' },
                                { text: 'Generated Date: ' + formattedDateTime, fontSize: 9,alignment: 'center' }
                            ],
                            margin: [0, 0, 0, 12]
                        });
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
                                '<div style="text-align: center; font-size: 14pt;">DSA Student violations report</div>' +
                                '<div style="text-align: center; font-size: 12pt;">Printed by: ' + uname + ' </div>' +
                                '<div style="text-align: center; font-size: 12pt;">Date: ' + formattedDateTime + '</div><br>'
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