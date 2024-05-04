@include('raising.attachments.header')

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card py-2 px-3 mb-3">
                <div class="row pt-2 pb-2 align-items-center">
                    <div class="col-12">
                        <h4 class="page-title mb-0">Pricing</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card p-4">
                        <div class="table-responsive table-fixed mt-3">
                            <div id="Table_Loader_Box" class="d-none">
                                <div class="Table_Loader"></div>
                            </div>
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Start</th>
                                        <th scope="col">Expire</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@csrf
@include('raising.attachments.footer')
<script>
    Get();
    function Get() {
        var fd = new FormData();
        fd.append('_token', $("input[name=_token]").val());
        let All = ['take', 'orderby', 'search', 'start_date', 'end_date'];
        for (let i = 0; i < All.length; i++) {
            fd.append(All[i], $("#" + All[i]).val());
        }
        $.ajax({
            method: "POST",
            url: '/Raising/Plan/Get',
            processData: false,
            contentType: false,
            data: fd,
            beforeSend: function() {
                $("#Table_Loader_Box").removeClass("d-none");
                $("#table").addClass("d-none");
            },
        }).done(function(response) {
            $("#tbody").html("").append(response);
            $("#Table_Loader_Box").addClass("d-none");
            $("#table").removeClass("d-none");
        });
    }
</script>
