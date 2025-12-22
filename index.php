<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>mini e-commerce project</title>
  </head>
  <body>
    <!-- header part -->
    <!-- inline css is used here. -->
    <header>
      <h1
        style="
          text-align: center;
          border: 2px solid salmon;
          background-color: bisque;
          padding: 10px;
          border-radius: 10px;
        "
      >
        Mini e-commerce site in PHP language.
      </h1>
    </header>

    <!-- main part -->
    <main>
      <section>
        <h2 style="text-align:center">Welcome to our mini e-commerce site!</h2>
        <p style="text-align: center">
          This is a simple e-commerce project built using PHP. Browse our
          products and enjoy shopping!
        </p>
        <p style="text-align:center">
          <a href="cart.php">View Cart</a>
        </p>
      </section>



      <section>

      <?php
          require_once "products_data.php";
          session_start();

      ?>
          <?php
              foreach ($products as $product):
          ?>
        <div style=" display:flex; justify-content:center; align-items: center;">
          <div style="border: 1px solid gray; padding: 50px; margin: 10px;">
            <h3>
              <?php echo $product->get_title(); ?>
            </h3>
            <img
              src="<?php echo $product->get_image(); ?>"
              alt="<?php echo $product->get_title(); ?>"
              style="width: 200px; height: 200px;"
            /><br />
            <p>Price: $
              <?php echo $product->get_price(); ?>
            </p>
            <form method="post" action="add_to_cart.php">
              <input
                type="hidden"
                name="product_id"
                value="<?php echo $product->get_id(); ?>"
              />
              <input type="submit" value="Add to Cart" />
            </form>
          </div>
        </div>

            <?php
                endforeach;
            ?>

          ?>

      </section>


    </main>
  </body>
</html>
