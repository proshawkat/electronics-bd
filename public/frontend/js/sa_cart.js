var baseUrl = "{{ rtrim(url('/'), '/') }}";

$(document).ready(function () {
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


function handleAction(click_type, productId, source_type = null) {
    console.log("Action:", source_type, "ProductId:", productId);
    let cart_quantity = 1;

    let inputSelector = "#product-quantity-" + productId;
    let inputEl = null;

    if ($("#quickViewModal").is(":visible") && $("#quickViewModal " + inputSelector).length) {
        inputEl = $("#quickViewModal " + inputSelector);
    } else {
        inputEl = $(inputSelector);
    }

    if (inputEl && inputEl.length) {
        cart_quantity = parseInt(inputEl.val()) || 1;
    }

    $.ajax({
        url: baseUrl + '/action',
        type: 'POST',
        data: {
            action_type: click_type,
            product_id: productId,
            quantity: cart_quantity
        },
        success: function (response) {
            console.log('success', response)
            if (response.status == 'success') {
                console.log('success type: ', click_type)
                if (click_type === 'buy_now') {
                    console.log("Redirecting to checkout...");
                    window.location.href = baseUrl + '/cart/checkout';
                    return;
                }

                showNotification(response.product, click_type);
                updateCartDropdown();

                if (window.location.pathname.includes('/cart/view') && click_type == 'cart') {
                    window.location.href = baseUrl + '/cart/view';
                }

            } else {
                if (response.is_cod_error) {
                    showCodWarning(response.message);
                } else {
                    alert(response.message);
                }
            }
        },
        error: function () {
            alert(click_type + " failed!");
        }
    });
}

function showCodWarning(message) {
    var html = `
    <div class="notification-wrapper notification-wrapper-tr" id="cod-warning-notification" style="z-index: 99999;">
        <div class="notification notification-cart" style="border-left: 4px solid #e74c3c;">
            <button class="btn notification-close" onclick="this.closest('.notification-wrapper').remove()"></button>
            <div class="notification-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="notification-title" style="color: #e74c3c; display: flex; align-items: center; gap: 6px;">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16" fill="currentColor"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                            Cash on Delivery Unavailable
                        </div>
                        <div class="notification-text" style="margin-top: 8px;">
                            ${message}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

    $("#cod-warning-notification").remove();
    $("body").append(html);

    setTimeout(function () {
        $("#cod-warning-notification").fadeOut(300, function () { $(this).remove(); });
    }, 8000);
}

function updateCartDropdown() {
    console.log('cart dowon');

    $.get(baseUrl + '/cart/items', function (res) {
        let formattedTotalPrice = parseFloat(res.totalPrice).toFixed(2);
        $('#cart-total').text(res.totalQty + ' item(s) - ' + formattedTotalPrice + '৳');
        $('#cart-items').text(res.totalQty);

        let html = '';
        if (res.items.length > 0) {
            $('.cart-empty-ul').hide();
            $(".cart-full-ul").show();
            res.items.forEach(item => {
                let formattedSubtotal = parseFloat(item.subtotal).toFixed(2);
                html += `<tr>
                    <td class="text-center td-image">
                        <a href="${item.url}"><img src="${item.image}" alt="${item.name}" width="50" /></a>
                    </td>
                    <td class="text-left td-name">
                        <a href="${item.url}">${item.name}</a>
                    </td>
                    <td class="text-right td-qty">x ${item.qty}</td>
                    <td class="text-right td-total">${formattedSubtotal}৳</td>
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
        $('.cart-totals .td-total-text').eq(0).text(formattedTotalPrice + '৳');
        $('.cart-totals .td-total-text').eq(1).text(formattedTotalPrice + '৳');
    });
}


function removeFromCart(productId) {
    $.post(baseUrl + '/cart/remove', { product_id: productId }, function (res) {
        if (res.status == 'success') {
            if (window.location.pathname.includes('/cart/view')) {
                window.location.href = baseUrl + '/cart/view';
            }
            updateCartDropdown();
        }
    });
}

function showNotification(product, type) {
    let viewUrl = '';
    let checkoutUrl = '';

    if (type == 'cart') {
        viewUrl = baseUrl + '/cart/view';
        checkoutUrl = baseUrl + '/cart/checkout';
    } else if (type === 'wishlist') {
        viewUrl = baseUrl + '/wishlist';
        checkoutUrl = '#';
    } else if (type === 'compare') {
        viewUrl = baseUrl + '/compare';
        checkoutUrl = '#';
    }

    let html = `
    <div class="notification-wrapper notification-wrapper-tr">
        <div class="notification notification-cart">
            <button class="btn notification-close"></button>
            <div class="notification-content">
                <div class="row">
                    <div class="col-sm-3">
                        <img class="img-responsive" src="${baseUrl + '/' + product.image}" />
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

    $(".notification-wrapper").not("#cod-warning-notification").remove();

    $("body").append(html);

    $(".notification-close").on("click", function () {
        $(this).closest(".notification-wrapper").fadeOut(300, function () { $(this).remove(); });
    });

    if (type === 'cart') {
        $(".notification-buttons").show();
    } else {
        $(".notification-buttons").hide();
    }

    setTimeout(function () {
        $(".notification-wrapper").fadeOut(300, function () { $(this).remove(); });
    }, 30000000);
}

$(document).on("click", ".mobile-wrapper-header .x", function () {
    $("html").removeClass("mobile-cart-content-container-open mobile-overlay mobile-main-menu-container-open");
});