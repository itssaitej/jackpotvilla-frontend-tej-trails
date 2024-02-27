<script type="text/javascript">
    setInterval(function() {
        $.ajax({
            type: 'GET',
            url: '/deposit/epiqcash?transactionId=<?=$tid?>&cs=1',
            success: function(data){
                switch(data){
                    case 'SUCCESS':
                        window.location.href = '/deposit/success';
                        break;
                    case 'FAIL':
                        window.location.href = '/deposit/epiqcash-fail';
                        break;
                }
            }
        });
    }, 5000);
</script>
