import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import "./bootstrap";
import "./splide";
import "../../vendor/masmerise/livewire-toaster/resources/js";
import "./payment";

Alpine.plugin(intersect);

const userAgent = navigator.userAgent || navigator.vendor || window.opera;
const isEmbeddedBrowser = /Instagram|TikTok|FBAN|FBAV/.test(userAgent);

console.log(isEmbeddedBrowser);

if (isEmbeddedBrowser) {
    window.open("https://glowlocal.shop", "_blank"); // URL yang ingin dibuka
}
