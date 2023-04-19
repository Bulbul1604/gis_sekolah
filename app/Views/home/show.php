<!--
=========================================================
* Material Kit 2 - v3.0.4
=========================================================
* Product Page:  https://www.creative-tim.com/product/material-kit
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com
 =========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('home/_head') ?>
</head>

<body class="index-page bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid px-0">
                        <a class="navbar-brand font-weight-bolder ms-sm-3" href="<?= base_url('/') ?>">
                            <i class="fas fa-map-marker-alt me-1" style="color: #344767;"></i> Geografis Sekolah Bontang
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
                            <ul class="navbar-nav navbar-nav-hover ms-auto">
                                <li class="nav-item ms-lg-auto me-2">
                                    <a href="<?= site_url('/') ?>" class="btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0">Kembali</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> <!-- /nav -->
            </div> <!-- /col-12 -->
        </div> <!-- /row -->
    </div> <!-- /container -->


    <section class="pt-5 mt-5">
        <div class="container">
            <div class="card box-shadow-xl overflow-hidden mb-5">
                <div class="row">
                    <div class="col-lg-5 position-relative" style="background-image: url('../assets/images/sekolah/1681264826_6546c23fb99d36776a91.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat;" loading="lazy">
                        <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                            <div class="mask bg-gradient-primary opacity-8"></div>
                            <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                                <h5 class="text-white">(<?= $sekolah->sek_npsn ?>) <br /> <?= strtoupper($sekolah->sek_nama) ?></h5>
                                <p class="text-white opacity-8 mb-4 font-weight-bold text-sm"><?= strtoupper($sekolah->sek_jenjang) ?> / Sederajat <?= ucwords($sekolah->sek_status) ?> <br /> Akreditasi : <?= strtoupper($sekolah->det_akreditasi) ?> | Kurikulum : <?= strtoupper($sekolah->det_kurikulum) ?></p>
                                <div class="d-flex p-2 text-white">
                                    <div>
                                        <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span class="text-sm opacity-8  font-weight-bold"><?= ucwords($sekolah->sek_alamat) ?>, Kel. <?= ucwords($sekolah->kel_name) ?>, Kec. <?= ucwords($sekolah->kec_name) ?></span>
                                    </div>
                                </div>
                                <div class="d-flex p-2 text-white">
                                    <div>
                                        <i class="fa fa-user text-xs" aria-hidden="true"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span class="text-sm opacity-8 font-weight-bold"><?= ucwords($sekolah->det_guru) ?> Guru</span>
                                    </div>
                                </div>
                                <div class="d-flex p-2 text-white">
                                    <div>
                                        <i class="fa fa-male" aria-hidden="true"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span class="text-sm opacity-8 font-weight-bold"><?= ucwords($sekolah->det_siswa_l) ?> Siswa Laki-laki</span>
                                    </div>
                                </div>
                                <div class="d-flex p-2 text-white">
                                    <div>
                                        <i class="fas fa-female" aria-hidden="true"></i>
                                    </div>
                                    <div class="ps-3">
                                        <span class="text-sm opacity-8 font-weight-bold"><?= ucwords($sekolah->det_siswa_p) ?> Siswa Perempuan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 px-0">
                        <div id="map" style="height: 50rem;"></div>
                    </div>
                </div> <!-- /row -->
            </div> <!-- /card -->
        </div> <!-- /container -->
    </section> <!-- /pt-5 mt-5 -->

    <!-- Footer -->
    <?= $this->include('home/_footer') ?>

    <?= $this->include('home/_script') ?>

    <script>
        const map = L.map('map', {
            attributionControl: false,
            zoomControl: false,
            minZoom: 18,
            maxZoom: 18
        }).setView([<?= $sekolah->sek_lokasi ?>], 20);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', ).addTo(map);

        var sdIcon = L.icon({
            iconUrl: '<?= base_url() ?>assets/images/icon/sd.png',
            iconAnchor: [16, 0],
            iconSize: [30, 30],
        });
        var smpIcon = L.icon({
            iconUrl: '<?= base_url() ?>assets/images/icon/smp.png',
            iconAnchor: [16, 0],
            iconSize: [30, 30],
        });
        var smaIcon = L.icon({
            iconUrl: '<?= base_url() ?>assets/images/icon/sma.png',
            iconAnchor: [16, 0],
            iconSize: [30, 30],
        });
        L.marker([<?= $sekolah->sek_lokasi ?>],
            <?php if ($sekolah->sek_jenjang == 'sd') : ?> {
                    icon: sdIcon
                }
            <?php elseif ($sekolah->sek_jenjang == 'smp') : ?> {
                    icon: smpIcon
                }
            <?php elseif ($sekolah->sek_jenjang == 'sma') : ?> {
                    icon: smaIcon
                }
            <?php endif; ?>
        ).bindPopup(`
            <ul class="list-group list-group-flush">
                <li class="list-group-item"></li>
                <li class="list-group-item text-primary font-weight-bold"><?= strtoupper($sekolah->sek_npsn) ?></li>
                <li class="list-group-item text-muted"><?= strtoupper($sekolah->sek_nama) ?></li>
                <li class="list-group-item text-muted"><span class="fw-bold">Alamat : </span><?= ucwords($sekolah->sek_alamat) ?></li>
                <li class="list-group-item fw-bold"><a href='<?= site_url('rute/' . $sekolah->sek_npsn) ?>'>Tunjukan Rute <i class="ms-1 fa-solid fa-person-walking-arrow-right"></i></a></li>
            </ul>
            `).addTo(map).openPopup();
    </script>


</body>

</html>