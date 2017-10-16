<script type="text/javascript">
$(document).on("change", '#diff_ragam_id', function(e) {
            var diff_ragamid = $(this).val();
            

            $.ajax({
                type: "GET",
                data: {department: department},
                url: 'admin/users/get_name_list.php',
                dataType: 'json',
                success: function(json) {

                    var $el = $("#diff_ragamid");
                    $el.empty(); // remove old options
                    $el.append($("<option></option>")
                            .attr("value", '').text('Please Select'));
                    $.each(json, function(value, key) {
                        $el.append($("<option></option>")
                                .attr("value", value).text(key));
                    });														
	                

                    
                    
                }
            });

        });
</script>