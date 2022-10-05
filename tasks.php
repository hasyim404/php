<?php require_once 'objTask.php' ?>

<!-- ======= Task Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Task</h2>
            <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
                in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-html">HTML</li>
                    <li data-filter=".filter-css">CSS</li>
                    <li data-filter=".filter-bootstrap">Bootstrap</li>
                    <li data-filter=".filter-uiux">UI/UX</li>
                    <li data-filter=".filter-javascript">JavaScript</li>
                    <li data-filter=".filter-php">PHP</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($html_ as $html) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-html">
                    <div class="portfolio-wrap">
                        <img src="<?= $html['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $html['Materi'] ?></h4>
                            <p><?= $html['Tugas'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $html['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $html['Tugas'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.php?detail=html" value="html" name="html1" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $html['Github'] ?>" target="_blank" class="" title="Tittle: See Code"><i class="bx bxl-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <?php foreach ($css_ as $css) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-css">
                    <div class="portfolio-wrap">
                        <img src="<?= $css['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $css['Materi'] ?></h4>
                            <p><?= $css['Tugas'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $css['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $css['Tugas'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $css['Github'] ?>" target="_blank" class="" title="Tittle: See Code"><i class="bx bxl-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <?php foreach ($bootstrap_ as $bootstrap) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-bootstrap">
                    <div class="portfolio-wrap">
                        <img src="<?= $bootstrap['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $bootstrap['Materi'] ?></h4>
                            <p><?= $bootstrap['Tugas'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $bootstrap['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $bootstrap['Tugas'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $bootstrap['Github'] ?>" target="_blank" class="" title="Tittle: See Code"><i class="bx bxl-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <?php foreach ($uiux_ as $uiux) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-uiux">
                    <div class="portfolio-wrap">
                        <img src="<?= $uiux['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $uiux['Materi'] ?></h4>
                            <p><?= $uiux['Tugas'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $uiux['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $uiux['Tugas'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $uiux['Github'] ?>" target="_blank" class="" title="Tittle: See in Figma"><i class="bx bxl-figma"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <?php foreach ($javascript_ as $javascript) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-javascript">
                    <div class="portfolio-wrap">
                        <img src="<?= $javascript['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $javascript['Materi'] ?></h4>
                            <p><?= $javascript['Tugas'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $javascript['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $javascript['Tugas'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $javascript['Github'] ?>" target="_blank" class="" title="Tittle: See Code"><i class="bx bxl-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <?php foreach ($php_ as $php) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-php">
                    <div class="portfolio-wrap">
                        <img src="<?= $php['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $php['Materi'] ?></h4>
                            <p><?= $php['Tugas'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $php['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $php['Tugas'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $php['Github'] ?>" target="_blank" class="" title="Tittle: See Code"><i class="bx bxl-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

    </div>
</section><!-- End Task Section -->