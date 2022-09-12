<script>
    var elems = Array.prototype.slice.call(document.querySelectorAll('.isActive'));

    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });</script>

