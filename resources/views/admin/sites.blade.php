@extends('layouts.admin')

@section('title','Admin')

@section('content')
<div class="container-fluid my-4">
  
  <div class="row mt-5">
    <div class="col-md-12">
      <h3 class="text-center title-table">Páginas Institucionais</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 table-responsive">
      <table class="table flx-table m-0">
        <thead>
          <tr>
            <th scope="col">Título</th>
            <th scope="col">Publicado em:</th>
            <th scope="col">Ultima alteração:</th> 
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sites as $site)
          <tr >
            <th scope="row">{{$site->nm_site}}</th> 
            <td> {{ date('d/m/Y', strtotime($site->created_at)) }}</td> 
            <td> {{ date('d/m/Y', strtotime($site->updated_at)) }}</td> 
            <td>
              <button class="btn btn-default" onclick="edit(
                {{$site->cd_site}},
                '{{$site->nm_site}}',
                '{{$site->ds_site}}'
              )">
                editar
              </button>
            </td>  
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center title-table"> </h3>
    </div>
  </div>
</div>
<div  id="form_site" class="container-fluid my-4">
  <div class="row mt-5 ">
    <div class="col-md-12">
      <h3 class=" text-center title-table">Alterando <div id="nm_site"></div> </h3>
    </div>
    <div class="col-md-12 "> 
        <div id="ds_site"></div> 
    </div> 
  </div>
  <div class="row"> 
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="text-center title-table row"> 
        <div class="col-md-6">
          <button type="button" class="btn btn-secondary btn-block" onclick="cancel()">CANCELAR</button>
        </div>
        <div class="col-md-6">
          <button type="button" class="btn btn-primary btn-block" onclick="p_save()">SALVAR</button>
        </div> 
      </div>
    </div>
  </div>
</div>

 

@endsection

@section('scripts')<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script type="text/javascript" src="{{ asset('js/imob.js') }}"></script> 
<script> 
var quill;
$("#form_site").hide();
window.onload = ()=>{ 
  var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    ['blockquote', 'code-block'],

    [{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    [{ 'direction': 'rtl' }],                         // text direction

    [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    [{ 'font': [] }],
    [{ 'align': [] }],

    ['clean']                                         // remove formatting button
  ];
  quill = new Quill('#ds_site', {
    modules: {
      toolbar: toolbarOptions
    },
    theme: 'snow'
  });
}
    var p_id=""; 
    function edit(id,site,conteudo){
      p_id = id;
      $("#nm_site").html(site);
      quill.clipboard.dangerouslyPasteHTML(conteudo);
      $("#form_site").fadeIn();
    }
    function p_save(){
      $.post('{{url("")}}/admin/paginas/save',{
        id: p_id,
        descricao: quill.container.firstChild.innerHTML
      }).done((data)=>{
        alert('Página salva com sucesso!');
        window.location.reload();
      });
    }
    function cancel(){
      $("#form_site").fadeOut();
    }
 
</script>
@endsection

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
.ql-toolbar.ql-snow {background: #e0e0e0;}

div#ds_site {
    background: #fff;
    min-height: 103px;
    margin-bottom: 50px;
}
</style>
@endsection