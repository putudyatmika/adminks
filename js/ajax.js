<script type="text/javascript">
function JsonVar(temaID){
       $.ajax({url: "http://10.52.6.31/adminks/json/var/pdrb", success: function(result){
            $(".hasiljson").html(result);
        }});
   }
</script'