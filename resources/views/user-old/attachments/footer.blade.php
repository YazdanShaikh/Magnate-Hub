</div>
</section>
</div>
</div>
</div>
</section>
</body>
<script src="/user/Js/font-awesome.js"></script>
<script src="/user/Js/swiper.js"></script>
<script src="/user/Js/custom.js"></script>
<script src="/user/Js/chart-traffic/config.js"></script>
<script src="/user/Js/chart-traffic/apex-chart.js"></script>
<script src="/user/Js/jquery.slim.min.js"></script>
<script src="/user/Js/popper.min.js"></script>
<script src="/user/Js/bootstrap.bundle.min.js"></script>
<script src="/user/Js/jquery.js"></script>
<script src="/user/Js/singledivui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $(".list-b").click(function() {
            $(".list-item").slideToggle("slow");
        });
    });

    function Filter_Box_Toggle(){
        var visi =  $(".filter_Box").attr('visibility');
        if(visi == 0){
            $("#filter_button").html(' ').append(`<i aria-hidden="true" class="fa fa-times-circle fa-2x"></i>`);
            $(".filter_Box").show(300).attr('visibility',1);
        }else{
            $("#filter_button").html(' ').append(`<i aria-hidden="true" class="fa fa-filter fa-2x"></i>`);
            $(".filter_Box").hide(300).attr('visibility',0);
        }
    }
</script>

</html>
