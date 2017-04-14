<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <strong>Copyright &copy; <a href="http://www.uniminuto.edu/">Corporaci&oacute;n Universitaria Minuto de Dios</a></strong> Todos los derechos reservados.
</footer>


    <!-- jQuery 2.1.4 -->
    <!--<script src="<?= base_url() ?>dashboard/plugins/jQuery/jQuery-2.1.4.min.js"></script>-->
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url() ?>dashboard/bootstrap/js/bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="<?= base_url() ?>dashboard/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery Knob Chart -->
    <!--<script src="<?= base_url() ?>dashboard/plugins/knob/jquery.knob.js"></script>-->
    <!-- DataTables -->
    <script src="<?= base_url() ?>dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="<?= base_url() ?>dashboard/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?= base_url() ?>dashboard/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?= base_url() ?>dashboard/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?= base_url() ?>dashboard/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>dashboard/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dashboard/dist/js/app.min.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url() ?>dashboard/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="<?= base_url() ?>dashboard/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?= base_url() ?>dashboard/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?= base_url() ?>dashboard/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap-select-1.10.0/dist/js/bootstrap-select.min.js"></script>
    <script>
      $(function () {
        //DATATABLES
        $("#data_table1").DataTable();         
        
         //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

        $('.datepicker').datepicker({
          format: 'yyyy-mm-dd'
        });

        //Money Euro
        $("[data-mask]").inputmask();

        $("#btn_back").click(function(){
          parent.history.back();
          return false;
        });

      });
    </script>
  </body>
  </html>