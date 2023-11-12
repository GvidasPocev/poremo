<div class="cookie-alert">
    <h5>{{ __('content.cookie.title') }}</h5>
    <p>{!! __('content.cookie.content')  !!}</p>
    <a href="#" class="default-button-3 accept-cookies">{{ __('content.cookie.accept') }}</a>
</div>

<script>
(function () {
    "use strict";

    var cookieAlert = document.querySelector(".cookie-alert");
    var acceptCookies = document.querySelector(".accept-cookies");

    cookieAlert.offsetHeight;

    if (!getCookie("acceptCookies")) {
        cookieAlert.classList.add("show");
    }

    acceptCookies.addEventListener("click", function () {
        setCookie("acceptCookies", true, 60);
        cookieAlert.classList.remove("show");
    });
})();

</script>
