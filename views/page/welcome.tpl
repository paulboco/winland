<?php include path('/views/layout/header.tpl') ?>

<div class="content">
    <h1>Welcome, <?php echo empty($name) ? 'guest' : "{$name}" ?></h1>
    <h3>Welcome to the Winland welcome page.</h3>
    <p>Hover over each link to see the URI in advance of requesting it.</p>
    <ul>
        <li><a href="/">The web root</a></li>
        <li><a href="/page/welcome">The URI to the web root</a></li>
        <li><a href="/page/welcome/Michael">Send a parameter through the URI</a></li>
        <li><a href="/stone/crows">Request a non-existant page</a></li>
    </ul>
</div>

<?php include path('/views/layout/footer.tpl') ?>
