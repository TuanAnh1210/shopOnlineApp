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
        <h2>Quản lý bình luận</h2>
    </div>

    <div class="prdManage_header">
        <div class="prdManage_tit">
            <h3>Chi tiết bình luận</h3>
            <div class="prdManage_form">
                <div class="prdManage_form-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder="Search category">
                </div>

            </div>
        </div>



        <table class="table_prd">
            <thead>
                <tr>
                    <td width="4%">STT</td>
                    <td width="33%">Nội dung</td>
                    <td width="20%">Người bình luận</td>
                    <td width="10%">Avatar</td>
                    <td width="20%">Thời gian</td>
                    <td width="13%"></td>
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
const data = <?= json_encode($listCmt) ?>;
const domainPage = <?= json_encode($GLOBALS['domainPage']) ?>;

data.forEach(element => {
    for (let i in element) {
        if (!isNaN(Number(i))) {
            delete element[i];
        }
    }
});

// handle quantity btn pagination
let numberData = 4

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
        <form action="" method="POST">
                 <tr>
                        <td>${++index}</td>
                        <td class="productNameItem">
                            <p class="cateNameP">${ele.content}</p>
                            <input style="font-size:14px" class="iptUpdateCate" type="text" value="${ele.content}" />
                        </td>

                        <td class="productNameItem">
                            <p class="cateNameP">${ele.nameuser}</p>
                        </td>
                       
                        <td>
                        <img class="prdMana_image" src="${domainPage}/uploads/${ele.imageuser}"
                            alt="">
                    </td>

                    <td class="productNameItem">
                            <strong class="cateNameP">${ele.comment_time}</strong>
                        </td>
                    
                        <td style="text-align: center;">
                        <button onclick="handleUpdateCate(${ele.idCmt}, ${ele.product_id} , this)" class="btn-update btn-update-cate">Sửa</button>
                            <button onclick="confirmDelete(${ele.idCmt}, ${ele.product_id})" class="btn-delete">Xóa</button>
                         
                        </td>
                    </tr>
                </form>

    `).join('')
}




render(temp)
const btnUpdateCate = document.querySelectorAll('.btn-update')



const btns = document.querySelectorAll('.btn-page')

for (let i = 0; i < btns.length; i++) {
    btns[i].onclick = () => {

        render(btns[i].innerText)
    }
}

// handle delete
const btn_delete = document.querySelector('.btn-delete')
const message__delete = document.querySelector('.message__delete')
const yes_btn = document.querySelector('.yes')
const no = document.querySelector('.no')
const delete_links = document.querySelectorAll('.delete_links')

function confirmDelete(id, product_id) {
    message__delete.classList.add('open')
    yes_btn.onclick = () => {
        window.location = `${domainPage}/admin_comment/deleteDetailCmt?id=${id}&product_id=${product_id}`
    }
}

no.onclick = () => {
    message__delete.classList.remove('open')
}


// const cateNameP = document.querySelectorAll('.cateNameP')
// const iptUpdateCate = document.querySelectorAll('.iptUpdateCate')

function handleUpdateCate(id, product_id, item) {
    const cateRow = item.parentElement.parentElement.querySelector('.productNameItem');
    cateNameP = cateRow.querySelector('.cateNameP')
    iptUpdateCate = cateRow.querySelector('.iptUpdateCate')
    if (cateNameP.classList == 'cateNameP' && iptUpdateCate.classList == 'iptUpdateCate') {
        cateNameP.classList.add('close')
        iptUpdateCate.classList.add('open')
        iptUpdateCate.focus()
    } else if (cateNameP.classList == 'cateNameP close' && iptUpdateCate.classList == 'iptUpdateCate open') {
        window.location =
            `${domainPage}/admin_comment/handleUpdateComment?id=${id}&value=${iptUpdateCate.value}&product_id=${product_id}`
    }
}


// btnUpdateCate.onclick = (e) => {
//     e.preventDefault()
//     if (iptUpdateCate.style.display == 'none' && cateNameP.style.display == 'block') {
//         iptUpdateCate.style.display == 'block';
//         cateNameP.style.display == 'none';
//     }
// }
</script>


<?php ipView('admin.component.footer') ?>