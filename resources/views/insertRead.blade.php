@extends('welcome');
@section('modal-content')
<center>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger rounded-pill fs-4  fw-bold " data-bs-toggle="modal" data-bs-target="#exampleModal">
    <span class="p-2">Nuevo registro</span>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-start">
            <form action="insertData" method="POST" enctype="multipart/form-data" >
              @csrf  
              <div class="mb-3">
                  <label for="productName" class="form-label">Nombre producto</label>
                  <input type="text" class="form-control" name="pname" id="productName" aria-describedby="nameHelp">
                  {{-- <div id="nameHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="mb-3">
                  <label for="productPrice" class="form-label">Precio producto</label>
                  <input type="number" name="pprice" class="form-control" id="productPrice">
                </div>
                <div class="mb-4">
                    <label for="productImg" class="form-label">Imagen del producto</label>
                    <input name="image" class="form-control" type="file" id="productImg">
                </div>
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-block btn-success ">Agregar registro</button>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</center>
<div class="container mt-5">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Precion</th>
        <th scope="col">Producto</th>
        <th scope="col">Acciones</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($data as $key => $item)

      <tr>
      <form action="updatedelete" method="GET">
        <th scope="row"><input type="hidden" name="Id" value="{{$item['Id']}}"> {{($key+1)}}</th>
        <td><input type="hidden" name="Pname" value="{{$item['PName']}}">{{$item['PName']}}</td>
        <td><input type="hidden" name="Pprice" value="{{$item['PPrice']}}">{{$item['PPrice']}}</td>
        <td><img width="100" height="100" class="img-thumbnail mx-auto d-block" src="images/{{$item['PImage']}}" alt="imagen-producto-{{$item['name']}}" ></td>
        <td> <input type="submit" class="btn btn-warning" value="Editar" name="editar">
          <input type="submit" class="btn btn-danger" name="eliminar" value="Eliminar"></td>
      </form>

      </tr>
          
      @endforeach
    </tbody>
  </table>
</div>

  @endsection
