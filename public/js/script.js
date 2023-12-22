window.onload = function () {
    const showSearch = document.querySelector('#search-show');
    const hideSearch = document.querySelector('#search-hide');
    const btns = document.querySelectorAll('.utils-btn')
    const openCart = document.querySelector('#open-cart');
    const closeCart = document.querySelector('#close-cart');
    //cart
    var minusBtns = document.querySelectorAll('.quantity-minus');
    var plusBtns = document.querySelectorAll(".quantity-plus");
    var quantityInputs = document.querySelectorAll(".quantity-input");
    //side cart
    var decreaseBtns = document.querySelectorAll('.decrease');
    var increaseBtns = document.querySelectorAll('.increase');
    var quantityInputSides = document.querySelectorAll('.quantity-input-side');
    var priceInputs = document.querySelectorAll('span.price');
    var sideSubtotal = document.querySelector('.slidecart-subtotal');

    var amounts = document.querySelectorAll('.total-amount');
    var cartSubtotal = document.querySelector('.cart-subtotal');
    var cartTotal = document.querySelector('.cart-total');

    showSearch.onclick = function () {
        document.querySelector('.search-bar').classList.add('active');
        btns.forEach(e => e.classList.add('hide'));
    }

    hideSearch.onclick = function () {
        document.querySelector('.search-bar').classList.remove('active');
        btns.forEach(e => e.classList.remove('hide'));
    }

    openCart.onclick = function () {
        document.querySelector('.cart').classList.add('active');
    }

    closeCart.onclick = function () {
        document.querySelector('.cart').classList.remove('active');
    }

    function formatCurrency(value) {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        }).format(value);
    }

    function handleQuantityChange(inputElement) {
        var currentValue = parseInt(inputElement.value);

        inputElement.value = currentValue;

        var parentElement = inputElement.closest('.item-product-quantity');

        var priceElement = parentElement.parentNode.querySelector('.item-price');
        var price = parseFloat(priceElement.textContent.replace("$", ""));
        var totalElement = parentElement.parentNode.querySelector(".total-amount");
        var total = price * currentValue;
        totalElement.innerHTML = total + " ₫";
        updateCart(inputElement);
    }

    function updateCart(inputElement) {
        var quantity = inputElement.value;
        var id = inputElement.dataset.id;
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Gửi yêu cầu cập nhật thông qua AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("PATCH", "/cart/" + id, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Xử lý kết quả trả về (nếu cần)
                    // window.location.href = cartIndexRoute;
                } else if (xhr.status === 405) {
                    // Xử lý lỗi phương thức không được phép
                    console.log("Error: Phương thức không được phép");
                } else {
                    console.log("Error: " + xhr.status);
                }
            }
        };
        xhr.send('quantity=' + quantity);
    }

    for (var i = 0; i < plusBtns.length; i++) {
        plusBtns[i].addEventListener("click", function () {
            var inputElement = this.parentNode.querySelector(".quantity-input");
            var currentValue = parseInt(inputElement.value) + 1;
            inputElement.value = currentValue;
            handleQuantityChange(inputElement);
            updateTotal()
            updateCartCount(0);
        })
    }

    for (var i = 0; i < minusBtns.length; i++) {
        minusBtns[i].addEventListener("click", function () {
            var inputElement = this.parentNode.querySelector(".quantity-input");
            var currentValue = parseInt(inputElement.value) - 1;
            if (currentValue >= 1) {
                inputElement.value = currentValue;
                handleQuantityChange(inputElement);
                updateTotal()
                updateCartCount(0);
            }
        });
    }

    for (let i = 0; i < quantityInputs.length; i++) {
        quantityInputs[i].addEventListener("input", function () {
            handleQuantityChange(this);
            updateTotal();
            updateCartCount(0);
        });
    }

    function handleQuantityChangeInSide(inputElement) {
        var currentValue = parseInt(inputElement.value);

        inputElement.value = currentValue;

        var parentElement = inputElement.parentNode.parentNode.parentNode.parentNode;

        var priceElement = parentElement.querySelector('.price-none');
        var price = parseFloat(priceElement.textContent.replace("$", ""));
        var totalElement = parentElement.querySelector('.price');
        var total = formatCurrency(price * currentValue);
        totalElement.innerHTML = total;
    }

    // Lặp qua từng nút "+" và thêm sự kiện click
    for (let i = 0; i < increaseBtns.length; i++) {
        increaseBtns[i].addEventListener("click", function () {
            var inputElement = this.parentNode.querySelector(".quantity-input-side");
            var currentValue = parseInt(inputElement.value) + 1;
            inputElement.value = currentValue;
            handleQuantityChangeInSide(inputElement);
            updateCart(inputElement);
            updateSubtotal();
            updateCartCount(1);
        });
    }

    // Lặp qua từng nút "-" và thêm sự kiện click
    for (let i = 0; i < decreaseBtns.length; i++) {
        decreaseBtns[i].addEventListener("click", function () {
            var inputElement = this.parentNode.querySelector(".quantity-input-side");
            var currentValue = parseInt(inputElement.value) - 1;
            if (currentValue >= 1) {
                inputElement.value = currentValue;
                handleQuantityChangeInSide(inputElement);
                updateCart(inputElement);
                updateSubtotal();
                updateCartCount(1);
            }
        });
    }

    // Lặp qua từng phần tử số lượng và thêm sự kiện input
    for (let i = 0; i < quantityInputSides.length; i++) {
        quantityInputSides[i].addEventListener("input", function () {
            handleQuantityChangeInSide(this);
            updateCart(this);
            updateSubtotal();
            updateCartCount(1);
        });
    }

    function updateSubtotal() {
        var total = 0;

        priceInputs.forEach(function (priceInput) {
            var priceText = priceInput.textContent.replace("VND", "").replace(",", "");
            var price = parseFloat(priceText.replace(/\s/g, ''));
            total += price;

        });

        sideSubtotal.textContent = total.toFixed(3) + " ₫";
    }

    updateSubtotal();

    function updateTotal() {
        var total = 0;
    
        amounts.forEach(function (amount) {
            var cleanedAmount = amount.textContent.replace("VND", "").replace(",", ""); 
            var price = parseFloat(cleanedAmount.replace(/\s/g, ''));
            total += parseFloat(price);
        });
    
        cartSubtotal.textContent = total.toFixed(3) + " ₫";
        cartTotal.textContent = total.toFixed(3) + " ₫";
    }

    function updateCartCount(site) {
        var totalQuantity = 0;
        if (site == 0){
            document.querySelectorAll('.quantity-input-side').forEach(function (input) {
                totalQuantity += parseInt(input.value, 10);
            });
        } else if (site == 1){
            document.querySelectorAll('.quantity-input').forEach(function (input) {
                totalQuantity += parseInt(input.value, 10);
            });
        }

        document.querySelector('.cart-count').textContent = totalQuantity;
    }

    updateCartCount(0);
    updateCartCount(1);
    const myCarouselElement = document.querySelector('#slider')
    const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 2000,
    })
}