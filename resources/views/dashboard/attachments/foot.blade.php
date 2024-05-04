<!-- Bootstrap core JavaScript-->
<script src="/dashboard/assets/js/jquery.min.js"></script>
<script src="/dashboard/assets/js/popper.min.js"></script>
<script src="/dashboard/assets/js/bootstrap.min.js"></script>

<!-- simplebar js -->
<script src="/dashboard/assets/plugins/simplebar/js/simplebar.js"></script>
<!-- sidebar-menu js -->
<script src="/dashboard/assets/js/sidebar-menu.js"></script>
<!-- loader scripts -->
<script src="/dashboard/assets/js/jquery.loading-indicator.js"></script>
<!-- Custom scripts -->
<script src="/dashboard/assets/js/app-script.js"></script>
<!-- Chart js -->
<!-- Apex Chart JS -->
<script src="/dashboard/assets/plugins/apexcharts/apexcharts.js"></script>
<script src="/dashboard/assets/plugins/apexcharts/apex-custom-script.js"></script>

<script src="/dashboard/assets/plugins/Chart.js/Chart.min.js"></script>
<!-- Vector map JavaScript -->
<script src="/dashboard/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="/dashboard/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- Easy Pie Chart JS -->
<script src="/dashboard/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<!-- Sparkline JS -->
<script src="/dashboard/assets/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
<script src="/dashboard/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="/dashboard/assets/plugins/jquery-knob/jquery.knob.js"></script>
{{-- Sweet Alert --}}
<script src="/dashboard/assets/plugins/alerts-boxes/js/sweetalert.min.js"></script>
{{-- Notification --}}
<script src="/dashboard/assets/plugins/notifications/js/lobibox.min.js"></script>
<script>
$(function() {
    $(".knob").knob();
});
function Notification(type,size,icon,position,message){
    Lobibox.notify(type, {
        pauseDelayOnHover: true,
        size: size,
        rounded: true,
        delayIndicator: true,
        icon: icon,
        continueDelayOnInactiveTab: false,
        position: position,
        msg: message
    });
}
function Sweet_Alert(title,message,type){
    swal({
        title: title,
        text: message,
        icon: type,
        buttons: false,
        dangerMode: true,
    })
}
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

$("#Table_Search").keyup(function () {
    var value = this.value.toLowerCase().trim();
    $("#table tr").each(function (index) {
        if (!index) return;
        $(this).find("td").each(function () {
            var id = $(this).text().toLowerCase().trim();
            var not_found = (id.indexOf(value) == -1);
            $(this).closest('tr').toggle(!not_found);
            return not_found;
        });
    });
});
</script>
<!-- Index js -->
<script src="/dashboard/assets/js/index.js"></script>


</body>

</html>
