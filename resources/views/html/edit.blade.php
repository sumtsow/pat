@extends('layouts.app')

@section('scripts')
<script type="text/javascript" language="javascript" src="/js/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        doctype : "<!doctype html>",
        height : "600",
	width : "900",
	language: "{{app()->getLocale()}}",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,cyberim",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,preview",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        //content_css : "css/main.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "/js/template_list.js",
        external_link_list_url : "/js/link_list.js",
        external_image_list_url : "/js/image_list.js",
        media_external_list_url : "/js/media_list.js",

        // Replace values for the template plugin
        template_replace_values : {
                username : "Admin",
                staffid : "1"
        }
});
 
</script> 
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/home">{{__('auth.Dashboard')}}</a></li>
<li class="breadcrumb-item"><a href="/html">{{ __('admin.HTML admin')}}</a></li>
@endsection

@section('content')

@include('errors')

@if($saved)
<div class="alert alert-success">
    <p>{{ __('admin.saved') }}</p>
</div>
@endif
    
<div class="container">
    <a data-toggle="modal" data-target="#Modal" class="btn btn-success float-right text-light" title="{{__('admin.stop edit')}}" >{{__('admin.stop edit')}}</a>
    <h1 class="justify-center">{{ __('admin.HTML file')}} &laquo;{{ $file->__get('filename') }}&raquo;</h1>
    <h2>{{ __('admin.language')}}: {{ app()->getLocale() }}</h2>
    <h2>{{ __('admin.filesize')}}: {{ $file->__get('size')}} kb</h2>
    <form id="editor" method="post" action="/html/{{$file->__get('filename')}}">
{{csrf_field()}}{{ method_field('put') }}<textarea class="col-md-auto" name="content">{{ $file->__get('content')}}</textarea>
    </form>
</div>
<div class="modal" id="Modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('gallery.warning')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>{{__('admin.do you want save chenges')}}?</p>
      </div>
      <div class="modal-footer">
        <a href="/{{ $file->__get('filename') }}" class="btn btn-warning">{{__('admin.no')}}</a>
        <button form="editor" type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('gallery.yes')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection
