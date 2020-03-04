var removeCartItemButtons = document.getElementsByClassName("btn-danger");
console.log(removeCartItemButtons);

for (var i = 0; i < removeCartItemButtons.length; i++) {
    var button = removeCartItemButtons[i];
    button.addEventListener('click', removerCartItem);
}

var quantityInputs = document.getElementsByClassName('cart-quantity-input');
for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i];
    input.addEventListener('change', quantityChanged);

}

var addToCartButtons = document.getElementsByClassName('shop-item-button');
for (var i = 0; i < addToCartButtons.length; i++) {
    var button = addToCartButtons[i];
    button.addEventListener('click', addToCartClicked);
}

document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked);

function purchaseClicked() {
    createInput();
    while (cartItems.hasChildNodes()) {
        cartItems.removeChild(cartItems.firstChild);
    }
    updateCartTotal();
}

function createInput() {
    var createHiddenVals = document.getElementById('placeHidden');
    var cartItemsContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemsContainer.getElementsByClassName('cart-row');
    var counterVal = document.forms['myform']['counter'];
    counterVal.value = cartRows.length;

    for (var i = 0; i < cartRows.length; i++) {
        var inputSerialNumber = document.createElement("input");
        var inputCountPurchase = document.createElement("input");
        //        get the row information
        var cartRow = cartRows[i];
        //        find the quantity each row
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
        var quantity = quantityElement.value;

        //        find the serial number of the item
        var serialNumberElement = cartRow.getElementsByClassName('cart-serialNumber')[0];
        var serial = serialNumberElement.value;


        //        serial number
        inputSerialNumber.type = "hidden";
        inputSerialNumber.name = "serial_number[" + i+  "]";
        inputSerialNumber.value = serial;

        //        count purchase
        inputCountPurchase.type = "hidden";
        inputCountPurchase.name = "count_purchase[" + i + "]";
        inputCountPurchase.value = quantity;

        //        create the hidden input into the html        
        createHiddenVals.appendChild(inputSerialNumber);
        createHiddenVals.appendChild(inputCountPurchase);
    }

}

function removerCartItem(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    updateCartTotal();

}

function quantityChanged(event) {
    var input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1;
    }
    updateCartTotal();
}


function addToCartClicked(event) {
    var button = event.target;
    var shopItem = button.parentElement.parentElement;
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText;
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText;
    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src;
    var serialNumber = shopItem.getElementsByClassName('shop-item-serialNumber')[0].innerHTML;
    addItemToCart(title, price, imageSrc, serialNumber);
    updateCartTotal();
}

function addItemToCart(title, price, imageSrc, serialNumber) {
    var cartRow = document.createElement('div');
    cartRow.classList.add('cart-row');
    var cartItems = document.getElementsByClassName('cart-items')[0];
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title');
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert("This item are already added to the cart");
            return;
        }
    }

    var cartRowContents = `                 
    <div class="cart-item cart-column">
            <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
            <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column">${price}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" value="1">
        <button class="btn btn-danger" type="button">REMOVE</button>
    <input type="hidden" value="${serialNumber}" class="cart-serialNumber cart-column">

    </div> `;
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removerCartItem);
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged);
}


function updateCartTotal() {
    var cartItemsContainer = document.getElementsByClassName('cart-items')[0];
    var cartRows = cartItemsContainer.getElementsByClassName('cart-row');
    var total = 0;
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i];
        var priceElement = cartRow.getElementsByClassName('cart-price')[0];
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
        var price = parseFloat(priceElement.innerText.replace('$', ''));
        var quantity = quantityElement.value;
        total += (price * quantity);
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName('cart-total-price')[0].innerHTML = "$" + total;


}