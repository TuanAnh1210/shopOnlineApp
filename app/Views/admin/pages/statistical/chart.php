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
        <h2>Biểu đồ</h2>
    </div>

    <div class="prdManage_header">
        <div class="prdManage_tit">
            <h3>Thống kê sản phẩm theo loại</h3>
            <div class="prdManage_form">

                <a href="<?= $GLOBALS["domainPage"] ?>"><button class="btn_addPrd">Trang
                        chủ</button></a>
            </div>
        </div>



        <div id="piechart_3d" style="margin: auto ;width: 900px; height: 500px;"></div>
    </div>



</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // handle get data from db and convert arr php to arr js
    const listCate = <?= json_encode($listCate) ?>;
    const domainPage = <?= json_encode($GLOBALS['domainPage']) ?>;

    listCate.forEach(element => {
        for (let i in element) {
            if (!isNaN(Number(i))) {
                delete element[i];
            }
        }
    });

    // convert data to data of chart
    const infoChart = [...listCate].map(item => [item.name, item.quantity])


    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ...infoChart
        ]);

        var options = {
            title: 'Biểu đồ thống kế',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<?php ipView('admin.component.footer') ?>