$(document).ready(function() {

    function show_all_students(page) {
        $.ajax({
            type: 'ajax',
            async: 'false',
            url: base_url + 'EtudiantsControllers/show_all_students' + '/' + page,
            method: "POST",
            async: false,
            dataType: "json",
            success: function(data) {
                // $('#pagination_link').html(data.pagination_link);
                $('#country_table').html(data.country_table)
            },
            error: function() {
                alert('une erreur s\'est produite');
                // $('#alertSuccessModal').modal('show');
                // $('#alertSuccessModal').find('.modal-title').text('NOTIFICATIONS');
                // $('#alertSuccessModal').find('.modal-body-message').text('Oups! Une erreur s\'est produite. eee');
            }
        })
    }

    show_all_students(1);

})
