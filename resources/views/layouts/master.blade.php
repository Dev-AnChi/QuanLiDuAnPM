<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Web</title>
    @stack('styles')
    @stack('script')
</head>
<body>
@include('layouts.header');

<div class="main">
    @yield('main')
</div>

@include('layouts.footer');


<script type="text/javascript"> (function () {
        _360_widget_id = `_${Math.random().toString(36).slice(2)}`;
        var _360_options = {
            _360_facebook: "100009046880567",
            _360_order: "facebook",
            _360_greeting: "no",
            _360_btn_size: "normal",
            _360_display_btn: "everywhere",
            _360_chat_bubble: "1",
            _360_randomID: _360_widget_id
        };
        var _360_proto = document.location.protocol, _360_host = "js.widget.get.chat",
            _360_url = _360_proto + "//" + _360_host;
        var _360_s = document.createElement('script');
        _360_s.type = 'text/javascript';
        _360_s.async = true;
        _360_s.src = _360_url + '/360.js';
        _360_s.onload = function () {
            _360Widget.init(_360_host, _360_proto, _360_options);
        };
        var _360_x = document.getElementsByTagName('script')[0];
        _360_x.parentNode.insertBefore(_360_s, _360_x);
    })(); </script>

</body>


</html>