<?php ipView('admin.component.header') ?>

<div class="dashBoard_content">
    <?php ipView('admin.component.acc') ?>
    <div class="message__delete">
        <h2>Bạn chắc chắn muốn duyệt!</h2>
        <h4>Đồng ý duyệt người dùng này quyền admin</h4>
        <div class="btn__delete-container">
            <button class="yes">Yes</button>
            <button class="no">No</button>
        </div>
    </div>

    <div class="dashBoard_banner">
        <h2>Quản lý users</h2>
    </div>

    <div class="prdManage_header">
        <div class="prdManage_tit">
            <h3>Danh sách user</h3>
            <div class="prdManage_form">
                <div class="prdManage_form-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input id="search_ipt" type="text" placeholder="Search product">
                </div>
                <button class="btn_addPrd btnCheckAll">Duyệt
                    tất
                    cả</button>
            </div>
        </div>


        <table class="table_prd">
            <thead>
                <tr>
                    <td width="5%">STT</td>
                    <td width="20%">Full Name</td>
                    <td width="25%">Email</td>
                    <td width="15%">Password</td>
                    <td width="10%">Phân quyền</td>
                    <td width="15%">Kiểm duyệt</td>
                    <td width="10%">Duyệt</td>
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
const listAcc = <?= json_encode($listAcc) ?>

console.log(listAcc)

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
             <tr style="background-color: ${ele.censorship == 0 ? 'yellow' : 'white'}">
                    <td>${ele.id}</td>
                    <td class="productNameItem">${ele.fullname}</td>
                    
                    <td>${ele.email}</td>
                    <td>${ele.password}</td>
                    <td>
                        ${ele.role == 0 ? 'user' : 'admin'}
                    </td>
                    <td>
                        ${ele.censorship == 0 ? 'chờ duyệt' : 'đã duyệt'}
                        
                    </td>
                    <td style="text-align: center;">
                    ${ele.censorship == 0 ? `<button value="${ele.id}" onclick="confirmCensor(${ele.id})" class="btn-update btn-censor">Duyệt</button>` : ''}
                        
                    </td>
                    <td>

                    </td>
                </tr>

    `).join('')
}

// handle search 
const search_ipt = document.querySelector('#search_ipt')

search_ipt.onkeyup = () => {
    console.log(search_ipt.value.toLowerCase())
    const valueIpt = search_ipt.value.toLowerCase()
    const arr = []
    listAcc.forEach(item => {
        const text = item.fullname.toLowerCase()

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
             <tr style="background-color: ${ele.censorship == 0 ? 'yellow' : 'white'}">
                    <td>${ele.id}</td>
                    <td class="productNameItem">${ele.fullname}</td>
                    
                    <td>${ele.email}</td>
                    <td>${ele.password}</td>
                    <td>
                        ${ele.role == 0 ? 'user' : 'admin'}
                    </td>
                    <td>
                        ${ele.censorship == 0 ? 'chờ duyệt' : 'đã duyệt'}
                        
                    </td>
                    <td style="text-align: center;">
                    ${ele.censorship == 0 ? `<button value="${ele.id}" onclick="confirmCensor(${ele.id})" class="btn-update btn-censor">Duyệt</button>` : ''}
                        
                    </td>
                    <td>

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
const message__delete = document.querySelector('.message__delete')
const yes = document.querySelector('.yes')
const no = document.querySelector('.no')

function confirmCensor(id) {
    message__delete.classList.add('open')
    yes.onclick = () => {
        window.location = `http://localhost/php1_ass_ph29220/admin/userManage?check&id=${id}`
    }

}


no.onclick = () => {
    message__delete.classList.remove('open')

}

const btnCheckAll = document.querySelector('.btnCheckAll')
btnCheckAll.onclick = () => {
    let arrId = []
    const listBtn = document.querySelectorAll('.btn-censor')
    listBtn.forEach(item => {
        arrId.push(Number(item.value))
    })

    window.location = `http://localhost/php1_ass_ph29220/admin/userManage?check&id=${arrId}`
}
</script>

<?php ipView('admin.component.footer') ?>