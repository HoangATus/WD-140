// Kiểm tra sự tồn tại của các phần tử cần thiết
if (
    document.querySelectorAll("[toast-list]").length > 0 ||
    document.querySelectorAll("[data-choices]").length > 0 ||
    document.querySelectorAll("[data-provider]").length > 0
) {
    // Hàm để chèn script một cách động
    function loadScript(src) {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = src;
        document.body.appendChild(script);
    }

    // Chèn các script cần thiết
    loadScript("https://cdn.jsdelivr.net/npm/toastify-js");
    loadScript(
        `${PATH_ROOT}/assets/libs/choices.js/public/assets/scripts/choices.min.js`
    );
    loadScript(`${PATH_ROOT}/assets/libs/flatpickr/flatpickr.min.js`);
}
