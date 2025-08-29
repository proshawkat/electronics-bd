$(document).on('click', '#button-cart', function() {
    handleAction("cart", $(this).data("id"));
});

$(document).on('click', '.btn-extra-46', function() {
    handleAction("buy_now", $(this).data("id"));
});

$(document).on('click', '.btn-wishlist', function() {
    handleAction("wishlist", $(this).data("id"));
});

$(document).on('click', '.btn-compare', function() {
    handleAction("compare", $(this).data("id"));
});


function handleAction(type, productId) {
    console.log("Action:", type, "ProductId:", productId);

    $.ajax({
        url: baseUrl + '/action',
        type: 'POST',
        data: {
            action_type: type,
            product_id: productId,
            quantity: $("#modalContent #product-quantity").val() || 1
        },
        success: function(response) {
            alert(type + " success!");
        },
        error: function() {
            alert(type + " failed!");
        }
    });
}
