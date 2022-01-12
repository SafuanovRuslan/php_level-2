let products = document.getElementById("product");
let button = document.getElementById("button_product");

let getGoods = async function func() {
    let goods = await fetch(`/lesson-4/php/getProducts.php?goods=${func.counter}`);
    goods = await goods.json();

    goods.forEach(good => {
        products.insertAdjacentHTML("beforeend",
        `<div class="product__item">
            <div class="product__photo"><img src="${good.source}" alt="product" width="100%"></div>
            <div class="product__title">${good.title}</div>
            <div class="product__price">${good.price}</div>
        </div>`);
        func.counter++;
    })
    func.counter++;

    if (goods.length < 3) {
        button.remove();
    }
}
getGoods.counter = 0;

window.addEventListener('load', () => {
    button.addEventListener('click', () => {
        getGoods();
    })
})

getGoods();