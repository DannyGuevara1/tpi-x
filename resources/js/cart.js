let cart_items = document.getElementById('cart_items');
let checkout = document.getElementById('checkout')
let UsersTemplate = '';
let total = ''
let suma = 0
let descuento = 0
let suma2 = 0
async function Connect(url){
    try {
        const resp = await axios(url);

        await DataCart(resp.data)

    } catch (error) {
        console.log(error);
    }
}

async function DataCart(data){
    for (let d of data) {


        // language=HTML
        UsersTemplate += `
            <div class="Cart-Items">
                <div class="image-box">
                    <img src="/storage/${d.image_product}" style="height:'120px';" />
                </div>
                <div class="about">
                    <h1 class="title">${d.name_product}</h1>
                    <h3 class="subtitle">${d.category}</h3>
                </div>

                <div class="prices">
                    <div class="amount">${d.price}</div>
                    <div class="remove" onclick="deleteItem(${d.id_cart})"><u>Remove</u></div>
                </div>
            </div>
        `;
        descuento = parseFloat(d.discount) / 100;
        let nuevoPrecio = 0;
        
        suma = suma + parseInt(d.price);
        console.log(suma)
        let money = parseInt(d.money_reffer) 
        console.log(money)
        if(money > 0 && d.discount > 0){
            nuevoPrecio = suma * descuento
            console.log(nuevoPrecio)
            // console.log(nuevoPrecio)
            console.log(suma - nuevoPrecio)
            suma2 = suma - nuevoPrecio;
            suma2 = suma - nuevoPrecio - money;
        }else if(d.discount > 0){
            nuevoPrecio = suma * descuento
            suma2 = suma - nuevoPrecio;
            console.log(money)
        }else if(money > 0){
            suma2 = suma - money;
            console.log(suma2)
            console.log(suma)
        }else{
            suma2 = suma
        }
        

        if(suma2 === suma){
            total = `
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                    </div>
                    <div class="total-amount">${suma2.toFixed(2)} <span id="oldPrecio" style="font-size: 10px; text-decoration: line-through;"></span></div>
                </div>
                <a href="/sale/add"><button class="button" ;">Checkout</button></a>
            </div>
        `;
        }else if(suma > suma2){
            total = `
            <div class="checkout">
                <div class="total">
                    <div>
                        <div class="Subtotal">Sub-Total</div>
                    </div>
                    <div class="total-amount">${suma2.toFixed(2)} <span id="oldPrecio" style="font-size: 10px; text-decoration: line-through;">${suma.toFixed(2)}</span></div>
                </div>
                <a href="/sale/add"><button class="button" onclick="modal();">Checkout</button></a>
            </div>
        `;
        }

        
        
        cart_items.innerHTML = UsersTemplate;
        checkout.innerHTML = total;
    }
   

}
function updateTotal(){
    let cart_contend = document.getElementsByClassName('CartContainer')[0]
    let cart_items = document.getElementsByClassName('Cart-Items')

}

Connect('http://127.0.0.1:8000/api/carrito')
