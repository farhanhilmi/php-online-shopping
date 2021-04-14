<?php
include './layout/header.php';
require_once('./config.php');
require_once('./service.php');

$data = get_data($koneksi);
$product = $data[0];
$rating = $data[1];
?>

<main id="main">
  <div class="navigation-link">
    <a href="index.php">Home</a>
    <span><i class="fas fa-caret-right"></i></span>
    <a href="">Gadget</a>
    <span><i class="fas fa-caret-right"></i></span>
    <p><?php echo $product['name'] ?></p>
  </div>
  <hr class="mt-0 mb-4">
  <section class="detail-product">
    <div>
      <img src="https://1.bp.blogspot.com/-v9B7LyrX9UM/X9Y-GABw6dI/AAAAAAAAJ1g/VwnTspsf3IwN9swv2wQ_E0WuC1NvRU6uACLcBGAsYHQ/s1920/2.jpg" alt="" srcset="">
    </div>
    <div class="info">
      <h5><?php echo $product['name'] ?></h5>
      <div class="product-rating">
        <div>
          <i class="fa fa-star fa-sm text-warning"></i>
          <small id="rating"><?php echo $rating ?></small>

        </div>
        <div>
          <p>Stock <?php echo $product['qty'] ?></p>
        </div>
      </div>
      <h3>$<?php echo $product['price'] ?></h3>
      <hr>
      <div class="description">
        <p><?php echo $product['description'] ?>.</p>
      </div>
    </div>

    <div class="card-product">
      <div class="title">
        <h6>Product Quantity</h6>
      </div>
      <div class="body">
        <div class="increment">
          <span class="minus"><i class="fas fa-minus text-white"></i></span>
          <input type="text" id="qtyProduct" value="1" />
          <span class="plus"><i class="fas fa-plus text-white"></i></span>
        </div>

        <div>
          <div class="d-flex justify-content-between">
            <p>Total</p>
            <h5 id="totalPrice"></h5>
          </div>
          <button type="submit" class="btn" id="addToCart"><i class="fas fa-cart-plus"></i> Add to Cart</button>
        </div>
      </div>

      <div class="review-product">
        <h4>Rate this product</h4>
        <p class="hidden" id="afterRating">thank you for giving this product a rating</p>
        <form class="rating" id="productRating" method="POST">
          <label>
            <input type="radio" name="stars" value="1" />
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="2" />
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="3" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="4" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
          <label>
            <input type="radio" name="stars" value="5" />
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
            <span class="icon">★</span>
          </label>
        </form>
      </div>
    </div>
  </section>
</main>

<?php
include './layout/footer.php';
?>

<script>
  $(':radio').change(function(e) {
    e.preventDefault();

    const rateValue = this.value;
    setTimeout(function() {
      $('#productRating').removeClass('rating');
      $('#productRating').addClass('hidden');
      $('#afterRating').removeClass('hidden');
    }, 1000);
    $.post(
      "./service.php?act=rate", {
        id: "<?php echo $product['id_product'] ?>",
        rating: rateValue
      },
      function(response) {
        $('#rating').text(response);
        console.log('New product rating: ' + response);
      }
    );
  });

  const price = "<?php echo $product['price'] ?>";
  $('#totalPrice').text(`$${price}`);
  $('#qtyProduct').change(function() {
    const totalPrice = price * parseInt($('#qtyProduct').val());
    $('#totalPrice').text(`$${totalPrice}`);
  });

  $('#addToCart').click(function() {
    $.post(
      "./service.php?act=add_to_cart", {
        id: "<?php echo $product['id_product'] ?>",
        qty: $('#qtyProduct').val()
      },
      function(response) {
        console.log(response);
      }
    );
  });
</script>