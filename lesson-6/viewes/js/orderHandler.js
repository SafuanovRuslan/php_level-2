'use strict';

window.addEventListener('load', ()=>{
    let buttons = document.querySelectorAll('.order__button');

    buttons.forEach((button)=>{
        button.addEventListener('click', async ()=>{
            let result = await fetch(`?action=cancelOrder&id=${button.id}`);
            result = await result.json();

            if (result == "not authorized") document.location.href="?page=login";
            if (result == "OK") {
                let canceledOrder = document.querySelector(`#order-${button.id}`);
                canceledOrder.remove();
        
                alert('Товар удалён из списка заказов');
            }
        })
    })
})