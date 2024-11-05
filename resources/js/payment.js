document.addEventListener('livewire:init', ()=>{
    Livewire.on('user-pay', ({token}) => {
        console.log('snap token ' + token);
        snap.pay(token, {
            // onSuccess: function(result){console.log('success');console.log(result);},
            // onPending: function(result){console.log('pending');console.log(result);},
            // onError: function(result){console.log('error');console.log(result);},
            // onClose: function(){console.log('customer closed the popup without finishing the payment');}
          })
    });
})