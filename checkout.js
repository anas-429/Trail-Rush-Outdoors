// VARIABLES

var finalCartIcon = document.querySelector('.final-icon');
var closeModal = document.querySelector('.exit-modal');
var dialog = document.querySelector('.dialog');

// EVENT LISTENERS

finalCartIcon.addEventListener("click", function() {
    dialog.style.display = "flex";
    dialog.style.justifyContent = "center"; 
    dialog.style.alignItems = "center";
})

closeModal.addEventListener("click", function() {
    dialog.style.display = "none";
})
// FUNCTIONS

function retrieveValues() {

    let cartLS = localStorage.getItem('cart');
    let total = localStorage.getItem('total');
    cartLS = JSON.parse(cartLS);
    total = JSON.parse(total);

    formatCart = [];

    for (const item in cartLS) {
        formatCart.push({
            [cartLS[item].name]: ' Quantity: ' + cartLS[item].quantity + ' Subtotal: $' + cartLS[item].quantity * cartLS[item].price + ' CAD'
        })
    }

    formatCart = JSON.stringify(formatCart);
    hiddenProducts.setAttribute("value", formatCart); /*APPROVED*/
    hiddenPrice.setAttribute("value", total); /*APPROVED*/

}

retrieveValues();

function finalCart() {

    let cartItems = localStorage.getItem('cart');
    cartItems = JSON.parse(cartItems);
    let total = localStorage.getItem("total");
    total = parseInt(total);

    if(cartItems && finalized) {
        finalized.innerHTML = ''; /*APPROVED*/
        Object.values(cartItems).map( (item, index) => {
            finalized.innerHTML += 
            `<div class="final-product fade-right">
                <div class="final-product-thumb">
                    <img src="thumbnails/${item.image}" alt="${item.image}">
                </div>
                <div class="final-product-info flex-center-start flex-column margins-light">
                    <h4>${item.name}</h4>
                    <p>Subtotal: $${item.quantity * item.price} CAD</p>
                    <p>Quantity: ${item.quantity}</p>
                </div>
            </div>`;
        });
        finalizedTotal.innerHTML = `$${total} CAD`;
    }

}

finalCart();


