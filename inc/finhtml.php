        
            </section><!-- /.content -->
        </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="js/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> 
        <!-- date-range-picker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- InputMask -->
        <script src="js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
        <script src="js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

            <!-- fileinput -->
            <script src="js/fileinput.js" type="application/javascript"></script>


        <script src="js/selectajax.js" type="text/javascript"></script>
        <script src="js/tipo_alimen.js" type="text/javascript" charset="utf-8" async defer></script>

        <!-- page script -->
        <script type="text/javascript">
                $(document).on('click','.borrar-lugar', function () {
                    var  id_lugar = $(this).val();
                    $.ajax({
                        url: 'pages/ajaxprocesardatos.php',
                        type: 'POST',
                        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        data: {post: 'borrar_lugar', id_lugar: id_lugar},
                    })
                    .done(function(data) {
                        //alert(data);
                        document.location.href='index.php?mod=lugares';
                        console.log("success");
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                });
            /*$(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });*/
            $("#example1").dataTable({
                "oLanguage": {
                    "sSearch": "Buscar:",
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Mostrando _START_ a _END_ de entradas _TOTAL_",
                    "oPaginate": {
                        "sNext": "",
                        "sPrevious": ""
                    }                    
                }
             } );
            $('#example2').dataTable({
                "oLanguage": {
                    "sSearch": "Buscar:",
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Mostrando _START_ a _END_ de entradas _TOTAL_",
                    "oPaginate": {
                        "sNext": "",
                        "sPrevious": ""
                    }                    
                }
            });
            //Date range picker
            $('#reservation').daterangepicker({format: 'DD/MM/YYYY'});
            //Money Euro
            $("[data-mask]").inputmask();
        </script>

    </body>
</html>