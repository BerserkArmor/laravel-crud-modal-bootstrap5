@extends('welcome')
@section('content')
 <div class="col-md-4 m-auto ">
    <h3 class="text-center p-3 text-success">Editar Producto</h3>
    <form action="editData" method="POST" enctype="multipart/form-data" >
        @csrf  
        <input type="hidden" name="pId" value="{{$pId}}">
        <div class="mb-3">
            <label for="productName" class="form-label">Nombre producto</label>
            <input type="text" class="form-control" value="{{$pName}}" name="pName" id="productName" >
            {{-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
          </div>
          <div class="mb-3">
            <label for="productPrice" class="form-label">Precio producto</label>
            <input type="number" name="pPrice" value="{{$pPrice}}" class="form-control" id="productPrice">
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-block btn-warning  ">Guardar</button>
          </div>
        </form>  
</div>   
@endsection