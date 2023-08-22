<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Promocode Apply Project In PHP</title>
</head>
<body>
    <h1 style="text-align: center;">Movie Hall</h1>
    <h3 style="text-align: center;">Billing Information</h3>
    <div class="container">
        <div class="form-group">
            <label for="email">Total Price:</label>
            <input type="text" class="form-control" id="total_price" name="total_price" value="1000.00">
        </div>
        <div class="form-group">
            <label for="promo_code">Apply Promocode:</label>
            <input type="text" class="form-control" id="coupon_code" placeholder="Apply Promocode" name="coupon_code">
            <span id="message" style="color: green;"></span>
        </div>
        <button id="apply" class="btn btn-default">Apply</button>
        <button id="edit" class="btn btn-default" style="display: none;">Edit</button>
    </div>
    <script>
    
    $('#apply').click(function() {
        $.ajax({
            type: "POST",
            url: "process.php",
            data: { coupon_code: $('#coupon_code').val() },
            success: function(dataResult) {
                var dataResultJSON = JSON.parse(dataResult);
                if (dataResultJSON.statusCode == 200) {
                    var after_apply = parseFloat($('#total_price').val()) - dataResultJSON.value;
                    $('#total_price').val(after_apply);
                    $('#apply').hide();
                    $('#edit').show();
                    $('#message').html("Promocode applied successfully!");
                } else if (dataResultJSON.statusCode == 201) {
                    $('#message').html("Invalid promocode!");
                } else {
                    $('#message').html("Promocode cannot be blank. Enter a valid promocode.");
                }
            }
        });
    });

    $('#edit').click(function() {
        $('#coupon_code').val('');
        $('#edit').hide();
        location.reload();
    });

    </script>

</body>
</html>
