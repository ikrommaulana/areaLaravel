@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}


                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Provinsi</label>

                            <div class="col-md-6">
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">== Pilih Provinsi ==</option>
                                    @foreach ($provinsi as $prov)
                                        <option value="{{ $prov->id }}">{{ $prov->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Kota</label>

                            <div class="col-md-6">
                                <select name="kota" id="kota" class="form-control">
                                    <option value="">== Pilih Kota ==</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Kecamatan</label>

                            <div class="col-md-6">
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    <option value="">== Pilih Kecamatan ==</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Kelurahan</label>

                            <div class="col-md-6">
                                <select name="kelurahan" id="kelurahan" class="form-control">
                                    <option value="">== Pilih Kelurahan ==</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
<script type="text/javascript">
$(function () {
    $('#provinsi').on('change', function () {
    var provID = $(this).val();    
        if(provID){
            $.ajax({
            type:"GET",
            url:"/getKota?id_provinsi="+provID,
            dataType: 'JSON',
            success:function(res){               
                if(res){
                    $("#kota").empty();
                    $("#kecamatan").empty();
                    $("#kelurahan").empty();
                    $("#kota").append('<option>---Pilih Kota---</option>');
                    $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                    $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                    res.forEach(function (item, index) {
                        $("#kota").append('<option value="'+item.id+'">'+item.nama+'</option>');
                    });
                }else{
                    $("#kota").empty();
                    $("#kecamatan").empty();
                    $("#kelurahan").empty();
                }
            }
            });
        }else{
            $("#kota").empty();
            $("#kecamatan").empty();
            $("#kelurahan").empty();
        }
    });
    
    $('#kota').on('change', function () {
    var kotaID = $(this).val();    
        if(kotaID){
            $.ajax({
            type:"GET",
            url:"/getKecamatan?id_kota="+kotaID,
            dataType: 'JSON',
            success:function(res){               
                if(res){
                    $("#kecamatan").empty();
                    $("#kelurahan").empty();
                    $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                    $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                    res.forEach(function (item, index) {
                        $("#kecamatan").append('<option value="'+item.id+'">'+item.nama+'</option>');
                    });
                }else{
                    $("#kecamatan").empty();
                    $("#kelurahan").empty();
                }
            }
            });
        }else{
            $("#kecamatan").empty();
            $("#kelurahan").empty();
        }
    });
    
    $('#kecamatan').on('change', function () {
    var kecID = $(this).val();    
        if(kecID){
            $.ajax({
            type:"GET",
            url:"/getKelurahan?id_kecamatan="+kecID,
            dataType: 'JSON',
            success:function(res){               
                if(res){
                    $("#kelurahan").empty();
                    $("#kelurahan").append('<option>---Pilih Kelurahan---</option>');
                    res.forEach(function (item, index) {
                        $("#kelurahan").append('<option value="'+item.id+'">'+item.nama+'</option>');
                    });
                }else{
                    $("#kelurahan").empty();
                }
            }
            });
        }else{
            $("#kelurahan").empty();
        }
    });
});
</script>
@endsection
