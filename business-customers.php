<?php
?>
<?php
include("../controller/business-customers.php");
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
                                                            <th>Customer Name</th>
                                                            <th>Customer Surname</th>
                                                            <th>Discount Name</th>
                                                            <th>Reservation Code</th>
                                                            <th>Discount Start Time</th>
                                                            <th>Discount End Time</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <!--                                                        --><?php
                                                        //                                                        foreach ($users
                                                        //
                                                        //                                                                 as $user) {
                                                        //
                                                        //                                                            echo "<tr>" .
                                                        //                                                                "<td>".$user->getUserName()."</td>".
                                                        //                                                                "<td>".$user->getUserSurname()."</td>".
                                                        //                                                                "<td>".$user->getDiscountName()."</td>".
                                                        //                                                                "<td>".$user->getReservationCode()."</td>".
                                                        //                                                                "<td>".$user->getStartTime()."</td>".
                                                        //                                                                "<td>".$user->getEndTime()."</td>".
                                                        //                                                                "</tr>" ;
                                                        //                                                        }?>
                                                        <tr>
                                                            <td>John</td>
                                                            <td>John</td>
                                                            <td>Xiamo Mi9</td>
                                                            <td>A124BN</td>
                                                            <td>05/05/2019</td>
                                                            <td>08/06/2019</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Michael</td>
                                                            <td>Don</td>
                                                            <td>Samsung SmartTV</td>
                                                            <td>C104BN</td>
                                                            <td>12/05/2019</td>
                                                            <td>09/06/2019</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Klaus</td>
                                                            <td>John</td>
                                                            <td>Macbook PRO</td>
                                                            <td>Y001NM</td>
                                                            <td>31/05/2019</td>
                                                            <td>12/06/2019</td>

                                                        </tr>
                                                        <tr>
                                                            <td>Juan</td>
                                                            <td>Mark</td>
                                                            <td>Apple Watch</td>
                                                            <td>D090NJ</td>
                                                            <td>01/06/2019</td>
                                                            <td>15/06/2019</td>

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

