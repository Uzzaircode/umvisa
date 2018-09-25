<div class="mt-5">  
</div>
<div class="col">
        <div class="form-group">
                <label for="" class="form-label">
                                    Sources of financial assistance for the visit
                        </label>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Financial Aid</td>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($financialaids as $key => $f)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$f->financialinstrument->name}}</td>
                            <td>{{$f->remarks}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
