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

    function handleQuantityChange(inputElement) {
        var currentValue = parseInt(inputElement.value);

        // Cập nhật giá trị số lượng trong input
        inputElement.value = currentValue;

        // Lấy phần tử cha của inputElement
        var parentElement = inputElement.closest('.item-product-quantity');

        // Tính toán và cập nhật tổng
        var priceElement = parentElement.parentNode.querySelector('.item-price');
        var price = parseFloat(priceElement.textContent.replace("$", ""));
        var totalElement = parentElement.parentNode.querySelector(".total-amount");
        var total = price * currentValue;
        totalElement.innerHTML = "$" + total.toFixed(2);

        updateCart(inputElement);
    }

    function updateCart(inputElement) {
        var quantity = inputElement.value;
        var id = inputElement.dataset.id;
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        console.log(quantity, id);
        console.log(csrfToken);

        // Gửi yêu cầu cập nhật thông qua AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("PATCH", "/cart/" + id, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Xử lý kết quả trả về (nếu cần)
                    console.log(xhr.responseText);
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
            console.log("handlePlusClick");
            var inputElement = this.parentNode.querySelector(".quantity-input");
            var currentValue = parseInt(inputElement.value) + 1;
            inputElement.value = currentValue;
            handleQuantityChange(inputElement);
        })
    }

    for (var i = 0; i < minusBtns.length; i++) {
        minusBtns[i].addEventListener("click", function () {
            var inputElement = this.parentNode.querySelector(".quantity-input");
            var currentValue = parseInt(inputElement.value) - 1;
            if (currentValue >= 1) {
                inputElement.value = currentValue;
                handleQuantityChange(inputElement);
            }
        });
    }

    function handleQuantityChangeInSide(inputElement) {
        var currentValue = parseInt(inputElement.value);

        // Cập nhật giá trị số lượng trong input
        inputElement.value = currentValue;

        // Lấy phần tử cha của inputElement
        var parentElement = inputElement.parentNode.parentNode.parentNode.parentNode;
        console.log(parentElement);

        // Tính toán và cập nhật tổng
        var priceElement = parentElement.querySelector('.price-none');
        var price = parseFloat(priceElement.textContent.replace("$", ""));
        var totalElement = parentElement.querySelector('.price');
        var total = price * currentValue;
        totalElement.innerHTML = "$" + total.toFixed(2);
    }

    // Lặp qua từng nút "+" và thêm sự kiện click
    for (let i = 0; i < increaseBtns.length; i++) {
        increaseBtns[i].addEventListener("click", function () {
            console.log('click +');
            var inputElement = this.parentNode.querySelector(".quantity-input-side");
            var currentValue = parseInt(inputElement.value) + 1;
            inputElement.value = currentValue;
            console.log(inputElement);
            handleQuantityChangeInSide(inputElement);
            updateCart(inputElement);
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
            }
        });
    }

    // Lặp qua từng phần tử số lượng và thêm sự kiện input
    for (let i = 0; i < quantityInputSides.length; i++) {
        quantityInputSides[i].addEventListener("input", function () {
            handleQuantityChangeInSide(this);
        });
    }

    console.log(priceInputs)
    for (let i = 0; i < priceInputs.lenght; i++) {
    
    }
    const myCarouselElement = document.querySelector('#slider')
    const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 2000,
    })
}