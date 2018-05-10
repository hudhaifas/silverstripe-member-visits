<div class="progress" style="height: 5px">
    <div id="{$ObjectID}" class="progress-bar bg-info" style="height: 5px" member-visits="{$Percentage}"></div>
</div>

<script>
    $(document).ready(function () {
        var progressBar = $('#{$ObjectID}');
        var target = progressBar.data('progress');
        var current = 0;

        var progress = setInterval(function () {
            current += 1;
            if (current >= target) {
                current = target;
                clearInterval(progress);
            }

            progressBar.width(current + "%");
            //            progressBar.text(current + "%");
        }, 20);
    });
</script>