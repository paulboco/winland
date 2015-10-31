<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style type="text/css">
    * { font-family: sans-serif; }
    a { color: inherit; }
    table { border-collapse: collapse; }
    tr { border-bottom: solid 1px silver; }
    th { text-align: left;}
    th, td { padding: 10px; }
    td { border-left: solid 1px silver; }
    td.result { text-align: center }
    td.result-positive { color: #0a0; }
    td.result-negative { color: #a00; }
    </style>
</head>
<body>
<h1>Welcome<?php echo empty($name) ? ', guest' : ", {$name}" ?></h1>
<h2>IIS Checklist</h2>
<table>
    <tr>
        <th>URL Rewrite Loaded</th>
        <td>Checks that the URL rewrite module is loaded.</td>
        <?php if (isset($_SERVER['IIS_UrlRewriteModule']) && ( PHP_SAPI == 'cgi-fcgi' )): ?>
            <td class="result result-positive">Yes</td>
        <?php else: ?>
            <td class="result result-negative">No</td>
        <?php endif ?>
    </tr>
    <tr>
        <th>URL Rewrite Rule</th>
        <?php if ($_SERVER['REQUEST_URI'] == '/'): ?>
            <td class="result-negative">Can't check rewrite rule from root URL. Click <a href="/page/welcome/michael">here</a> to test.</td>
            <td class="result">-</td>
        <?php else: ?>
            <td>Checks that the URL rewrite rule is functioning properly.</td>
            <?php if ($_SERVER['SCRIPT_NAME'] == '/index.php'): ?>
                <td class="result result-positive">Yes</td>
            <?php else: ?>
                <td class="result result-negative">No</td>
            <?php endif ?>
        <?php endif ?>
    </tr>
</table>

</body>
</html>