</div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Copyright by <a href="#">Group 6</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo LIBS_URL ?>jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo LIBS_URL ?>popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo LIBS_URL ?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo LIBS_URL ?>perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo EXTRA_LIBS_URL ?>sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo JS_URL ?>waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo JS_URL ?>sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo JS_URL ?>custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <script src="<?php echo EXTRA_LIBS_URL ?>multicheck/datatable-checkbox-init.js"></script>
    <script src="<?php echo EXTRA_LIBS_URL ?>multicheck/jquery.multicheck.js"></script>
    <script src="<?php echo EXTRA_LIBS_URL ?>DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable({
                columnDefs: [{
                targets: 1, // Chỉ định cột cuối cùng
                searchable: false, // Tắt tính năng tìm kiếm
                orderable: false // Tắt tính năng sắp xếp
            }]
        });
    </script>
    <!-- Charts js Files -->
    <script src="<?php echo LIBS_URL ?>flot/excanvas.js"></script>
    <script src="<?php echo LIBS_URL ?>flot/jquery.flot.js"></script>
    <script src="<?php echo LIBS_URL ?>flot/jquery.flot.pie.js"></script>
    <script src="<?php echo LIBS_URL ?>flot/jquery.flot.time.js"></script>
    <script src="<?php echo LIBS_URL ?>flot/jquery.flot.stack.js"></script>
    <script src="<?php echo LIBS_URL ?>flot/jquery.flot.crosshair.js"></script>
    <script src="<?php echo LIBS_URL ?>flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo JS_URL ?>pages/chart/chart-page-init.js"></script>
    <!-- Form Page JS -->
    <script src="<?php echo LIBS_URL ?>inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="<?php echo JS_URL ?>pages/mask/mask.init.js"></script>
    <script src="<?php echo LIBS_URL ?>select2/dist/js/select2.full.min.js"></script>
    <script src="<?php echo LIBS_URL ?>select2/dist/js/select2.min.js"></script>
    <script src="<?php echo LIBS_URL ?>jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="<?php echo LIBS_URL ?>jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="<?php echo LIBS_URL ?>jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="<?php echo LIBS_URL ?>jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="<?php echo LIBS_URL ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo LIBS_URL ?>quill/dist/quill.min.js"></script>
    <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>

    <!-- Page Garrelly Script -->

    <script src="<?php echo LIBS_URL ?>magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo LIBS_URL ?>magnific-popup/meg.init.js"></script>

    <!-- Page element js -->
    <script src="<?php echo LIBS_URL ?>toastr/build/toastr.min.js"></script>
    <script>
        $(function(){
            // Success Type
            $('#ts-success').on('click', function() {
                toastr.success('Have fun storming the castle!', 'Miracle Max Says');
            });

            // Success Type
            $('#ts-info').on('click', function() {
                toastr.info('We do have the Kapua suite available.', 'Turtle Bay Resort');
            });

            // Success Type
            $('#ts-warning').on('click', function() {
                toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');
            });

            // Success Type
            $('#ts-error').on('click', function() {
                toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');
            });
        });
    </script>

<script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="dist/js/custom.min.js"></script> 
<script src="assets/libs/flot/jquery.flot.js"></script>
<script src="assets/libs/flot/jquery.flot.pie.js"></script>
<script src="assets/libs/chart/matrix.charts.js"></script>

</body>

</html>