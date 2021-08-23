<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Tampilkan Nilai </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('scores.index') }}"> Kembali</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    {{ $scores->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Details:</strong>
                    {{ $scores->name_subject }}
                </div>
            </div>
        </div>
    </div>
</div>