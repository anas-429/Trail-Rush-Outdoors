// VARIABLES

var goldIcon = document.querySelector('.quantity-icon');

var hamburger = document.querySelector('.hamburger');
var exitMobile = document.querySelector('.exit-mobile');

var openCart = document.querySelector('.open-cart');
var exitCart = document.querySelector('.exit-cart');

const logo = document.querySelector('header img');

// EVENT LISTENERS

hamburger.addEventListener("click", function() {
    mobileMenu.style.display = "block";
})

exitMobile.addEventListener("click", function() {
    mobileMenu.style.display = "none";
})

// Shopping Cart

openCart.addEventListener("click", function(e) {
    popupCart(e);
})

exitCart.addEventListener("click", function() {
    shoppingCart.style.display = "none";
})

// Purchase Button

if(document.querySelector('.purchase-button')) {
    var purchase = document.querySelector('.purchase-button');
    purchase.addEventListener('click', purchaseItem);
}

// Category Menu

if(document.querySelector('.open-categories')) {
    var openCatagories = document.querySelector('.open-categories');
    openCatagories.addEventListener("click", function(e) {
        e.preventDefault();
        categoryMenu.style.display = "block";
    })
}

if(document.querySelector('.exit-categories')) {
    var closeCatagories = document.querySelector('.exit-categories');
    closeCatagories.addEventListener("click", function(e) {
        categoryMenu.style.display = "none";
    })
}

// Contact Form

if(document.querySelector('.exit-modal')) {
    var exitModal = document.querySelector('.exit-modal');
    var dialog = document.querySelector('.dialog');
    exitModal.addEventListener("click", function(e) {
        dialog.style.display = "none";
    })
}

// FUNCTIONS

window.onscroll = function() {resizeHeader()};

function resizeHeader() {

    if(window.pageYOffset > 0) {
        logo.style.height = "30px";
    } else {
        logo.style.height = "40px";
    }

}

resizeHeader();

function popupCart(e) {
    e.preventDefault();
    shoppingCart.style.display = "block";
}

function retrieveCartFromLS() {

    let cart;

    if(localStorage.getItem('cart') === null) {
        cart = [];
    } else {
        cart = JSON.parse(localStorage.getItem('cart'));
    }

    return cart;
    
}

function updateIcon() {

    let icon = localStorage.getItem('icon');

    if(icon) {
        document.querySelector('.quantity-icon').textContent = icon;
    } else {
        localStorage.setItem("icon", 0);
    }

}

updateIcon();

function updateTotal(price, decrease) {

    let total = localStorage.getItem("total");

    if(decrease) {
        console.log(price);
        localStorage.setItem("total", parseInt(total) - parseInt(price));
    } else if(total != null) {
        console.log(price);
        localStorage.setItem("total", parseInt(total) + parseInt(price));
    } else {
        console.log(price);
        localStorage.setItem("total", parseInt(price));
	}

    outputCart();

}

function purchaseItem(e) {

    var select = e.target.parentElement.parentElement.parentElement;

    item = {
        id: select.dataset.id,
        name: select.dataset.name,
        price: parseInt(select.dataset.price),
        subtotal: parseInt(select.dataset.price),
        image: select.dataset.image,
        quantity: 1
    }

    let cartLS = retrieveCartFromLS();
	cartLS.push(item);

    let icon = localStorage.getItem("icon");

	localStorage.setItem("cart", JSON.stringify(cartLS));
    localStorage.setItem("icon", parseInt(icon) + 1);

    document.querySelector('.quantity-icon').textContent = parseInt(icon) + 1;

    popupCart(e);
    outputCart(item);
    updateTotal(item.price);

    var button = document.getElementById(item.id);

    button.classList.add('disabled');

}

function outputCart() {

    let cartItems = localStorage.getItem('cart');
    cartItems = JSON.parse(cartItems);

    let cartLS = retrieveCartFromLS();
    
    let totalCost = localStorage.getItem("total");
    totalCost = parseInt(totalCost);

    if(cartItems) {

        items.innerHTML = '';

        Object.values(cartLS).map( (item, index) => {
        
        items.innerHTML += `
        <div class="cart-product-container" data-id="${item.id}" data-name="${item.name}" data-price="${item.price}">
        <div class="cart-product">
            <div class="cart-product-thumb"><img src="thumbnails/${item.image}" alt="${item.name}"></div>
            <div class="cart-product-info flex-center-start flex-column">
                <h4>${item.name}</h4>
                <p>$ ${item.price} CAD</p>
                <p><span class="bold">Subtotal:</span> <span class="turquoise">$ ${item.quantity * item.price} CAD</span></p>
            </div>
            <div class="cart-product-remove flex-center-start flex-column">
                <span class="remove-item red-hover margin-center pointer">&#10006</span>
            </div>
        </div>
        <div class="quantity flex-center flex-between margin-bottom">
            <p>Quantity:</p>
            <span class="quantity-control decrement navy-bg bold red-bg-hover pointer">-</span>
            <span class="amount">${item.quantity}</span>
            <span class="quantity-control increment navy-bg bold red-bg-hover pointer">+</span>
        </div>
        </div>`;

        });

        if(cartLS.length > 0) {
            tab.style.display = "block";
            tab.innerHTML = `
            <p class="bold">Total Cost: <span id="cartTotal" class="turquoise">$${totalCost} CAD</span></p>
            <input type="submit" value="Checkout" id="checkoutButton" 
            class="ebony turquoise-bg gold-bg-hover fullwidth margin-none padding button pointer">
            `;
        } else {
            items.innerHTML = `<p>There aren't any items in your cart.</p>`;
            tab.style.display = "none";
        }

        updateQuantity();
        removeItem();
    }
    
}

outputCart();

function removeItem() {

    var remove = document.querySelectorAll('.remove-item');
    
    let icon = localStorage.getItem("icon");
    let cartLS = retrieveCartFromLS();

    for(let i=0; i < remove.length; i++) {
    
        remove[i].addEventListener('click', () => {
        var id = remove[i].parentElement.parentElement.parentElement.dataset.id;

		    cartLS.forEach(function(item, index) {
                if(item.id == id) {

                    var button = document.getElementById(item.id);

                    if(button) {
                        button.classList.remove('disabled');
                    }

                    localStorage.setItem('cart', JSON.stringify(cartLS));
                    localStorage.setItem("icon", parseInt(icon) - item.quantity);

			        cartLS.splice(index, 1);

                    console.log(item);

                    updateIcon();
                    updateTotal(item.subtotal,'decrease');

                }

                localStorage.setItem('cart', JSON.stringify(cartLS));
                outputCart();
            });
            
        })

    }
    
}

function updateQuantity() {

    var decrease = document.querySelectorAll('.decrement');
    var increase = document.querySelectorAll('.increment');

    let icon = localStorage.getItem("icon");
    let cartLS = retrieveCartFromLS();

    for(let i=0; i < increase.length; i++) {

        if(cartLS[i].quantity < 10 ) {
        increase[i].addEventListener('click', () => {

            var price = cartLS[i].price;

            cartLS[i].quantity += 1;
            cartLS[i].subtotal += price;

            localStorage.setItem('cart', JSON.stringify(cartLS));
            localStorage.setItem("icon", parseInt(icon) + 1);

            document.querySelector('.quantity-icon').textContent = parseInt(icon) + 1;

            outputCart();
            updateTotal(cartLS[i].price);
            updateIcon();
        })
        }

        if(cartLS[i].quantity > 1 ) {
        decrease[i].addEventListener('click', () => {

            var price = cartLS[i].price;

            cartLS[i].quantity -= 1;
            cartLS[i].subtotal -= price;

            localStorage.setItem('cart', JSON.stringify(cartLS));
            localStorage.setItem("icon", parseInt(icon) - 1);

            document.querySelector('.quantity-icon').textContent = parseInt(icon) - 1;

            outputCart();
            updateTotal(cartLS[i].price, 'decrease');
            updateIcon();
        })
        }

    } 

}

function lockoutButtons() {
    
    let cartLS = retrieveCartFromLS();

    if(cartLS.length > 0) {
        cartLS.forEach(function(item, index) {
            if(document.getElementById(item.id)) {
                var button = document.getElementById(item.id);
                button.classList.add('disabled');
            }
        })
    }

}

lockoutButtons();