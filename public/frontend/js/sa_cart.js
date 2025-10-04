var baseUrl = "{{ rtrim(url('/'), '/') }}";

$(document).ready(function() {
    updateCartDropdown();
});

function addToCart(productId, source = null) {
    handleAction("cart", productId, source);
}

function buyNowClicked(productId, source = null) {
    handleAction("buy_now", productId, source);
}

function addTowishlist(productId, source = null) {
    handleAction("wishlist", productId, source);
}

function addCompareList(productId, source = null) {
    handleAction("compare", productId, source);
}


function handleAction(click_type, productId, source_type=null) {
    console.log("Action:", source_type, "ProductId:", productId, 'Qty: ', $(".model-content #product-quantity-"+productId).val());
    let cart_quantity = 1
    
    if(source_type == 'modal'){
        cart_quantity = $("#modalContent #product-quantity-"+productId).val()
    }else if(source_type == null){
        cart_quantity = $(".model-content #product-quantity-"+productId).val()
    }

    $.ajax({
        url: baseUrl +'/action',
        type: 'POST',
        data: {
            action_type: click_type,
            product_id: productId,
            quantity: cart_quantity
        },
        success: function(response) {
            console.log('success', response)
            if (response.status == 'success') {
                console.log('success type: ', click_type)
                if(click_type === 'buy_now'){
                    console.log("Redirecting to checkout...");
                    window.location.href = baseUrl + '/cart/checkout';
                    return;
                }

                showNotification(response.product, click_type);
                updateCartDropdown();

                if(window.location.pathname.includes('/cart/view') && click_type == 'cart') {
                    window.location.href = baseUrl + '/cart/view';
                }
                
            }
        },
        error: function() {
            alert(click_type + " failed!");
        }
    });
}

function updateCartDropdown() {
    console.log('cart dowon');

    $.get(baseUrl+'/cart/items', function(res){
        $('#cart-total').text(res.totalQty + ' item(s) - ' + res.totalPrice + '৳');
        $('#cart-items').text(res.totalQty);

        let html = '';
        if(res.items.length>0){
            $('.cart-empty-ul').hide();
            $(".cart-full-ul").show();
            res.items.forEach(item=>{
                html += `<tr>
                    <td class="text-center td-image">
                        <a href="${item.url}"><img src="${item.image}" alt="${item.name}" width="50" /></a>
                    </td>
                    <td class="text-left td-name">
                        <a href="${item.url}">${item.name}</a>
                    </td>
                    <td class="text-right td-qty">x ${item.qty}</td>
                    <td class="text-right td-total">${item.subtotal}৳</td>
                    <td class="text-center td-remove">
                        <button type="button" onclick="removeFromCart(${item.id})" class="cart-remove"><i class="fa fa-times-circle"></i></button>
                    </td>
                </tr>`;
            });
        } else {
            $('.cart-empty-ul').show();
            $(".cart-full-ul").hide();
        }

        $('.cart-products .table tbody').html(html);
        $('.cart-totals .td-total-text').eq(0).text(res.totalPrice+'৳');
        $('.cart-totals .td-total-text').eq(1).text(res.totalPrice+'৳');
    });
}


function removeFromCart(productId) {
    $.post(baseUrl + '/cart/remove', { product_id: productId }, function(res) {
        if(res.status == 'success'){
            if(window.location.pathname.includes('/cart/view')) {
                window.location.href = baseUrl + '/cart/view';
            }
            updateCartDropdown();
        }
    });
}

function showNotification(product, type) {
    let viewUrl = '';
    let checkoutUrl = '';

    if(type == 'cart') {
        viewUrl = baseUrl+'/cart/view';
        checkoutUrl = baseUrl+'/cart/checkout';
    } else if(type === 'wishlist') {
        viewUrl = baseUrl+'/wishlist';
        checkoutUrl = '#';
    } else if(type === 'compare') {
        viewUrl = baseUrl+'/compare';
        checkoutUrl = '#';
    }
    
    let html = `
    <div class="notification-wrapper notification-wrapper-tr">
        <div class="notification notification-cart">
            <button class="btn notification-close"></button>
            <div class="notification-content">
                <div class="row">
                    <div class="col-sm-3">
                        <img class="img-responsive" src="${baseUrl+'/'+product.image}" />
                    </div>
                    <div class="col-sm-9">
                        <div class="notification-title">${product.name}</div>
                        <div class="notification-text">
                            Success: You have added  <br/>
                            <a href="${product.url}">${product.name}</a> 
                            <br/> to your <a href="${viewUrl}">${type}</a>!
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification-buttons">
                <a class="btn btn-cart notification-view-cart" href="${window.Laravel.cartViewUrl}">View Cart</a>
                    <a class="btn btn-success notification-checkout" href="${window.Laravel.cartCheckoutUrl}">Checkout</a>
            </div>
        </div>
    </div>`;

    $(".notification-wrapper").remove();

    $("body").append(html);

    $(".notification-close").on("click", function() {
        $(this).closest(".notification-wrapper").fadeOut(300, function() { $(this).remove(); });
    });

    if(type === 'cart') {
        $(".notification-buttons").show();
    } else {
        $(".notification-buttons").hide();
    }

    setTimeout(function() {
        $(".notification-wrapper").fadeOut(300, function() { $(this).remove(); });
    }, 3000);
}

$(document).on("click", ".mobile-wrapper-header .x", function() {
    $("html").removeClass("mobile-cart-content-container-open mobile-overlay mobile-main-menu-container-open");
});