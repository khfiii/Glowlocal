import "@splidejs/splide/css";
import Splide from "@splidejs/splide";

document.addEventListener("alpine:init", () => {
    const mainCarousel = document.getElementById("main-carousel");
    const thumbnailCarousel = document.getElementById("thumbnail-carousel");

    if (mainCarousel && thumbnailCarousel) {
        const thumbnailCarousel = new Splide("#thumbnail-carousel", {
            fixedWidth: 100,
            fixedHeight: 100,
            gap: 10,
            rewind: true,
            pagination: false,
            isNavigation: true,
            arrows: false,
        });

        const mainCarousel = new Splide("#main-carousel", {
            type: "fade",
            rewind: true,
            pagination: false,
            arrows: false,
        });

        mainCarousel.sync(thumbnailCarousel);
        mainCarousel.mount();
        thumbnailCarousel.mount();
    }
});
