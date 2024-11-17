document.addEventListener("livewire:init", () => {
    Livewire.on("user-pay", ({ token, order }) => {
        snap.pay(token, {
            onSuccess: function (result) {
                Livewire.dispatch("payment-success", {
                    result: result,
                    order: order,
                });
            },
            // onPending: function(result){console.log('pending');console.log(result);},
            // onError: function(result){console.log('error');console.log(result);},
            onClose: function () {
                Livewire.dispatch("payment-closed", {
                    result: result,
                    order: order,
                });
            },
        });
    });
});
