@extends('layouts.app')

@section('template_title')
    Tambah Pengadaan Rutin
@endsection

@section('template_fastload_css')
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-header @role('it', true) bg-secondary text-white @endrole">

                Tambah Pengadaan Barang Rutin 

                @role('it', true)
                    <span class="pull-right badge badge-primary" style="margin-top:4px">
                        Akses IT Support
                    </span>
                @else
                    <span class="pull-right badge badge-warning" style="margin-top:4px">
                        Akses Tidak Diketahui
                    </span>
                @endrole

            </div>
            <div class="card-body">
                @role('it', true)
                <form class="form-auth-small" action="{{ route('rutin.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="container">
                        <div class="field_wrapper">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="barang[]" id="barang" value="" class="form-control" placeholder="Nama Barang">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="number" name="jumlah[]" id="jumlah" value="" class="form-control" placeholder="Jml">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="satuan[]" id="satuan" value="" class="form-control" placeholder="Satuan">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="number" name="harga[]" id="harga" value="" class="form-control" placeholder="Harga">
                                    </div>
                                    <div class="col-md-3">
                                        <textarea class="form-control" name="keterangan[]" id="keterangan" style="height: 62%" value="" placeholder="Keterangan"></textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">TAMBAH</a>
                                    </div>           
                                    <hr width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-md btn-primary pull-right" type="submit">SIMPAN</button>
                    
                    <script type="text/javascript">
                    $(document).ready(function(){
                        var maxField = 10; //Input fields increment limitation
                        var addButton = $('#add_button'); //Add button selector
                        var wrapper = $('.field_wrapper'); //Input field wrapper
                        var fieldHTML = '<div class="form-group add"><div class="row">';
                        fieldHTML=fieldHTML + '<div class="col-md-3"><input type="text" name="barang[]" id="barang" value="" class="form-control" placeholder="Nama Barang"></div>';
                        fieldHTML=fieldHTML + '<div class="col-md-1"><input type="number" name="jumlah[]" id="jumlah" value="" class="form-control" placeholder="Jml"></div>';
                        fieldHTML=fieldHTML + '<div class="col-md-2"><input type="text" name="satuan[]" id="satuan" value="" class="form-control" placeholder="Satuan"></div>';
                        fieldHTML=fieldHTML + '<div class="col-md-2"><input type="number" name="harga[]" id="harga" value="" class="form-control" placeholder="Harga"></div>';
                        fieldHTML=fieldHTML + '<div class="col-md-3"><textarea class="form-control" name="keterangan[]" id="keterangan" value="" placeholder="Keterangan "></textarea></div>';
                        fieldHTML=fieldHTML + '<div class="col-md-1"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>';
                        fieldHTML=fieldHTML + '<hr width="100%">'; 
                        var x = 1; //Initial field counter is 1
                        
                        //Once add button is clicked
                        $(addButton).click(function(){
                            //Check maximum number of input fields
                            if(x < maxField){ 
                                x++; //Increment field counter
                                $(wrapper).append(fieldHTML); //Add field html
                            }
                        });
                        
                        //Once remove button is clicked
                        $(wrapper).on('click', '.remove_button', function(e){
                            e.preventDefault();
                            $(this).parent('').parent('').remove(); //Remove field html
                            x--; //Decrement field counter
                        });
                    });
                    </script>
                </form>
                @endrole
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer_scripts')
@endsection
