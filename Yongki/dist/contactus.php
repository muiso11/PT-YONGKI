<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contac Us Yongki Mandiri</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
</head>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Produk</title>
    <!-- Favicon -->
    <link href="../dairy-website-template/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../dairy-website-template/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../dairy-website-template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../dairy-website-template/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../dairy-website-template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../dairy-website-template/css/style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php"; ?>

    <!-- Page Header Start -->
    <!-- <div class="container-fluid py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background-color: #000000;">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Contact Us</h1>
        </div>
    </div> -->
    <section class="jumbotron text-center p-3 bg-white text-dark">
        <h1 class="display-4">YONGKI MANDIRI GYPSUM</h1>
    </section>

    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Hubungi Kami</p>
                <h1 class="mb-5">Jika Anda Memiliki Pertanyaan, Silakan Hubungi Kami</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-4">Kontak Kami</h3>
                    <form action="prosespesancontact.php" method="post" onsubmit="showThankYouAlert()">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="nama_cu" placeholder="Nama Anda">
                                    <label for="name">Nama Anda</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email_cu" placeholder="Email Anda">
                                    <label for="email">Email Anda</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject_cu" placeholder="Subjek">
                                    <label for="subject">Subjek</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="pesan_cu" placeholder="Tinggalkan pesan di sini" id="message" style="height: 250px"></textarea>
                                    <label for="message">Pesan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary rounded-pill py-3 px-5" type="submit">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <h3 class="mb-4">Detail Kontak</h3>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                            <i class="fa fa-map-marker-alt text-body"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Kantor Kami</h6>
                            <span>Jl. Lampiri Raya No.10, RT.4/RW.12, Pd. Klp., Kec. Duren Sawit, Kota Jakarta Timur</span>
                        </div>
                    </div>
                    <div class="d-flex border-bottom pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                            <i class="fa fa-phone-alt text-body"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Hubungi Kami</h6>
                            <span>+62 822 1106 9727</span>
                        </div>
                    </div>
                    <div class="d-flex border-bottom-0 pb-3 mb-3">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                            <i class="fa fa-envelope text-body"></i>
                        </div>
                        <div class="ms-3">
                            <h6>Kirim Email</h6>
                            <span>yongkimandiri@example.com</span>
                        </div>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.0390976342478!2d106.93896767857!3d-6.2534279568515885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698ce1c3da43d1%3A0xdd84ac54a272c102!2sTOKO%20YONGKI%20MANDIRI!5e0!3m2!1sid!2sid!4v1701073775104!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- FOTTER -->

    <div class="mt-5 p-4 bg-dark text-white text-center">
        <div class="row g-5 pt-2 mb-5">
            <div class="col-sm-6">
                <img class="img-fluid mb-4" src="../dairy-website-template/img/about-us-50.png" alt="">
                <h5 class="mb-3">About Us</h5>
                <span>Yongki Mandiri adalah toko bahan bangunan yang berfokus pada Gypsum, produk kami telah tersebar di beberapa wilayah khususnya di wilayah Bekasi dan Jakarta</span>
            </div>
            <div class="col-sm-6">
                <img class="img-fluid mb-4" src="../dairy-website-template/img/product.png" alt="">
                <h5 class="mb-3">Media Sosial</h5>
                <span><i class="fa-regular fa-envelope"></i> : email</span><br>
                <span><i class="fa-brands fa-instagram"></i> : Instagram</span><br>
                <span><i class="fa-brands fa-whatsapp"></i> : aehsdodjjap</span>
            </div>
        </div>
    </div>

    <!-- FOTTER END -->


    <script>
        function showThankYouAlert() {
            alert("Terimakasih sudah mengirim form!");
        }
    </script>
</body>

</html>