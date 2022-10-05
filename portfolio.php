<?php require_once 'objPortfolio.php' ?>

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Portfolio</h2>
            <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
                in iste officiis commodi quidem hic quas.</p> -->
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-own">Own Project</li>
                    <li data-filter=".filter-team">Team Project</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

            <?php foreach ($own_ as $own) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-own">
                    <div class="portfolio-wrap">
                        <img src="<?= $own['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $own['Project'] ?></h4>
                            <p><?= $own['Deskripsi'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $own['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $own['Deskripsi'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.php?detail=html" value="html" name="html1" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $own['Github'] ?>" target="_blank" class="" title="Tittle: See Code"><i class="bx bxl-figma"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

            <?php foreach ($team_ as $team) : ?>
                <div class="col-lg-4 col-md-6 portfolio-item filter-team">
                    <div class="portfolio-wrap">
                        <img src="<?= $team['Img'] ?>" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4><?= $team['Project'] ?></h4>
                            <p><?= $team['Deskripsi'] ?></p>
                            <div class="portfolio-links">
                                <a href="<?= $team['Img'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Tittle: <?= $team['Deskripsi'] ?>"><i class="bx bx-plus"></i></a>
                                <!-- <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Tittle: Portfolio Details"><i class="bx bx-link"></i></a> -->
                                <a href="<?= $team['Github'] ?>" target="_blank" class="" title="Tittle: See Code"><i class="bx bxl-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

    </div>
</section><!-- End Portfolio Section -->