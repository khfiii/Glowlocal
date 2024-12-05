document.addEventListener("livewire:init", () => {
    Livewire.on("login", ({ client_id }) => {
        console.log("woi anjer");

        google.accounts.id.initialize({
            client_id: client_id,
            callback: handleCredentialResponse,
        });
        google.accounts.id.prompt();

        function handleCredentialResponse(response) {
            console.log(response);

            // Ambil credential dari Google
            const credential = response.credential;

            // Buat URL untuk mengirim credential ke server
            const url = new URL("auth/google/callback", window.location.origin);
            url.searchParams.append("credential", credential); // Kirim credential ke server

            // Kirimkan GET request ke server
            fetch(url, {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        location.reload();
                    } else {
                        console.log("Terjadi Kesalahan saat login");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Terjadi kesalahan. Coba lagi.");
                });
        }
    });
});
