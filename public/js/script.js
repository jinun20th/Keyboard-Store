window.onload = function () {
    const showSearch = document.querySelector('#search-show');
    const hideSearch = document.querySelector('#search-hide');
    const btns = document.querySelectorAll('.utils-btn')

    showSearch.onclick = function () {
        document.querySelector('.search-bar').classList.add('active');
        btns.forEach(e => e.classList.add('hide'));
    }

    hideSearch.onclick = function () {
        document.querySelector('.search-bar').classList.remove('active');
        btns.forEach(e => e.classList.remove('hide'));
    }

    const openCart = document.querySelector('#open-cart');
    const closeCart = document.querySelector('.close-cart');

    openCart.onclick = function () {
        document.querySelector('.cart').classList.add('active');
    }

    closeCart.onclick = function () {
        document.querySelector('.cart').classList.remove('active');
    }


    var addToCartButton = document.querySelector('.custom-border-n');

    // Gắn sự kiện click cho nút "Add to Cart"
    addToCartButton.addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của nút submit

        var form = event.target.closest('form');
        var formData = new FormData(form);

        // Lấy giá trị từ các trường input
        const id = document.querySelector('input[name="id"]').value;
        const name = document.querySelector('input[name="name"]').value;
        const price = document.querySelector('input[name="price"]').value;

        // // Tạo một đối tượng FormData
        // const formData = new FormData();
        formData.append('id', id);
        formData.append('name', name);
        formData.append('price', price);

        // Tạo một đối tượng XMLHttpRequest
        const request = new XMLHttpRequest();
        const cartStoreRoute = document.getElementById('cartStoreRoute').dataset.route;
        console.log(cartStoreRoute);
        request.open('POST', cartStoreRoute);
        request.setRequestHeader('X-CSRF-TOKEN', formData.get('_token'));

        request.addEventListener('load', function () {
            if (request.status === 200) {
                location.reload();
                // Xử lý khi yêu cầu thành công
                console.log('Item added to the cart');
                const cartElement = document.querySelector('.cart');
                cartElement.classList.add('active');
            } else {
                // Xử lý khi yêu cầu thất bại
                console.error('Failed to add item to the cart');
                // Thêm logic xử lý khi thêm vào giỏ hàng thất bại
            }
        });

        request.onerror = function () {
            // Xử lý khi có lỗi kết nối
            console.error('Connection error');
            // Thêm logic xử lý khi có lỗi kết nối
        };

        // Gửi yêu cầu
        request.send(formData);
    });


    const quantityInputs = document.querySelectorAll('.quantity');

    // Lặp qua từng phần tử input và gắn sự kiện cho nút cộng và nút trừ
    quantityInputs.forEach(function (input) {
        const minusBtn = input.parentElement.querySelector('.quantity-minus');
        const plusBtn = input.parentElement.querySelector('.quantity-plus');

        minusBtn.addEventListener('click', function () {
            updateQuantity(input, -1); // Giảm giá trị số lượng đi 1
        });

        plusBtn.addEventListener('click', function () {
            updateQuantity(input, 1); // Tăng giá trị số lượng lên 1
        });
    });
}
// const myCarouselElement = document.querySelector('#slider')
// const carousel = new bootstrap.Carousel(myCarouselElement, {
//     interval: 2000,
// })

// var prevScrollpos = window.pageYOffset;
// window.onscroll = function() {
//   var currentScrollPos = window.pageYOffset;
//   if (prevScrollpos > currentScrollPos) {
//     document.getElementById("navbar").style.top = "0";
//   } else {
//     document.getElementById("navbar").style.top = "-50px";
//   }
//   prevScrollpos = currentScrollPos;
// }