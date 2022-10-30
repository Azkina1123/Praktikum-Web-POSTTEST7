            <div class="product wrapper">
              <div class="img" style="background-image: url('img/products/<?= $product["image"]; ?>')"></div>

              <div class="description">

                <div>
                  <h1> <?= $product["name"]; ?> </h1>
                  <h2> IDR <?= $product["price"]; ?> </h2>
                  <p> <?= $product["description"]; ?> </p>
                </div>

                <div>
                  <table cellspacing="5">
                    <tr>
                      <td> <b> Size </b> </td>
                      <td>
                        <center>:</center>
                      </td>
                      <td> <?= $product["width"]; ?> x <?= $product["height"]; ?> cm </td>
                    </tr>
                    <tr>
                      <td> <b> Net </b> </td>
                      <td>
                        <center>:</center>
                      </td>
                      <td> <?= $product["net"]; ?> g </td>
                    </tr>

                    <?php if ($product_type == "painting") { ?>

                      <tr>
                        <td> <b> Frame </b> </td>
                        <td>
                          <center>:</center>
                        </td>
                        <td> <?= $product["frame"]; ?> </td>
                      </tr>
                      <tr>
                        <td> <b> Technic </b> </td>
                        <td>
                          <center>:</center>
                        </td>
                        <td> <?= $product["technic"]; ?> </td>
                      </tr>

                    <?php } else if ($product_type == "tool") { ?>

                      <tr>
                        <td> <b> Material </b> </td>
                        <td>
                          <center>:</center>
                        </td>
                        <td> <?= $product["material"]; ?> </td>
                      </tr>
                      <tr>
                        <td> <b> Packing List </b> </td>
                        <td>
                          <center>:</center>
                        </td>
                        <td> <?= $product["packing_list"]; ?> </td>
                      </tr>

                    <?php } ?>

                    <tr>
                      <td> <b> Stock </b> </td>
                      <td>
                        <center>:</center>
                      </td>
                      <td> <?= $product["stock"]; ?> </td>
                    </tr>

                  </table>
                </div>

                <div>
                  <a href="#" onclick="notAvailableAlert()"> <button> Check Out Now! </button> </a>
                  <a href="#" onclick="notAvailableAlert()"> <button> Add to Cart </button> </a>
                </div>

              </div> <!-- /description -->

            </div> <!-- /prodct-wrapper -->