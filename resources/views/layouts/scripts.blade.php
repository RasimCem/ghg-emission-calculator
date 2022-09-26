<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/spur.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/slectdropdown.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.usericonTigger').click(function(evt) {
            $('.topuserDropdown').toggleClass('showtopuserDropdown');
        });

        $('body').click(function(evt){
            if($(evt.target).closest('.usericonTigger, .topuserDropdown').length)
                return;
            $('.topuserDropdown').removeClass('showtopuserDropdown');
        });
    });
</script>
<script src="{{ asset('js/jquery.basictable.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.basicTable').basictable({
            breakpoint: 767
        });
    });
</script>
<script src="{{ asset('js/form-data.js') }}"></script>

<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".boxscroll").niceScroll({cursorborder:"",cursorcolor:"#0D1840",cursoropacitymax:0.7,boxzoom:true,touchbehavior:true}); //
    });
</script>
