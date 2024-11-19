




<div class="row">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div class="container mt-3">
    <!-- Nút chuyển đổi giới tính -->
    <a href="?url=admin/thongke&ma_loai=1"> <button class="btn gender-btn" >Nam</button> </a>
    <a href="?url=admin/thongke&ma_loai=2"> <button class="btn gender-btn" >Nữ</button> </a>
   
  </div>
  <div class="container">
    <div id="piechart" class="mt-5" style="width: 900px; height: 500px;"></div>
  
  </div>

  <script type="text/javascript">
    // Load Google Charts
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Vẽ biểu đồ
    function drawChart() {

      // Tạo dữ liệu
      var data = google.visualization.arrayToDataTable([
        ['Danh Mục', 'Số lượng']
        <?php foreach ($thongKe as $key => $tk) : ?>
          ,['<?=$tk['ten_danh_muc']?>', <?=$tk['so_luong']?>]
         <?php endforeach ?>
      
        // ['Danh Mục', 'Số lượng'],
        // ['Danh Mục 1', 11],
        // ['Danh Mục 2', 2],
        // ['Danh Mục 3', 2],
        // ['Danh Mục 4', 2],
        // ['Danh Mục 5', 7]
      ]);

      // Tùy chỉnh biểu đồ
      var options = {
        title: 'Biểu Đồ Thống Kê Sản Phẩm Theo Danh Mục'
      };

      // Vẽ biểu đồ trên element có id là 'piechart'
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
</div>




<!-- Biểu đồ đường  -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">
<div class="container mt-3">
    <!-- Nút chuyển đổi giới tính -->
    <!-- <a href="?url=admin/thongke&time=day"> <button class="btn gender-btn" >Theo ngày</button> </a>
    <a href="?url=admin/thongke&time=moth"> <button class="btn gender-btn" >Theo tháng</button> </a> -->
   
  </div>
  <div class="container">
  <canvas id="ordersChart" width="400" height="200"></canvas>
  </div>
<script>
var ctx = document.getElementById('ordersChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
        <?php foreach ($thongkeDonHang as $key => $value) :?>
         '<?=$value['thoi_gian']?>',
          <?php endforeach ?>
       
        
        ],
        datasets: [{
            label: 'Số đơn hàng',
            data: [
              <?php foreach ($thongkeDonHang as $key => $value) :?>
              <?=$value['so_don_hang']?>,
          <?php endforeach ?>
             
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    
});
</script>

</div>






<style>
  /* Định nghĩa màu mặc định và màu hover cho nút */
  .gender-btn {
    background-color: #007bff; /* Màu nền mặc định */
    color: white; /* Màu chữ */
    border-color: #007bff; /* Màu viền */
  }

  .gender-btn:hover {
    background-color: #0056b3; /* Màu nền khi hover */
    border-color: #0056b3; /* Màu viền khi hover */
  }
</style>