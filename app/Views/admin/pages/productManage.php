<?php ipView('admin.component.header') ?>

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
        <div class="prdManage_tit">
            <h3>Danh sách sản phẩm</h3>
            <div class="prdManage_form">
                <div class="prdManage_form-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input id="search_ipt" type="text" placeholder="Search product">
                </div>
                <a href="http://localhost/php1_ass_ph29220/admin/addNewPrd"><button class="btn_addPrd">Add New
                        Product</button></a>
            </div>
        </div>



        <table class="table_prd">
            <thead>
                <tr>
                    <td width="5%">STT</td>
                    <td width="15%">Product Name</td>
                    <td width="25%">Product Image</td>
                    <td width="15%">Product Price</td>
                    <td width="20%">Product Description</td>
                    <td width="20%">Action</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <div class="pagination">
        </div>
    </div>



</div>



<script>
// handle get data from db and convert arr php to arr js
const data = <?= json_encode($listPrd) ?>

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
                    <td>${ele.id}</td>
                    <td class="productNameItem">${ele.productName}</td>
                    <td>
                        <img class="prdMana_image" src="${ele.productImage}"
                            alt="">
                    </td>
                    <td>${ele.productPrice}</td>
                    <td>${ele.productDesc}</td>
                    <td style="text-align: center;">
                        <a href="http://localhost/php1_ass_ph29220/admin/updatePrd?id=${ele.id}"><button class="btn-update">Update</button></a>
                        <button onclick="confirmDelete(${ele.id})" class="btn-delete">Delete</button>
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
    const valueIpt = search_ipt.value.toLowerCase()
    const arr = []
    data.forEach(item => {
        const text = item.productName.toLowerCase()

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
                    <td>${ele.id}</td>
                    <td class="productNameItem">${ele.productName}</td>
                    <td>
                        <img class="prdMana_image" src="${ele.productImage}"
                            alt="">
                    </td>
                    <td>${ele.productPrice}</td>
                    <td>${ele.productDesc}</td>
                    <td style="text-align: center;">
                        <a href="http://localhost/php1_ass_ph29220/admin/updatePrd?id=${ele.id}"><button class="btn-update">Update</button></a>
                        <button onclick="confirmDelete(${ele.id})" class="btn-delete">Delete</button>
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
</script>


<?php ipView('admin.component.footer') ?>