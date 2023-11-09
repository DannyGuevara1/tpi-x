const list_items = [];
const id_product = [];
const modal_product = [];
let lits_element = document.getElementById('product');
const pagination_element = document.getElementById('pagination');
const Modal_section = document.getElementById('modal-section')
let current_page  = 1;
let rows = 4;


async function DataProduct(data){
    try {
        for(let i of data){
            // console.log(i)
            // console.log(dataPokemon.data)
            list_items.push(`<div class='box'>
            <div class='icons'>
                <a id="heart${i.id}" onclick="addClass(${i.id})" class='fa fa-heart'></a>
                <a href='#' class='fa fa-share'></a>
                <a href='#' class='fa fa-eye'></a>
            </div>
            <div class='content'>
                <img src='/storage/${i.image_product}' alt=''>
                <h3>${i.name_product}</h3>
                <section class='hero'>
                  <div class='hero-content'>
                    <button id='button${i.id}' class='button' onclick="modal(id=${i.id});">+</button>
                  </div>
                </section>
                <div class='price'>${i.price} <span></span></div>
                <div class='stars'>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                    <i class='fa fa-star'></i>
                </div>
            </div>`);
            modal_product.push(`<div class="bg-modal" id='modal${i.id}'>
            <section class="featured" id="fearured">
              <div class="row">
                <button class="close" onclick="closeModal(id=${i.id});">+</button>
                  <div class="image-container">
                      <div class="small-image">
                          <img src="/storage/${i.image_product}" alt="" class="featured-image-1">
                          <img src="/storage/${i.image_product}" alt="" class="featured-image-1">
                          <img src="/storage/${i.image_product}" alt="" class="featured-image-1">
                          <img src="/storage/${i.image_product}" alt="" class="featured-image-1">
                      </div>
                      <div class="big-image">
                          <img src="/storage/${i.image_product}" alt="" class="big-image-1">
                      </div>
                  </div>
                  <div class="content">
                      <h3>${i.name_product}</h3>
                      <div class="stars">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                      </div>
                      <p>
                          ${i.description}
                      </p>
                      <div class="price">${i.price} <span></span></div>
                      <button class="btn" onclick="addCarrito(${i.id})">add to cart</button>
                  </div>
              </div>


          </section>
          <!--end featured-->
          </div>`);
        }
        // console.table(list_items)
        
        DisplayList(list_items, lits_element, rows, current_page);
        CreateModal(modal_product,Modal_section,rows,current_page)
        SetupPagination(list_items, pagination_element, rows);


    } catch (error) {
        console.log(error);
    }
}



function modal(id){
    document.querySelector('#modal'+id).style.display = "flex";
}
function closeModal(id){
    document.querySelector('#modal'+id).style.display = "none";
}
async function Connect(url){
    try {
        const resp = await axios(url);
        // console.log(resp.data.results);
        DataProduct(resp.data)

    } catch (error) {
        console.log(error);
    }
}
function DisplayList (items, wrapper, rows_per_page, page) {
    wrapper.innerHTML = "";
    page--;

    let start = rows_per_page * page;
    let end = start + rows_per_page;
    let paginatedItems = items.slice(start, end);
    for(let i = 0; i < paginatedItems.length; i++){
        let item = paginatedItems[i];
        let item_element = document.createElement('div');

        item_element.classList.add('item')
        item_element.innerHTML = item;
        wrapper.appendChild(item_element);

    }
}
function CreateModal(items,wrapper, rows_per_page, page){
    wrapper.innerHTML = "";
    page--;
    let start = rows_per_page * page;
    let end = start + rows_per_page;
    let paginatedItems = items.slice(start, end);
    for(let i = 0; i < paginatedItems.length; i++){
        let item = paginatedItems[i];
        let item_element = document.createElement('div');

        item_element.classList.add('item')
        item_element.innerHTML = item;
        wrapper.appendChild(item_element);

    }
}
function SetupPagination(items, wrapper, rows_per_page){
    wrapper.innerHTML = "";
    let page_count = Math.ceil(items.length / rows_per_page);
    for(let i = 1; i < page_count + 1; i++){
       let btn = PaginationButton(i, items)
       wrapper.appendChild(btn);
    }
}

function PaginationButton(page, items){
    let button = document.createElement('button');
    button.innerText = page;

    if(current_page == page){
        button.classList.add('active');
    }
    button.addEventListener('click',function(){
        current_page = page;
        DisplayList(items, lits_element, rows, current_page);
        CreateModal(modal_product,Modal_section,rows,current_page)
        let current_btn = document.querySelector('.pagenumbers button.active');
        current_btn.classList.remove('active');

        button.classList.add('active');
    })


    return button;
}

let bandera1 = true
document.querySelectorAll(".click").forEach(el => {
    el.addEventListener("click", e => {
        const id = e.target.getAttribute("id");
        if (id === 'showRunner'){
            bandera1 = false

            list_items.length = 0

            document.getElementById('product').innerHTML = '';
            console.log(bandera1)

            Connect('http://127.0.0.1:8000/api/products/category/runner');
        }
        if (id === 'showCasuals'){
            bandera1 = false
            list_items.length = 0
            Connect('http://127.0.0.1:8000/api/products/category/casual');
        }
        if (id === 'rango1'){
            bandera1 = false

            list_items.length = 0

            document.getElementById('product').innerHTML = '';
            console.log(bandera1)

            Connect('http://127.0.0.1:8000/api/products/price/0/100');
        }
        if (id === 'rango2'){
            bandera1 = false

            list_items.length = 0

            document.getElementById('product').innerHTML = '';
            console.log(bandera1)

            Connect('http://127.0.0.1:8000/api/products/price/100/500');
        }

    });

});
console.log(bandera1)
if (bandera1){
    Connect('http://127.0.0.1:8000/api/products');
}







