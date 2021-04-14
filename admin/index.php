<?php
include './layout/header.php';
?>

<main id="main">

  <section class="top-box">
    <a href="">
      <div class="wrapper">
        <div>
          <i class="fas fa-users"></i>
        </div>
        <div>
          <h6>3,555</h6>
          <p>Total Customers</p>
        </div>
      </div>
    </a>
    <a href="">
      <div class="wrapper">
        <div>
          <i class="fas fa-shopping-bag"></i>
        </div>
        <div>
          <h6>3,555</h6>
          <p>Total Orders</p>
        </div>
      </div>
    </a>
    <a href="">
      <div class="wrapper">
        <div>
          <i class="fas fa-tshirt"></i>
        </div>
        <div>
          <h6>3,555</h6>
          <p>Total Products</p>
        </div>
      </div>
    </a>
    <a href="">
      <div class="wrapper">
        <div>
          <i class="fas fa-money-bill-wave"></i>
        </div>
        <div>
          <h6>3,555</h6>
          <p>Total Earnings</p>
        </div>
      </div>
    </a>
  </section>

  <section class="top-selling">
    <table id="table_topSelling" class="table tbl_topSelling table-borderless bg-white text-center">
      <thead>
        <tr>
          <th scope="col">PRODUCT NAME</th>
          <th scope="col">DATE TIME</th>
          <th scope="col">PRICE</th>
          <th scope="col">QUANTITY</th>
          <th scope="col">AMOUNT</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
      </tbody>
    </table>

    <a href="banners.php" class="wrapper-banner">
      <div class="top-banners" id="top-banners">
        <div>
          <div>
            <img src="../assets/img/banner-ilustration.png" alt="" srcset="">
          </div>
          <p>Set the banner on the website</p>
        </div>
        <div id="topbannerHover"></div>
      </div>
    </a>
  </section>

</main>

<?php
include './layout/footer.php';
?>