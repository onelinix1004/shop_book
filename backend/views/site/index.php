<?php
// Đếm số lượng bản ghi trong các bảng User, Orders, Product và Contact
$countUser = backend\models\User::find()->count();
$countOrders = backend\models\Orders::find()->count();
$countProduct = backend\models\Product::find()->count();
$countContact = backend\models\Contact::find()->count();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-user" style="color: #FFD43B;"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">User</p>
                                <p class="card-title"><?= $countUser ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Update Now
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-cart-shopping fa-2xs" style="color: #63E6BE;"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Order</p>
                                <p class="card-title"><?= $countOrders ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Update Now
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-solid fa-book" style="color: #B197FC;"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Book</p>
                                <p class="card-title"> <?= $countProduct ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Update Now
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa-brands fa-twitter" style="color: #74C0FC;"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Contact</p>
                                <p class="card-title"><?= $countContact ?><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-refresh"></i>
                        Update now
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Users Behavior</h5>
                </div>
                <div class="card-body ">
                    <canvas id=myChart width="400" height="100"></canvas>
                </div>
                <div class="card-footer ">
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Revenue Category</h5>
                </div>
                <div class="card-body ">
                    <canvas id="myPieChart" width="200" height="200"></canvas>
                </div>
                <div class="card-footer ">
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Activity Order</h5>
                </div>
                <div class="card-body">
                    <!-- Order and Status Information -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= date('d/m/Y', strtotime($order['updated_at'])) ?></td>
                                <td><?= $order['status'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="chart-legend">
                        <i class="fa fa-circle text-info"></i> Orders
                        <i class="fa fa-circle text-warning"></i> Revenue
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Dữ liệu đồ thị hình chữ nhật
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Doanh thu',
                data: <?php echo json_encode($data); ?>,
                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            animations: {
                radius: {
                    duration: 400,
                    easing: 'linear',
                    loop: (context) => context.active
                }
            },
        }
    });

    // Dữ liệu đồ thị hình tròn
    var ctx2 = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($categoryLabels); ?>,
            datasets: [{
                label: 'Doanh thu',
                data: <?php echo json_encode(array_column($categoryData, 'total')); ?>,
                backgroundColor: <?php echo json_encode($bgColors); ?>,
            }]
        },
        options: {
            responsive: true,
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'Biểu đồ doanh thu theo danh mục sản phẩm',
            },
            animation: {
                animateScale: true,
                animateRotate: true,
            },
        }
    });
</script>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Best Rating Book</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-md-2">#</th>
                            <th class="col-md-5">Product Name</th>
                            <th class="col-md-5">Total Rating</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($bestRatingProducts as $product): ?>

                            <tr>
                                <td class="col-md-2"><?= $counter ?></td>
                                <td class="col-md-6"><?= $product['name'] ?></td>
                                <td class="col-md-6"><?= $product['avg_rating'] ?></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Best View Book</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col-md-2">#</th>
                            <th class="col-md-5">Product Name</th>
                            <th class="col-md-5">Total View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter = 1; ?>
                        <?php foreach ($bestViewProducts as $product): ?>
                            <tr>
                                <td class="col-md-2"><?= $counter ?></td>
                                <td class="col-md-5"><?= $product['name'] ?></td>
                                <td class="col-md-5"><?= $product['total_views'] ?></td>
                            </tr>
                            <?php $counter++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
