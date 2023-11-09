let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

menu.onclick =() =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

// data table


async function Connect(url){
    try {
        const resp = await axios(url);
        // console.log(resp.data.results);
       await DataUsers(resp.data)

    } catch (error) {
        console.log(error);
    }
}
let bodyTable = document.getElementById('tableUsers');

let UsersTemplate = '';
async function DataUsers(data){
    for (let d of data) {


        // language=HTML
        UsersTemplate += `
        <tr>
                    <td>${d.name}</td>
                    <td>${d.age}</td>
                    <td>${d.username}</td>
                    <td>${d.country}</td>
                    <td>${d.address}</td>
                    <td>${d.shipping_address}</td>
                    <td>${d.discount}</td>
                    <td>${d.gender}</td>
                    <td>${d.rol}</td>
                    <td>
                        <a href="/users/edit/${d.id}" title="Edit Student">
                            <button class=""><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                        </a>
                    </td>
                    <td>
                        <button onclick="eliminarUsers(${d.id})" class=""><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </td>
        </tr>
        `;
        bodyTable.innerHTML = UsersTemplate;

    }
    $(document).ready(function () {
        $('#example').DataTable();
    });
}


Connect('http://127.0.0.1:8000/api/users').catch(e => console.log(e));

