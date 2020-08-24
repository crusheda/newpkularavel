@extends('layouts.app')

@section('template_title')
    Tambah Pengadaan Non Rutin
@endsection

@section('template_fastload_css')
@endsection

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="card" style="width: 100%">
                <div class="card-header @role('it', true) bg-secondary text-white @endrole">

                    Tambah Pengadaan Barang Non Rutin 

                    @role('it', true)
                        <span class="pull-right badge badge-primary" style="margin-top:4px">
                            Akses IT Support
                        </span>
                    @else
                        <span class="pull-right badge badge-warning" style="margin-top:4px">
                            Akses Publik
                        </span>
                    @endrole

                </div>
                <div class="card-body">
                    <form class="form-auth-medium" action="{{ route('nonrutin.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="container">
                            <div class="field_wrapper">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="barang[]" id="barang" value="" class="form-control" placeholder="Nama Barang">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="jumlah[]" id="jumlah" value="" class="form-control" placeholder="Jml">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="satuan[]" id="satuan" value="" class="form-control" placeholder="Satuan">
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="harga[]" id="harga" value="" class="form-control" placeholder="Harga">
                                        </div>
                                        <div class="col-md-2">
                                            <textarea class="form-control" name="keterangan[]" id="keterangan" style="height: 62%" value="" placeholder="Keterangan"></textarea>
                                        </div>
                                        <div class="col-md-1">
                                            <a class="btn btn-md btn-success" href="javascript:void(0);" id="add_button" title="Add field">TAMBAH</a>
                                        </div>           
                                        <hr width="100%">                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col text-center">
                            <button class="btn btn-md btn-primary" type="submit">SIMPAN</button>
                        </div>
                        
                        <script type="text/javascript">
                        $(document).ready(function(){
                            var maxField = 10; //Input fields increment limitation
                            var addButton = $('#add_button'); //Add button selector
                            var wrapper = $('.field_wrapper'); //Input field wrapper
                            var fieldHTML = '<div class="form-group add"><div class="row">';
                            fieldHTML=fieldHTML + '<div class="col-md-3"><input type="text" name="barang[]" id="barang" value="" class="form-control" placeholder="Nama Barang"></div>';
                            fieldHTML=fieldHTML + '<div class="col-md-2"><input type="number" name="jumlah[]" id="jumlah" value="" class="form-control" placeholder="Jml"></div>';
                            fieldHTML=fieldHTML + '<div class="col-md-2"><input type="text" name="satuan[]" id="satuan" value="" class="form-control" placeholder="Satuan"></div>';
                            fieldHTML=fieldHTML + '<div class="col-md-2"><input type="number" name="harga[]" id="harga" value="" class="form-control" placeholder="Harga"></div>';
                            fieldHTML=fieldHTML + '<div class="col-md-2"><textarea class="form-control" name="keterangan[]" id="keterangan" style="height: 62%" value="" placeholder="Keterangan "></textarea></div>';
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
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>

    

@endsection

@section('footer_scripts')
@endsection
