<button data-toggle="tooltip"  data-id="{{$id}}" data-original-title="Edit" class="edit btn btn-success btn-circle btn-sm edit-row editbt" id="btedit{{$id}}" >
    <i class="fas fa-edit"></i>
</button>

<button id="delete-row{{$id}}" data-toggle="tooltip" data-original-title="Delete" data-id="{{$id}}" class="delete btn btn-danger btn-circle ml-1 btn-sm deletebt">
    <i class="fas fa-trash"></i>
</button>

<script type="text/javascript">
    var can_edit = $("#iscanedit").val();
    var can_delete = $("#iscandelete").val();
    if(can_edit==0){
        $("#btedit{{$id}}").attr('disabled', true);
    }
    if(can_delete==0){
        $("#delete-row{{$id}}").attr('disabled', true);
    }
</script>
