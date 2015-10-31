<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
<h1>Welcome<? echo empty($name) ? ', guest' : ", {$name}" ?></h1>
<p>Welcome to the landing page.</p>
</body>
</html>