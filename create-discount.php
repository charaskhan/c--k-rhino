<?php
include("../controller/add-product.php");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!-- Date & Time Picker CSS -->
    <link rel="stylesheet" href="css/components/datepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/timepicker.css" type="text/css" />
    <link rel="stylesheet" href="css/components/daterangepicker.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="css/stylesheet.css" type="text/css">


    <!-- Bootstrap File Upload CSS -->
    <link rel="stylesheet" href="css/components/bs-filestyle.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

</head>

<body class="stretched">


<div style="max-width: 400px; background-color: rgba(255,255,255,0.93);" class="divcenter noradius noborder">
    <form action="create-discount.php" method="post" id="" class="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="discountName">Discount Name</label>
            <input type="text" class="form-control" id="discountName" placeholder="Discount Name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="value">Value</label>
            <input type="text" class="form-control" name="value" id="value" placeholder="Value">
        </div>


            <div class="form-group">
                <label for="product">Product</label>
                <select id="product" class="form-control" name="product">
                   <?
                   foreach($products as $product){
                       echo '<option value="'. $product->getID().'">'.$product->getName().'</option>';
                   }
                   ?>
                </select>
            </div>
        <div class="form-group">
            <label for="discounttype">Discount Type</label>
            <select id="discounttype" class="form-control" name="discounttype">
                <option value="1">Me afat kohor</option>
                <option value="2">Me limit personash</option>
                <option value="3">Per personin e pare</option>
            </select>
        </div>



        <div class="input-daterange travel-date-group bottommargin-sm">

            <label for="">Start Time</label>
            <div class="input-group">
                <input type="text" value="" class="form-control tleft past-enabled" placeholder="MM/DD/YYYY" name="starttime">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                </div>
            </div>

        </div>

        <div class="input-daterange travel-date-group bottommargin-sm">

            <label for="">End Time</label>
            <div class="input-group">
                <input type="text" value="" name="endtime" class="form-control tleft past-enabled" placeholder="MM/DD/YYYY">
                <div class="input-group-append">
                    <div class="input-group-text"><i class="icon-calendar2"></i></div>
                </div>
            </div>

        </div>


        <div class="form-group">
            <label>Image of product</label><br>
            <div class="file-input file-input-new">
                <div class="kv-upload-progress kv-hidden" style="display: none;"><div class="progress">
                        <div class="progress-bar bg-success progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                            0%
                        </div>
                    </div></div><div class="clearfix"></div>
                <div class="input-group file-caption-main">
                    <div class="file-caption form-control kv-fileinput-caption" tabindex="500">
                        <span class="file-caption-icon"></span>
                        <input class="file-caption-name" onkeydown="return false;" onpaste="return false;" placeholder="Select files...">
                    </div>
                    <div class="input-group-btn input-group-append">
                        <button type="button" tabindex="500" title="Clear selected files" class="btn btn-default btn-secondary fileinput-remove fileinput-remove-button"><i class="icon-trash"></i>  <span class="hidden-xs">Remove</span></button>
                        <button type="button" tabindex="500" title="Abort ongoing upload" class="btn btn-default btn-secondary kv-hidden fileinput-cancel fileinput-cancel-button"><i class="icon-ban-circle"></i>  <span class="hidden-xs">Cancel</span></button>
                        <button type="submit" tabindex="500" title="Upload selected files" class="btn btn-default btn-secondary fileinput-upload fileinput-upload-button"><i class="icon-upload"></i>  <span class="hidden-xs">Upload</span></button>
                        <div tabindex="500" class="btn btn-primary btn-file"><i class="icon-folder-open"></i>&nbsp;  <span class="hidden-xs">Browse …</span><input id="input-11" name="input11[]" type="file" multiple="" class="" accept="image/*" data-show-preview="false"></div>
                    </div>
                </div></div>
        </div>

        <button type="submit" class="btn btn-primary btn-file" name="save">Publish Discount</button>
    </form>
</div>
<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">


    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-body">
                            <div class="modal-content clearfix">
                                <div class="modal-body">
                                    <h4>Date &amp; Time Picker in a modal</h4>
                                    <input type="text" class="form-control datetimepicker-input datetimepicker3 tleft" data-toggle="datetimepicker" data-target=".datetimepicker3" placeholder="00:00 AM/PM" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </section><!-- #content end -->


</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script src="js/jquery.js"></script>
<script src="js/plugins.js"></script>


<!-- Date & Time Picker JS -->
<script src="js/components/moment.js"></script>
<script src="js/components/datepicker.js"></script>
<script src="js/components/timepicker.js"></script>

<!-- Include Date Range Picker -->
<script src="js/components/daterangepicker.js"></script>

<!-- Footer Scripts
============================================= -->
<script src="js/functions.js"></script>

<script>
    $(function() {
        $('.travel-date-group .default').datepicker({
            autoclose: true,
            startDate: "today",
        });

        $('.travel-date-group .today').datepicker({
            autoclose: true,
            startDate: "today",
            todayHighlight: true
        });

        $('.travel-date-group .past-enabled').datepicker({
            autoclose: true,
        });
        $('.travel-date-group .format').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
        });

        $('.travel-date-group .autoclose').datepicker();

        $('.travel-date-group .disabled-week').datepicker({
            autoclose: true,
            daysOfWeekDisabled: "0"
        });

        $('.travel-date-group .highlighted-week').datepicker({
            autoclose: true,
            daysOfWeekHighlighted: "0"
        });

        $('.travel-date-group .mnth').datepicker({
            autoclose: true,
            minViewMode: 1,
            format: "mm/yy"
        });

        $('.travel-date-group .multidate').datepicker({
            multidate: true,
            multidateSeparator: " , "
        });

        $('.travel-date-group .input-daterange').datepicker({
            autoclose: true
        });

        $('.travel-date-group .inline-calendar').datepicker();

        $('.datetimepicker').datetimepicker({
            showClose: true
        });

        $('.datetimepicker1').datetimepicker({
            format: 'LT',
            showClose: true
        });

        $('.datetimepicker2').datetimepicker({
            inline: true,
            sideBySide: true
        });

        $('.datetimepicker3').datetimepicker();

    });

    $(function() {
        // .daterange1
        $(".daterange1").daterangepicker({
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light"
        });

        // .daterange2
        $(".daterange2").daterangepicker({
            "opens": "center",
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            },
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light"
        });

        // .daterange3
        $(".daterange3").daterangepicker({
                singleDatePicker: true,
                showDropdowns: true
            },
            function(start, end, label) {
                var years = moment().diff(start, 'years');
                alert("You are " + years + " years old.");
            });

        // reportrange
        function cb(start, end) {
            $(".reportrange span").html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        cb(moment().subtract(29, 'days'), moment());

        $(".reportrange").daterangepicker({
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light",
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        // .daterange4
        $(".daterange4").daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
            "buttonClasses": "button button-rounded button-mini nomargin",
            "applyClass": "button-color",
            "cancelClass": "button-light"
        });

        $(".daterange4").on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $(".daterange4").on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

    });

</script>

</body>
</html>