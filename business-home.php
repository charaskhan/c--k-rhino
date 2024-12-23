<?php
include("../controller/business-home.php");
?>


<!DOCTYPE html>
<html>

<?php include("../view/commons/business-header.php"); ?>

<section style="margin-bottom: 0px;" id="">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"
                      enctype="multipart/form-data">
                    <div class="d-flex align-items-stretch">
                        <div class="page-holder w-100 d-flex flex-wrap">
                            <div class="container-fluid px-xl-5">
                                <section class="py-5">

                                    <div class="row">
                                        <div class="col-lg-12 mb-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h6 class="text-uppercase mb-0">Discounts</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table class="table card-text">
                                                        <thead>
                                                        <tr>
                                                            <th>Discount Name</th>
                                                            <th>Value</th>
                                                            <th>Start Time</th>
                                                            <th>End Time</th>
                                                            <th>Category</th>
                                                            <th>Is Active</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php
//                                                        foreach ($discounts
//
//                                                        as $discount) {
//
//                                                            echo "<tr>" .
//                                                                "<td>".$discount->getName()."</td>".
//                                                                "<td>".$discount->getValue()."</td>".
//                                                                "<td>".$discount->getStartTime()."</td>".
//                                                                "<td>".$discount->getEndTime()."</td>".
//                                                                "<td>".$discount->getName()."</td>".
//                                                                "<td>".$discount->getIsActive()."</td>".
//                                                                "</tr>" ;
//                                                        }?>
                                                        <tr>
                                                            <td>Xiamo Mi9</td>
                                                            <td>-20%</td>
                                                            <td>05/05/2019</td>
                                                            <td>08/06/2019</td>
                                                            <td>Smartphone</td>
                                                            <td>Yes</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Samsung SmartTV</td>
                                                            <td>-30%</td>
                                                            <td>12/05/2019</td>
                                                            <td>09/06/2019</td>
                                                            <td>SmartTVe</td>
                                                            <td>Yes</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Macbook PRO</td>
                                                            <td>-15%</td>
                                                            <td>31/05/2019</td>
                                                            <td>12/06/2019</td>
                                                            <td>Laptop</td>
                                                            <td>Yes</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Printer</td>
                                                            <td>-25%</td>
                                                            <td>30/05/2019</td>
                                                            <td>2/06/2019</td>
                                                            <td>Utility</td>
                                                            <td>No</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Earbuds</td>
                                                            <td>-35%</td>
                                                            <td>30/05/2019</td>
                                                            <td>2/06/2019</td>
                                                            <td>Accessory</td>
                                                            <td>No</td>

                                                        </tr>




                                                        </tbody>
                                                    </table>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>

    </div>
    </div>

    </div>

    </div>

</section>
</body>
</html>
