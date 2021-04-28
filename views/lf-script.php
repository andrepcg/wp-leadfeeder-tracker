
<!-- LF Tracking starts -->
<script>
    (function(ss,ex){
        window.ldfdr=window.ldfdr||function(){(ldfdr._q=ldfdr._q||[]).push([].slice.call(arguments));};
        (function(d,s){
        fs=d.getElementsByTagName(s)[0];
        function ce(src){
            var cs=d.createElement(s);
            cs.src=src;
            setTimeout(function(){fs.parentNode.insertBefore(cs,fs)},1);
        };
        ce('https://sc.lfeeder.com/lftracker_'+ss+(ex?'_'+ex:'')+'.js');
        })(document,'script');
    })('<?php echo $options['trackingId']; ?>');
</script>
<!-- LF Tracking ends (v<?php echo LF_WP_PLUGIN_VER ?>) -->