const openInBrowser = document.getElementById("openInBrowserButton");

if (openInBrowser) {
    document
        .getElementById("openInBrowserButton")
        .addEventListener("click", function (event) {
            event.preventDefault(); // Mencegah aksi default tombol
            const url = "https://glowlocal.shop/produk";
            // Gunakan metode khusus untuk membuka di browser default
            if (navigator.userAgent.match(/iPhone|iPad|iPod/i)) {
                // iOS: Gunakan skema khusus yang memaksa Safari
                window.location.href = `googlechrome://${url.replace(
                    "https://",
                    ""
                )}`;
            } else if (navigator.userAgent.match(/Android/i)) {
                // Android: Gunakan intent khusus
                window.location.href = `intent://${url.replace(
                    "https://",
                    ""
                )}#Intent;scheme=https;package=com.android.chrome;end`;
            } else {
                // Fallback untuk membuka link di browser
                window.open(url, "_blank");
            }
        });
}
