<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $title; ?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url('vendor/'); ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url('vendor/'); ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url('vendor/'); ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('vendor/'); ?>assets/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

    <!-- =======================================================
  * Template Name: OnePage - v4.7.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="#hero"><?php echo $profile['nama_website']; ?></a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#cta">Hubungi Kami</a></li>
                    <li><a class="getstarted scrollto" href="<?php echo base_url('auth/index'); ?>">Masuk</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- ======= Hero ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1>Selamat Datang</h1>
                    <h2>Sistem Informasi pelayanan desa <?php echo $profile['nama_desa']; ?></h2>
                </div>
            </div>
            

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tentang Desaku</h2>
                    <p>Desaku adalah sistem informasi pelayanan masyarakat berbasis web </p>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                        Sistem ini memudahkan untuk melakukan tugas kantor desa, termasuk administrasi kependudukan, perencanaan, pelaporan, pengelolaan asset, pengelolaan anggaran, aplikasi pelayana desa, aplikasi surat menyurat desa dan lain sebagainya
                        </p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <a href="#contact" class="btn-learn-more">Learn more</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->






    
        <!-- ======= cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Hubungi kami lebih cepat via whatsapp</h3>
                    <p> Fasilitas pelayanan lebih cepat dengan menghubungi kantor pelayanan desa dengan pesan pribadi ke whatsapp desa.</p>
                    <a class="cta-btn" href="https://api.whatsapp.com/send?phone=<?php echo $profile['whatsapp_desa']; ?>" target="_blank">Chat via Whatsapp</a>
                </div>
            </div>
        </section><!-- End cta Section -->




        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak Kami</h2>
                    <p>Untuk mendaftar akun silahkan kontak dibawah ini :</p>
                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" src="<?php echo $profile['map_desa']; ?>" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat :</h4>
                                <p><?php echo $profile['alamat_desa']; ?></p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><?php echo $profile['email_desa']; ?></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-telephone"></i>
                                <h4>Telp:</h4>
                                <p><?php echo $profile['telp_desa']; ?></p>
                            </div>


                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="<?php echo base_url('web/input_pesan'); ?>" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="nama_pesan" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control" name="email_pesan" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subyek_pesan" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="pesan" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span><?php echo $profile['nama_website']; ?></span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url('vendor/'); ?>assets/vendor/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url('vendor/'); ?>assets/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url('vendor/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('vendor/'); ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url('vendor/'); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url('vendor/'); ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- <script src="<?php echo base_url('vendor/'); ?>assets/vendor/php-email-form/validate.js"></script> -->
    <script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url('vendor/'); ?>assets/js/main.js"></script>

</body>

</html>