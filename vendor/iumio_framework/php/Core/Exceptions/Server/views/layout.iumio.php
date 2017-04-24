<?php include_once SERVER_VIEWS.'partials/header.iumio.php' ?>

    <!-- Header -->
    <header id="header" class="alt">
        <a href="index.php" class="logo"> <img src="<?= WEB_FRAMEWORK ?>theme/assets/images/iumio-horizontal-white.png" style="width: 15%"><!--<strong>iumio </strong> <span>FRAMEWORK</span>--></a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <ul class="links">
            <li><a href="<?= HOST_CURRENT ?>/iumio_dev.php">Development</a></li>
            <li><a href="<?= HOST_CURRENT ?>/iumio_preprod.php">Preproduction</a></li>
            <li><a href="<?= HOST_CURRENT ?>/iumio_prod.php">Production</a></li>
            <li><a href="<?= HOST_CURRENT ?>/iumio_dev.php/_manager/">Manager</a></li>

        </ul>
        <ul class="actions vertical">
            <li><a href="https://framework.iumio.com#contact" class="button special fit">Contact</a></li>
            <li><a href="https://framework.iumio.com" class="button fit">iumio website</a></li>
            <li><a href="https://docs.framework.iumio.com/" class="button fit">iumio documentation</a></li>
        </ul>
    </nav>

    <!-- Banner -->
    <section id="banner" class="major">
        <div class="inner">
            <header class="major">
                <h2><?= $this->code.' '.$this->codeTitle ?> - <?= ucfirst(strtolower($this->env)) ?></h2>
            </header>
            <div class="content">
                <p><?= $this->explain ?><br />
                  <?= $this->solution ?></p>

            </div>
        </div>
    </section>

<?php include_once SERVER_VIEWS.'partials/footer.iumio.php' ?>