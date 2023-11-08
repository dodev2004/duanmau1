<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<section class="admin-column_right">
    <h2 class="admin-column_right--title">Thống kê</h2>
    <span class="admin-column_right--linked"><b>Thống kê</b> - Danh sách thống kê</span>
    <div class="table table-category">
        <h1 style="font-size: 14px; color:#192A3E;
        margin-bottom:12px;">Bảng thống kê sản phẩm theo danh mục</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Số danh mục</th>
                <th>Danh mục</th>
                <th>SLSP</th>
                <th>Giá(Nhỏ nhất)</th>
                <th>Giá(Cao nhất)</th>
                <th>Giá(Trung Bình)</th>



            </tr>
            <?php
            $i   = 1;
            foreach ($tksps as $tksp) :

            ?>
                <tr>
                    <th style=" vertical-align: middle !important; width: 10%;"><?php echo $i ?></th>
                    <th style=" vertical-align: middle !important; width: 10%;"><?php echo $tksp["id"] ?></th>
                    <th class="id" style=" vertical-align: middle !important; width: 23%;"><?php echo $tksp["ten_danhMuc"] ?></th>
                    <th style=" vertical-align: middle !important; width: 10%;"><?php echo $tksp["so_luong"] ?> </th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo number_format($tksp["gia_min"], 0) ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo number_format($tksp["gia_max"], 0) ?></th>
                    <th style="vertical-align: middle !important;width:15%;"><?php echo number_format($tksp["gia_avg"], 0) ?></th>

                </tr>
            <?php ++$i;
            endforeach ?>


        </table>

        <div id="piechart" style="width: 100%; height: 500px;"></div>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    <?php
                        $length = count($tksps);

                        $i  = 0;
                        foreach($tksps as $tksp){
                            $i++;
                            if($i==$length){
                                echo "['" .$tksp["ten_danhMuc"]."'," .$tksp["so_luong"] . "]";
                            }
                            else {
                                echo "['" .$tksp["ten_danhMuc"]."'," .$tksp["so_luong"] . "],";
                            }
                        }
                       
                    ?>
                ]);

                var options = {
                    title: 'Thống kê số lượng sản phẩm theo danh mục'
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
    </div>

</section>