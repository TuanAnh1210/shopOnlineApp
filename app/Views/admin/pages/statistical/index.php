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
        <h2>Thống kê</h2>
    </div>

    <div class="prdManage_header">
        <div class="prdManage_tit">
            <h3>Thống kê sản phẩm theo loại</h3>
            <div class="prdManage_form">

                <a href="<?= $GLOBALS["domainPage"] ?>/admin_statistical/chart"><button class="btn_addPrd">Xem biểu
                        đồ</button></a>
            </div>
        </div>



        <table class="table_prd">
            <thead>
                <tr>
                    <td width="5%">STT</td>
                    <td width="20%">Danh mục</td>
                    <td width="20%">Số lượng</td>
                    <td width="20%">Giá cao nhất</td>
                    <td width="20%">Giá thấp nhất</td>
                    <td width="15%">Trung bình</td>
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
const data = <?= json_encode($data) ?>;
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
            
                 <tr>
                        <td>${ele.id}</td>
                        <td class="productNameItem">
                            <h3 class="cateNameP">${ele.name}</h3>
                            <input class="iptUpdateCate" type="text" value="${ele.name}" />
                        </td>
                       
                        <td>${ele.quantity}</td>
                        <td>${ele.max ? (ele.max).toLocaleString() : 0} đ</td>
                        <td>${ele.min ? (ele.min).toLocaleString() : 0} đ</td>
                        <td>${ele.avg ? (ele.avg).toLocaleString() : 0} đ</td>

                    </tr>
     

    `).join('')
}




render(temp)



const btns = document.querySelectorAll('.btn-page')

for (let i = 0; i < btns.length; i++) {
    btns[i].onclick = () => {

        render(btns[i].innerText)
    }
}
</script>


<?php ipView('admin.component.footer') ?>