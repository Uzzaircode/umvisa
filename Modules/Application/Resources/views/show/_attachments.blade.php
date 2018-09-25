@if($application->applicationAttachments->count() > 0)
<div class="mt-5">
    <h3>Attachments</h3>
    <hr>
</div>
<div class="form-group">

    <br>
    <div class="form-group">
        <div class="row gutters-sm" id="attachment">
            @foreach($application->applicationAttachments as $t)
            <div class="col-6 col-sm-4">
                @if (pathinfo($t->path, PATHINFO_EXTENSION) == 'jpg' || pathinfo($t->path, PATHINFO_EXTENSION) ==
                'png')
                <a href="{{asset($t->path)}}" data-toggle="lightbox" data-gallery="attachment-gallery">
                    <img src="{{asset($t->path)}}" width="200px" class="img-fluid">
                    <br>
                    <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                </a> @endif @if(pathinfo($t->path, PATHINFO_EXTENSION) == 'doc' || pathinfo($t->path,
                PATHINFO_EXTENSION) == 'docx')
                <a href="{{asset($t->path)}}">
                    <img src="{{asset('img/file-icons/doc.png')}}" alt="" width="128px">
                    <br>
                    <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                </a> @elseif(pathinfo($t->path, PATHINFO_EXTENSION) == 'pdf')
                <a href="{{asset($t->path)}}">
                    <img src="{{asset('img/file-icons/pdf.png')}}" alt="" width="128px">
                    <br>
                    <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                </a> @elseif(pathinfo($t->path, PATHINFO_EXTENSION) == 'xls' || pathinfo($t->path,
                PATHINFO_EXTENSION) == 'csv' )
                <a href="{{asset($t->path)}}">
                    <img src="{{asset('img/file-icons/xls.png')}}" alt="" width="128px">
                    <br>
                    <p>{!!trim($t->path,'uploads/applicationsattachments/')!!}</p>
                </a> @endif
            </div>
            @endforeach
        </div>
    </div>
    <br>
    @endif