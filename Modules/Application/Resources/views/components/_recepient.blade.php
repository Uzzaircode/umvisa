@dynamicCard(['title'=>'Recepient','class'=>''])
@slot('body')
<div class="row">
    <div class="col">
        <div class="form-group">
            <label for="" class="form-label">Please choose your recepient</label>
            <select id="" name="supervisor" class="form-control supervisor" style="height:50%"></select>
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            <label for="" class="form-label">Your Alternative E-mail</label>
            <input type="text" class="form-control" name="alternate_email" placeholder="Ensure the email is active">
        </div>
    </div>
</div>
@endslot
@enddynamicCard