<form>
    <div class="row">
        <div class="form-group col-md-12">
            <label>Nhà cung cấp</label>
            <input type="text" class="form-control"disabled value="{{$receipt->Supplier->name}}">
        </div>
    </div>
    <div class="row mb-4">
        <div class="form-group col-md-2">
            <label>ID</label>
            <input type="text" class="form-control"disabled value="{{$receipt->id}}">
        </div>
        <div class="form-group col-md-5">
            <label>Ngày nhập</label>
            <input type="text" class="form-control"disabled value="{{$receipt->created_at}}">
        </div>
        <div class="form-group col-md-5">
            <label>Tổng tiền</label>
            <input type="text" class="form-control"disabled value="{{$receipt->total}}">
        </div>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Đầu sách</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @for($i = 0; $i<$receipt->Book->count(); $i++)
                <tr>
                    <td scope="col">{{$i+1}}</td>
                    <td scope="col">{{$receipt->Book[$i]->title}}</td>
                    <td scope="col">{{$receipt->Book[$i]->pivot->price}}</td>
                    <td scope="col">{{$receipt->Book[$i]->pivot->qty}}</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</form>
