<?php ipView('admin.component.header')
?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>
    <div class="message__delete">
        <h2>Bạn chắc chắn muốn xóa !!</h2>
        <h4>Nếu xóa dữ liệu sẽ không thể khôi phục</h4>
        <div class="btn__delete-container">
            <button class="yes">Yes</button>
            <button class="no">No</button>

        </div>
    </div>

    <div class="dashBoard_banner">
        <h2>Quản lý sản phẩm</h2>
    </div>

    <div class="prdManage_header">
        <form class="form_products" action="" method="POST">
            <div class="prdManage_tit">
                <h3>Danh sách sản phẩm</h3>
                <div class="prdManage_form">
                    <div class="prdManage_form-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input id="search_ipt" type="text" placeholder="Search product">
                    </div>

                    <div>
                        <select class="action_user">
                            <option value="delete">--Xóa--</option>
                            <option value="edit">--Sửa--</option>
                        </select>

                        <button class="btn-action">Thực hiện</button>
                    </div>
                    <a href="http://localhost/php1_ass_ph29220/admin/addNewPrd"><button class="btn_addPrd">Add New
                            Product</button></a>

                </div>
            </div>



            <table class="table_prd">
                <thead>
                    <tr>
                        <td width="3%">STT</td>
                        <td width="30%">Name</td>
                        <td width="10%">Price</td>
                        <td width="10%">Image</td>
                        <td width="7%">Discount</td>
                        <td width="7%">Quantity</td>
                        <td width="5%">View</td>
                        <td width="7%">Bought</td>
                        <td width="8%">Category</td>
                        <td width="9%">Description</td>
                        <td width="4%"></td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </form>

        <div class="pagination">
        </div>
    </div>



</div>



<script>
// handle get data from db and convert arr php to arr js
const data = <?= json_encode($listPrd) ?>;
const domainPage = <?= json_encode($GLOBALS['domainPage']) ?>;


data.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});


// handle quantity btn pagination
let numberData = 5


const pagination = document.querySelector('.pagination')

for (let i = 0; i < Math.ceil(data.length / numberData); i++) {
    pagination.innerHTML += `
        <button class="btn-page">${i + 1}</button>
    `
}

// handle pagination 

let temp = 0

function render(temp) {
    let target = temp > 0 ? temp * numberData : numberData

    const newData = data.slice(target - numberData, target)

    document.querySelector('tbody').innerHTML = newData.map((ele, index) => `
             <tr>
                    <td>${++index}</td>
                    <td class="productNameItem">${ele.name}</td>
                    <td>${(ele.price).toLocaleString() }đ</td>
                    <td>
                        <img class="prdMana_image" src="${domainPage}/uploads/${ele.image}"
                            alt="">
                    </td>
                    <td>${ele.discount}</td>
                    <td >${ele.quantity}</td>
                    <td >${ele.view}</td>
                    <td >${ele.bought}</td>
                    <td >${ele.cate}</td>
                    <td class="descWrapper">
                        <button onclick="showDesc(this)" class="showDesc">Show</button>
                        <p class="descBox">${ele.description}</p>
                    </td>

                
                    <td >
                    <input name="${ele.id}" value="${ele.id}" style="width:18px; height:18px;" type="checkbox">
                        
                    </td>

                </tr>

    `).join('')
}

document.body.onload = () => {
    render(temp)


}

const btns = document.querySelectorAll('.btn-page')

for (let i = 0; i < btns.length; i++) {
    btns[i].onclick = () => {

        render(btns[i].innerText)
    }
}


// handle search 
const search_ipt = document.querySelector('#search_ipt')

search_ipt.onkeyup = () => {
    const valueIpt = search_ipt.value.toLowerCase().normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/đ/g, 'd').replace(/Đ/g, 'D')
    const arr = []
    data.forEach(item => {
        const text = item.productName.toLowerCase().normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd').replace(/Đ/g, 'D')

        if (text.indexOf(valueIpt) > -1) {
            arr.push(item)
        }
    })



    renderSearch(arr)

}

function renderSearch(dataSearch) {

    const sameArray = JSON.stringify(dataSearch) === JSON.stringify(data);
    console.log(sameArray)
    if (sameArray) {
        render(temp)
    } else {
        document.querySelector('tbody').innerHTML = dataSearch.map((ele, index) => `
        <tr>
                    <td>${++index}</td>
                    <td class="productNameItem">${ele.name}</td>
                    <td>${(ele.price).toLocaleString() }đ</td>
                    <td>
                        <img class="prdMana_image" src="${domainPage}/uploads/${ele.image}"
                            alt="">
                    </td>
                    <td>${ele.discount}</td>
                    <td >${ele.quantity}</td>
                    <td >${ele.view}</td>
                    <td >${ele.bought}</td>
                    <td >${ele.cate}</td>
                    <td class="descWrapper">
                        <button onclick="showDesc(this)" class="showDesc">Show</button>
                        <p class="descBox">${ele.description}</p>
                    </td>

                
                    <td >
                    <input name="${ele.id}" value="${ele.id}" style="width:18px; height:18px;" type="checkbox">
                        
                    </td>

                </tr>

    `).join('')
    }


}


// handle delete
const btn_delete = document.querySelector('.btn-delete')
const message__delete = document.querySelector('.message__delete')
const yes_btn = document.querySelector('.yes')
const no = document.querySelector('.no')
const delete_links = document.querySelectorAll('.delete_links')

function confirmDelete(id) {
    message__delete.classList.add('open')
    yes_btn.onclick = () => {
        window.location = `http://localhost/php1_ass_ph29220/admin/productManage?delete&id=${id}`
    }
}

no.onclick = () => {
    message__delete.classList.remove('open')
}


const showDesc = (item) => {
    item.nextElementSibling.style.display = "block";
}


// feat: handle when select action crud account

const btn_action = document.querySelector(".btn-action");

console.log(btn_action)
const form_products = document.querySelector(".form_products")
const action_user = document.querySelector(".action_user")


btn_action.onclick = (e) => {
    e.preventDefault()
    const message__delete = document.querySelector('.message__delete')
    const yes = document.querySelector('.yes')
    const no = document.querySelector('.no')


    no.onclick = () => {
        message__delete.classList.remove('open')

    }


    switch (action_user.value) {
        case "delete":
            form_products.action = `${domainPage}/admin/deleteProduct`
            message__delete.classList.add('open')

            yes.onclick = () => {
                form_products.submit()
            }
            break;



        case "edit":
            form_products.action = `${domainPage}/admin/editProduct`
            form_products.submit()

            break;


    }

}
</script>


<?php ipView('admin.component.footer') ?>