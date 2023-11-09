let wishListTable = document.getElementById("wishListTable");
let UsersTemplate = "";

async function Connect(url) {
    try {
        const resp = await axios(url);

        await DataCart(resp.data);
    } catch (error) {
        console.log(error);
    }
}

async function DataCart(data) {
    for (let d of data) {
        // language=HTML
        UsersTemplate += `
        <tr>
          <td><img src="/storage/${d.image_product}" alt="" style="width: auto; height: 100px; object-fit: contain;"></td>
          <td><span>${d.name_product}</span></td>
          <td><span>$${d.price}</span></td>
          <td><span>in stock</span></td>
          <td><span><button onclick="addCarrito(${d.id_product_name})" class="btn-wishlist">Add to cart</button></span></td>
          <td><span><button onclick="deleteItem(${d.id_wish})" class=""><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></span></td>
      </tr>
        `;

        wishListTable.innerHTML = UsersTemplate;
    }
    $(document).ready(function () {
        $("#wishlist").DataTable();
    });
}
function updateTotal() {
    let cart_contend = document.getElementsByClassName("CartContainer")[0];
    let cart_items = document.getElementsByClassName("Cart-Items");
}
Connect('http://127.0.0.1:8000/api/wishlistAll');
