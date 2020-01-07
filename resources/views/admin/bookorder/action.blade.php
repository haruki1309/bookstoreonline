<a href="javascript:void(0)" data-toggle="tooltip"  data-id="{{$id}}" data-original-title="Edit" class="edit btn btn-success btn-circle btn-sm edit-row btbookorder{{$id}}" id="btn-fetch-data">
    <i class="fas fa-angle-double-right"></i>
</a>

<script type="text/javascript">
    var can_edit = $("#iscanedit").val();
    if(can_edit==0){
        $(".btbookorder{{$id}}").attr('disabled', true);
    }
</script>
