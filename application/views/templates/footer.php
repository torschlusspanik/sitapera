<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Bachtiarsh <?php echo date('Y'); ?> </a></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Keluar" untuk mengakhiri session</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->


<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="<?php echo base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<!-- <script src="<?php echo base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script> -->

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

<!-- Sweetalert -->
<script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/buttons.flash.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>datatables/buttons.print.min.js"></script>

<script>
    $(function() {
        $("#table-id").DataTable();
        $('#id-table').DataTable();
        $("#table-table").DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<script>
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Konfirmasi Hapus Data',
            text: 'Klik hapus untuk menghapus data',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>

<script>
    $('#tombol-logout').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Klik keluar untuk mengakhiri session',
            type: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Keluar'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>



</body>

</html>