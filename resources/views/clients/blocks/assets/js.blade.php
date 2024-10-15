{{-- <script>
    window.variants = @json($products->variants ?? []);
    window.baseUrl = "{{ Storage::url('') }}";

    document.addEventListener('DOMContentLoaded', () => {
        const variants = window.variants ?? [];
        const baseUrl = window.baseUrl ?? '';

        console.log('Variants:', variants);

        let selectedColor = null;
        let selectedSize = null;

        function selectVariant(button, type) {
            if (type === 'color') {
                selectedColor = button.getAttribute('data-color');
                highlightSelectedButton('color-options', button);
                filterSizeOptions();
                
                // Cập nhật dấu tích cho màu
                updateCheckmarks('color-options', button);
            } else if (type === 'size') {
                selectedSize = button.getAttribute('data-size');
                highlightSelectedButton('size-options', button);
                
                // Cập nhật dấu tích cho kích thước
                updateCheckmarks('size-options', button);
            }

            updateDisplayedPriceAndImage();
        }

        function highlightSelectedButton(containerId, selectedButton) {
            const buttons = document.querySelectorAll(`#${containerId} button`);
            buttons.forEach(button => {
                button.classList.remove('active');
            });
            if (selectedButton) {
                selectedButton.classList.add('active');
            }
        }

        function updateCheckmarks(containerId, selectedButton) {
            const buttons = document.querySelectorAll(`#${containerId} button`);
            buttons.forEach(button => {
                const checkmark = button.querySelector('.checkmark');
                if (button === selectedButton) {
                    checkmark.style.display = 'inline'; // Hiển thị dấu tích
                } else {
                    checkmark.style.display = 'none'; // Ẩn dấu tích
                }
            });
        }

        function filterSizeOptions() {
            const sizeButtons = document.querySelectorAll('#size-options button');
            sizeButtons.forEach(button => {
                const size = button.getAttribute('data-size');
                const hasVariant = variants.some(variant =>
                    variant.color.name === selectedColor &&
                    variant.size.attribute_size_name === size &&
                    variant.quantity > 0
                );
                if (!hasVariant) {
                    button.disabled = true;
                    button.classList.add('disabled');
                } else {
                    button.disabled = false;
                    button.classList.remove('disabled');
                }
            });

            if (!Array.from(sizeButtons).some(button => !button.disabled)) {
                selectedSize = null;
                highlightSelectedButton('size-options', null);
                updateDisplayedPriceAndImage();
            }
        }

        function updateDisplayedPriceAndImage() {
            if (!variants || variants.length === 0) {
                console.error("Variants data is not available.");
                return;
            }

            if (selectedColor && selectedSize) {
                const selectedVariant = variants.find(variant =>
                    variant.color.name === selectedColor &&
                    variant.size.attribute_size_name === selectedSize
                );

                if (selectedVariant) {
                    document.getElementById('current-price').textContent =
                        new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(selectedVariant.variant_sale_price);

                    document.getElementById('current-listed-price').textContent =
                        new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(selectedVariant.variant_listed_price);

                    const mainImage = document.getElementById('img-1');
                    mainImage.src = baseUrl + selectedVariant.image;
                    mainImage.setAttribute('data-zoom-image', baseUrl + selectedVariant.image);

                    document.getElementById('available-quantity-value').textContent = selectedVariant.quantity;

                    const quantityInput = document.getElementById('quantity-input');
                    quantityInput.max = selectedVariant.quantity;
                    if (parseInt(quantityInput.value) > selectedVariant.quantity) {
                        quantityInput.value = selectedVariant.quantity;
                    } else if (parseInt(quantityInput.value) < 1) {
                        quantityInput.value = 1;
                    }

                    document.getElementById('variant-info').innerHTML = `
                                <h2>Thông tin biến thể</h2>
                                <p>Tên: ${selectedVariant.name ?? 'Không có tên'}</p>
                                <p>Giá: ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(selectedVariant.variant_sale_price)}</p>
                                <p>Số lượng: ${selectedVariant.quantity}</p>
                            `;
                } else {
                    console.error("Selected variant not found.");
                    document.getElementById('variant-info').innerHTML =
                        `<p>Không tìm thấy biến thể phù hợp với màu và kích thước đã chọn.</p>`;
                    document.getElementById('available-quantity-value').textContent = 'N/A';
                    const quantityInput = document.getElementById('quantity-input');
                    quantityInput.max = 1;
                    quantityInput.value = 1;
                }
            } else {
                console.warn("Please select both color and size.");
                document.getElementById('variant-info').innerHTML =
                    `<p>Vui lòng chọn cả màu sắc và kích thước.</p>`;
                document.getElementById('current-price').textContent = '';
                document.getElementById('current-listed-price').textContent = '';
                const mainImage = document.getElementById('img-1');
                mainImage.src = baseUrl + '{{ $products->product_image_url }}';
                mainImage.setAttribute('data-zoom-image', baseUrl + '{{ $products->product_image_url }}');
                document.getElementById('available-quantity-value').textContent = 'N/A';
                const quantityInput = document.getElementById('quantity-input');
                quantityInput.max = 1;
                quantityInput.value = 1;
            }
        }

        document.querySelectorAll('#color-options button').forEach(button => {
            button.addEventListener('click', function() {
                selectVariant(button, 'color');
            });
        });

        document.querySelectorAll('#size-options button').forEach(button => {
            button.addEventListener('click', function() {
                if (!button.disabled) {
                    selectVariant(button, 'size');
                }
            });
        });

        document.querySelectorAll('.qty-left-minus').forEach(button => {
            button.addEventListener('click', function() {
                const quantityInput = document.getElementById('quantity-input');
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > parseInt(quantityInput.min)) {
                    quantityInput.value = currentValue - 1;
                }
            });
        });

        document.querySelectorAll('.qty-right-plus').forEach(button => {
            button.addEventListener('click', function() {
                const quantityInput = document.getElementById('quantity-input');
                let currentValue = parseInt(quantityInput.value);
                const max = parseInt(quantityInput.max) || Infinity;
                if (currentValue < max) {
                    quantityInput.value = currentValue + 1;
                }
            });
        });
    });
</script> --}}
