<?php
include './layout/header.php';
require_once('./config.php');
?>

<main id="main">
  <div class="top-content">
    <div id="carousel-example" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner row w-100 mx-auto" role="listbox">
        <?php
        $query = mysqli_query($koneksi, "SELECT * from tbl_top_banner");
        while ($banner = mysqli_fetch_array($query)) {
        ?>
          <div class="carousel-item col-12 col-sm-6 col-md-4 col-lg-4">
            <img src="./assets/img/banners/<?php echo $banner['img'] ?>" class="img-fluid mx-auto d-block" alt="img1">
          </div>
        <?php } ?>

      </div>
      <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <section class="category">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_categories ORDER BY id_category Desc");
    while ($result = mysqli_fetch_array($query)) { ?>
      <a href="#">
        <div class="wrapper-category">
          <div>
            <img src="./assets/img/category/<?php echo $result['logo'] ?>" alt="" srcset="">
          </div>
          <h5><?php echo $result['name'] ?></h5>
        </div>
      </a>
    <?php } ?>
  </section>

  <section class="products">
    <h5>All Products</h5>
    <div class="product-content">
      <?php
      $query = mysqli_query($koneksi, "SELECT tbl_products.*, tbl_categories.name as category  FROM tbl_products LEFT JOIN tbl_categories ON tbl_products.id_category = tbl_categories.id_category ORDER BY created_at Desc");
      while ($result = mysqli_fetch_array($query)) {
        $link = preg_replace('/\s+/', '-', $result['id_product'] . '-' . $result['name']);

        if ($result['total_rating'] == '0') {
          $rating = 0;
        } else {
          $rating = round(((float)$result['rating'] / (int)$result['total_rating']), 1);
        }

      ?>
        <div class="product-wrapper">
          <a href="product_detail.php?product=<?php echo strtolower($link) ?>">
            <div class="img-wrapper">
              <img src="./assets/img/products/<?php echo $result['img'] ?>" alt="" srcset="">
            </div>
            <div class="description">
              <p><?php echo $result['name'] ?></p>
              <h5>Rp <?php echo $result['price'] ?></h5>
              <p class="shop-name">famizone</p>
              <div class="subtitle">
                <div>
                  <i class="fa fa-star fa-sm"></i>
                  <small><?php echo $rating ?></small>

                </div>
                <div>
                  <p>Stock <?php echo $result['qty'] ?></p>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </section>
</main>

<?php
include './layout/footer.php';
?>