let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

menu.onclick =() =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}


let tbodyProduct = document.getElementById('productTable');
let ProductTemplate = '';
async function Connect(url){
    try {
        const resp = await axios(url);
        // console.log(resp.data.results);
        await DataProduct(resp.data)

    } catch (error) {
        console.log(error);
    }
}

// name_product	"Nike Air Max 90"
// category	"Tenis"
// image_product	"nike-air-max-90.jpg"
// supplier	"Nike Inc"
// stock	3
// cost	"108.00"
// price	"178.00"
// description

async function DataProduct(data){
    for (let d of data) {
        // language=HTML
        ProductTemplate += `
        <tr>
                    <td>${d.name_product}</td>
                    <td>${d.category}</td>
                    <td>${d.supplier}</td>
                    <td>${d.stock}</td>
                    <td>${d.cost}</td>
                    <td>${d.price}</td>
                    <td>${d.description}</td>
                    <td>
                        <a href="/products/edit/${d.id}" title="Edit Student">
                            <button class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                        </a>
                    </td>
                    <td>
                        <button onclick="eliminarProduct(${d.id})" class=""><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </td>
        </tr>
        `;
        tbodyProduct.innerHTML = ProductTemplate;

    }
    $(document).ready(function () {
        $('#product').DataTable();
    });

}




Connect('http://127.0.0.1:8000/api/products').catch(e => console.log(e));
