$(document).ready(function() {
    $('#facilityInput').on('input', function() {
        var query = $(this).val().trim().toLowerCase();

        $.ajax({
            url: '/facilities',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                var filteredFacilities = response.filter(function(facility) {
                    return facility.name.toLowerCase().startsWith(query);
                });

                var options = '';
                filteredFacilities.forEach(function(facility) {
                    options += '<option value="' + facility.id + '">' + facility.name + '</option>';
                });

                $('#facilitySelect').html(options);
            }
        });
    });
});