$(document).ready(function () {

    $('form').submit(function (event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            success: function (response) {
                $('#result').html(response);
            },
            error: function (xhr) {
                // Handle any errors
            }
        });
    });

    $(function() {
        var start = moment().subtract(0, 'days');
        var end = moment();
    
        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#start_date').val(start.format('MM-DD-YYYY'));
            $('#date_today').text(start.format('MM-DD-YYYY'));
            $('#end_date').val(end.format('MM-DD-YYYY'));

            $('form').submit();
        }
    
        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                '11-25 of the Month': [moment().date(11), moment().date(25)],
                '26-10 of the Month': get26To10Range()
            }
        }, cb);
    
        cb(start, end);
    });

    function get26To10Range() {
        var today = moment();
        var start, end;
    
        if (today.date() >= 26) {
            start = today.clone().date(26);
            end = today.clone().add(1, 'month').date(10);
        } else {
            start = today.clone().subtract(1, 'month').date(26);
            end = today.clone().date(10);
        }
    
        return [start, end];
    }
});