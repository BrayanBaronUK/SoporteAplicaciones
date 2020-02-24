<script>
           // to test if one string contains another string ..
    $(document).ready(function(){
 
 
        // note the jquery version change ... switch it to .on('change',
        // remember that in newer versions of jquery the method below should be
        // $("#state").on('change', function (){  ... but other than that
        // the two ways ARE EXACTLY THE SAME ...watch my video carefully and
        // you'll see what i'm referring to ..
        $("#dropdownMenuButton").change(function (){
 
            var chosenstate = $("#dropdownMenuButton").val();
//            alert(chosenstate);
 
 
        // ...end dropdown "change" event handler
        });
 

 
        $("#execute").click(function(){
 
            $("#resultbox").text(result);
 
 
            // ...end button execute clickevent handler
        });
 
 
        // ...end document ready function
    });
</script>