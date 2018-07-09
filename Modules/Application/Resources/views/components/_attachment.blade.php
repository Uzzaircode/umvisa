@if(isset($ticket)) @if($ticket->attachments->count() > 0)
<br>
<div class="form-group">
    <label for="" class="form-label">Attached Files</label>
    <div class="row gutters-sm" id="attachment">
        @foreach($ticket->attachments as $t)
        <div class="col-6 col-sm-4">
            @if (pathinfo($t->path, PATHINFO_EXTENSION) == 'jpg' || pathinfo($t->path, PATHINFO_EXTENSION) == 'png')
            <a href="{{asset($t->path)}}" data-toggle="lightbox" data-gallery="attachment-gallery">
                                  <img src="{{asset($t->path)}}" width="200px" class="img-fluid">
                              </a> @endif @if(pathinfo($t->path, PATHINFO_EXTENSION) == 'doc' || pathinfo($t->path,
            PATHINFO_EXTENSION) == 'docx')
            <a href="{{asset($t->path)}}">
                                <img src="{{asset('img/file-icons/doc.png')}}" alt="" width="128px">
                                </a> @elseif(pathinfo($t->path, PATHINFO_EXTENSION) == 'pdf')
            <a href="{{asset($t->path)}}">
                                    <img src="{{asset('img/file-icons/pdf.png')}}" alt="">
                                    </a> @elseif(pathinfo($t->path, PATHINFO_EXTENSION) == 'xls' || pathinfo($t->path,
            PATHINFO_EXTENSION) == 'csv' )
            <a href="{{asset($t->path)}}">
                                        <img src="{{asset('img/file-icons/xls.png')}}" alt="">
                                        </a> @endif

        </div>
        @endforeach
    </div>
</div>
<br> @endif @endif