<div class="text-right mb-5">
    <a class="btn btn-sm btn-secondary" id="add">
        <i class="fe fe-plus-circle"></i> Add Financial Details
    </a>
</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Financial Instruments</th>
            <th>Remarks</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="dynamic_field">
        <tr>
            <td>
                1
            </td>
            <td>
                <select name="" id="" class="form-control">
                    @foreach($ins as $n)
                        <option value="">{{$n->name}}</option>                    
                    @endforeach
                </select>               
            </td>
            <td><input type="text" class="form-control" name="num_ic_tanggungan[]"></td>
            <td><a id="+i+" class="btn btn-danger remove text-white"><i class="fe fe-trash"></i> Delete</a></td>
        </tr>
    </tbody>
</table>

@section('page-js')
<script type="text/javascript">
    $(document).ready(function(){
        var i= 1;

  $('#add').click(function(){  
       i++;  
       $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td>'+i+'</td><td><select name="" id="" class="form-control">@foreach($ins as $n)<option value="">{{$n->name}}</option>@endforeach</select></td><td><input type="text" class="form-control" name="num_ic_tanggungan[]"></td><td><a type="button" name="remove" id="'+i+'" class="btn btn-danger remove text-white"><i class="fe fe-trash"></i> Delete</a></td></tr>');  
  });  

  $(document).on('click', '.remove', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();  
  });  

    });

</script>
@endsection