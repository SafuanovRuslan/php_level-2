'use strict';

window.addEventListener('load', ()=>{
    let buttons = document.querySelectorAll('.good__button');

    buttons.forEach((button)=>{
        button.addEventListener('click', async ()=>{
            let result = await fetch(`?action=order&id=${button.id}`);
            result = await result.json();

            if (result == "not authorized") document.location.href="?page=login";
            if (result == "OK") alert('Товар заказан');
        })
    })
})