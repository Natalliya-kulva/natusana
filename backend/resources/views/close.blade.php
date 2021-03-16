<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>

<body>

<script>
    window.opener.postMessage({token: "{{ $token }}"}, '*');
    window.close();
</script>

</body>
</html>
