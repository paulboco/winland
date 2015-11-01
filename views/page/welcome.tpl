<?php include path('/views/layout/header.tpl') ?>

<h1>Welcome, <?php echo empty($name) ? 'guest' : "{$name}" ?></h1>
<div class="grid-row">
    <div class="grid-col">
        <h3>You are on the Winland welcome page.</h3>
        <p>Hover over each link to see the URI before clicking it.</p>
        <ul>
            <li><a href="/">No URI (the web root)</a></li>
            <li><a href="/page/welcome">Route to a controller method (segments 1 and 2 of the URI)</a></li>
            <li><a href="/page/welcome/Michael">Route to controller method with parameters (segments 3 and above)</a></li>
            <li><a href="/stone/crows">Request a non-existant page</a></li>
        </ul>
    </div>
    <div class="grid-col">
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Actual URI</td>
                    <td><?php echo $_SERVER['REQUEST_URI'] ?></td>
                </tr>
                <tr>
                    <td>Calculated URI</td>
                    <td>/<?php echo $router->uri ?></td>
                </tr>
                <tr>
                    <td>Script Called</td>
                    <td><?php echo $_SERVER['SCRIPT_NAME'] ?></td>
                </tr>
                <tr>
                    <td>Controller</td>
                    <td><?php echo $router->controller ?></td>
                </tr>
                <tr>
                    <td>Method</td>
                    <td><?php echo $router->method ?></td>
                </tr>
                <tr>
                    <td>Parameters</td>
                    <td><pre><?php echo implode(', ', $router->parameters) ?></pre></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include path('/views/layout/footer.tpl') ?>
