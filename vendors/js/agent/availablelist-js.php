<script>
    $(document).ready(function(){
    $('#myBtn').click(function(event){
        event.preventDefault();
        var form = $('#form_update').serializeArray();
        // form.push({name:'stock_type', value: 'in_stock'});
        // form.push({name:'type', value: 'firewood'});
        console.log(form);
        $('.error').remove();
        var lid = $('#lid').val();
        var weight = $('#weight').val();        
        var str="<div style=\"display:flex; justify-content:center;\">"+ 
                "<div style=\"text-align:left;\">"+
                    "<div>Price Per Unit: <span style=\"color:#4DD101;\"><b>Rs. " +weight+ "</b></span></div>" +
                    "<div>Amount :  <span style=\"color:#4DD101;\"><b>Rs. " +lid+ "</b></span></div>" +
                "</div>" +
                "</div>";
        if(weight == 0) {
            $('#weight').parent().after("<p class=\"error\">Please Enter weight</p>")
        }else if(weight< 0) {
            $('#weight').parent().after("<p class=\"error\">Weight Cannot Be Negative</p>");
        } 
        
        if(weight <= 0) {
            return;
        }
        Swal.fire({
        title: 'Are you sure?',
        html: '<div>' + str + '</div>',
        // text: "Price Per Unit: "+form[0]['value']+" "+"Amount: "+form[1]['value']+" "+"Price For Amount: "+priceForAmount,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4DD101',
        cancelButtonColor: '#FF2400',
        confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#form_update").trigger("reset");
                $.ajax({
                    type: "POST",
                    url: "<?php echo URL?>agent/updateTeaWeight",
                    cache: false,
                    data: form,
                    success: function(data) {
                        Swal.fire(
                        'Updated!',
                        'Your file has been updated.',
                        'success'
                        )
                        console.log(data);
                    },
                    error : function (xhr, ajaxOptions, thrownError) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! ' + xhr.status + ' ' + thrownError,
                            // footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                })
            }
        })
    })
})
</script>