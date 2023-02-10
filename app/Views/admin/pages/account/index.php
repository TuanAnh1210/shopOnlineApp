<?php ipView('admin.component.header') ?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>
    <div class="message__delete">
        <h2>Bạn chắc chắn muốn xóa!</h2>
        <h4>Nếu xóa dữ liệu sẽ không thể khôi phục</h4>
        <div class="btn__delete-container">
            <button class="yes">Yes</button>
            <button class="no">No</button>
        </div>
    </div>

    <div class="dashBoard_banner">
        <h2>Quản lý users</h2>
    </div>

    <div class="prdManage_header">
        <form class="form_acc" method="POST" action="">
            <div class="prdManage_tit">
                <h3>Danh sách user</h3>
                <div class="prdManage_form">
                    <div class="prdManage_form-search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input id="search_ipt" type="text" placeholder="Search product">
                    </div>
                    <div>
                        <select class="action_user">
                            <option value="check">--Duyệt--</option>
                            <option value="delete">--Xóa--</option>
                            <option value="edit">--Sửa--</option>
                        </select>

                        <button class="btn-action">Thực hiện</button>
                    </div>

                </div>
            </div>


            <table class="table_prd">
                <thead>
                    <tr>
                        <td width="3%">Stt</td>
                        <td width="15%">Họ tên</td>
                        <td width="21%">Email</td>
                        <td width="7%">Ảnh</td>
                        <td width="10%">Địa chỉ</td>
                        <td width="10%">Mật khẩu</td>
                        <td width="10%">Điện thoại</td>
                        <td width="10%">Phân quyền</td>
                        <td width="10%">Kiểm duyệt</td>
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
const listAcc = <?= json_encode($listAcc) ?>;
const domainPage = <?= json_encode($GLOBALS['domainPage']) ?>;


listAcc.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});



// handle quantity btn pagination
let numberData = 4

const pagination = document.querySelector('.pagination')

for (let i = 0; i < Math.ceil(listAcc.length / numberData); i++) {
    pagination.innerHTML += `
        <button class="btn-page">${i + 1}</button>
    `
}

// handle pagination 

let temp = 0

function render(temp) {
    let target = temp > 0 ? temp * numberData : numberData

    const newData = listAcc.slice(target - numberData, target)

    document.querySelector('tbody').innerHTML = newData.map((ele, index) => `
             <tr style="background-color: ${ele.status == 0 ? 'yellow' : 'white'}">
                    <td>${++index}</td>
                    <td class="productNameItem">${ele.fullname}</td>
                    
                    <td>${ele.email}</td>
                    <td>
                    <img style="width:100%; height:60px; padding:0 8px;" src="${domainPage}/uploads/${ele.avatar}" alt="">
                        
                    </td>
                    <td>${ele.address}</td>
                    <td>${ele.password}</td>
                    <td>${ele.phone}</td>
                    <td>
                        ${ele.role == 0 ? 'Khách hàng' : 'Quản trị'}
                    </td>
                    <td>
                        ${ele.status == 0 ? 'chờ duyệt' : 'đã duyệt'}
                        
                    </td>
                    <td style="text-align: center;">
              
                    <input class="checkStatusUser" name="${ele.id}" value="${ele.id}" style="width:18px; height:18px;" type="checkbox">
                        
                    </td>
                   
                </tr>

    `).join('')
}

// handle search 
const search_ipt = document.querySelector('#search_ipt')

search_ipt.onkeyup = () => {
    const valueIpt = search_ipt.value.toLowerCase().normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .replace(/đ/g, 'd').replace(/Đ/g, 'D')
    const arr = []
    listAcc.forEach(item => {
        const text = item.fullname.toLowerCase().normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd').replace(/Đ/g, 'D')

        if (text.indexOf(valueIpt) > -1) {
            arr.push(item)
        }
    })



    renderSearch(arr)

}

function renderSearch(dataSearch) {

    const sameArray = JSON.stringify(dataSearch) === JSON.stringify(listAcc);

    if (sameArray) {
        render(temp)
    } else {
        document.querySelector('tbody').innerHTML = dataSearch.map((ele, index) => `
        <tr style="background-color: ${ele.status == 0 ? 'yellow' : 'white'}">
                    <td>${ele.id}</td>
                    <td class="productNameItem">${ele.fullname}</td>
                    
                    <td>${ele.email}</td>
                    <td>
                    <img style="width:100%; height:80px" src="${domainPage}/uploads/${ele.avatar}" alt="">
                        
                    </td>
                    <td>${ele.address}</td>
                    <td>${ele.password}</td>
                    <td>${ele.phone}</td>
                    <td>
                        ${ele.role == 0 ? 'Khách hàng' : 'Quản trị'}
                    </td>
                    <td>
                        ${ele.status == 0 ? 'chờ duyệt' : 'đã duyệt'}
                        
                    </td>
                    <td style="text-align: center;">
                    <input class="checkStatusUser" name="${ele.id}" value="${ele.id}" style="width:18px; height:18px;" type="checkbox">
                        
                    </td>
                   
                </tr>

    `).join('')
    }


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


const btnCensor = document.querySelector('.btn-censor')


function confirmCensor(id) {
    message__delete.classList.add('open')


}




// feat: handle when select action crud account
const btn_action = document.querySelector(".btn-action");

console.log(btn_action)
const form_acc = document.querySelector(".form_acc")
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
            form_acc.action = `${domainPage}/users/removeUser`
            message__delete.classList.add('open')

            yes.onclick = () => {
                form_acc.submit()
            }
            break;

        case "check":
            form_acc.action = `${domainPage}/users/checkedUser`
            form_acc.submit()
            break;

        case "edit":
            form_acc.action = `${domainPage}/users/editUser`
            form_acc.submit()

            break;


    }

}
</script>

<?php ipView('admin.component.footer') ?>