<!-- Main -->
<!-- Footer -->

<footer id="footer">
    <div class="inner">
        <ul class="copyright">
            <?php  use iumioFramework\Core\Requirement\iumioUltimaCore; ?>
            <li>&copy; <?= date('Y') ?> <a href="https://framework.iumio.com/">iumio Framework</a></li><li>The next generation of PHP frameworks</li><li><?= iumioUltimaCore::getInfo("VERSION_EDITION").' '.iumioUltimaCore::getInfo("VERSION") ?></li>
        </ul>
    </div>
</footer>

<?= (\iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getTaskBar() != "#none")? \iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getTaskBar() : "" ?>

<!-- Scripts -->
<script src="<?= WEB_FRAMEWORK ?>theme/assets/js/jquery.min.js"></script>
<script src="<?= WEB_FRAMEWORK ?>theme/assets/js/jquery.scrolly.min.js"></script>
<script src="<?= WEB_FRAMEWORK ?>theme/assets/js/jquery.scrollex.min.js"></script>
<script src="<?= WEB_FRAMEWORK ?>theme/assets/js/skel.min.js"></script>
<script src="<?= WEB_FRAMEWORK ?>theme/assets/js/util.js"></script>
<!--[if lte IE 8]><script src="<?= WEB_FRAMEWORK ?>theme/assets/js/ie/respond.min.js"></script><![endif]-->
<script src="<?= WEB_FRAMEWORK ?>theme/assets/js/main.js"></script>
<?php \iumioFramework\Core\Additionnal\TaskBar\iumioTaskBar::getJsTaskBar() ?>

</body>
</html>