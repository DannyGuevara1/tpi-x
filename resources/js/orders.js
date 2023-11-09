let ordersContend = document.getElementById('ordersContend');
let OrdersProduct = '';
async function DataOrders(data){
    for (let d of data) {
        // language=HTML
        OrdersProduct += `
            <div class="image-container">
                <div class="small-image">
                    <img src="/storage/${d.image_product}"" alt="" class="featured-image-1">
                </div>
            </div>

            <div class="content">


                <h3>${d.name_product}</h3>
                <p>
                    Price: <span>${d.price}</span><br>
                    Size: <span>${d.size}</span><br>
                    Tipo de calzado:<span>${d.category}</span><br>
                    Proveedor:<span></span>${d.supplier}<br>
                    description:<span></span>${d.description}<br>
                </p>

                <div class="price code-orders">code orders</div>

                <a href="#" onclick="deleteSale(${d.id_sale})" class="btn" id="cancel${d.id_sale}" >Cancel order</a>


            </div>

        `;
        ordersContend.innerHTML = OrdersProduct;
        setTimeout(function() {
            document.getElementById(`cancel${d.id_sale}`).style.display = 'none'
            axios.put('http://127.0.0.1:8000/sales/put/'+d.id_sale,{
                status: 'buy'
            })
        }, 5000);
        };



}

async function Connect(url){
    try {
        const resp = await axios(url);
        console.log(resp.data);
        await DataOrders(resp.data)

    } catch (error) {
        console.log(error);
    }
}

Connect('http://127.0.0.1:8000/api/orders').catch(e => console.log(e));
