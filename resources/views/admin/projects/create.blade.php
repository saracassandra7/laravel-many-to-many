@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Crea nuovo progetto</h1>

    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

   @endif

    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control"
            name="name" id="name" placeholder="Inserire il nome del progetto"
            value="{{old('name')}}">
        </div>

        <div class="mb-3">
            <label for="client_name" class="form-label">Nome del cliente</label>
            <input type="text" class="form-control"
            name="client_name" id="client_name" placeholder="Inserire il nome del cliente"
            value="{{old('client_name')}}">
        </div>


        <div class="mb-3">
            <label for="type" class="form-label">Tipo di progetto</label>
            <select class="form-select" name="type_id" aria-label="Default select example">
                <option value="">Seleziona tipo</option>
                @foreach ($types as $type)
                  <option @if ($type->id == old('type_id')) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <p>Tecnologie:</p>
            @foreach ($technologies as $technology)
               <input type="checkbox" class="me-2" id="technology{{$loop->iteration}}"
               name="technologies[]" value="{{$technology->id}}"
               @if (in_array($technology->id, old('technologies',[])))
                    checked
                @endif>
                <label for="technology{{$loop->iteration}}">{{$technology->name}}</label>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="summary" class="form-label">Descrizione</label>
            <textarea class="form-control" name="summary" id="summary" rows="3">{{old('summary')}}</textarea>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input
            onchange="showImage(event)"
            type="file" class="form-control"
            name="cover_image" id="cover_image" placeholder="Inserire url dell'immagine cover"
            value="{{old('cover_image')}}">
        </div>
        <div class="mb-3">
            <img width="200" id="output-image">
        </div>

        <button type="submit" class="btn btn-success mb-5">Invia</button>

    </form>

</div>

<script>
    function showImage(event){
        const tagImage = document.getElementById('output-image');
        tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection
