<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

<script>
// Generalized function for handling the province change event
function updateAmphurList(provinceId, amphurSelectId) {
    $.ajax({
        url: "https://www.dfirstproperty.com/setlocation.php?nextList=amphures&provinceID=" + provinceId,
        type: 'GET',
        cache: false,
        success: function(response) {
            var data = JSON.parse(response);
            var len = data.length;

            // Clear the existing options and add a default option
            $(amphurSelectId).empty();
            $(amphurSelectId).append('<option value="0">ทุกอำเภอ/เขต</option>');

            // Loop through the data and populate the dropdown with options
            for (var i = 0; i < len; i++) {
                $(amphurSelectId).append('<option value="' + data[i].AMPHUR_ID + '">' + data[i].AMPHUR_NAME + '</option>');
            }
        },
        error: function(result) {
            alert(result.responseText);
        }
    });
}

// Event listeners for both province selects
$('#province-type, #province-typeM').change(function() {
    var provinceId = $(this).val();
    var amphurSelectId = $(this).attr('id') === 'province-type' ? '#amphur-type' : '#amphur-typeM';
    
    updateAmphurList(provinceId, amphurSelectId);
});
</script>
