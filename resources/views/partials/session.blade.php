@if (session()->has('success'))
    {{-- <div class="alert alert-success">
        <li>{{ session()->get('success') }}</li>
    </div> --}}
    <script type="text/javascript">
        const cartElement = document.querySelector('.cart');
        cartElement.classList.add('active');
    </script>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        <li>{{ session()->get('error') }}</li>
    </div>
@endif
