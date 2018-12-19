@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/tests.js') }}" type="text/javascript" language="javascript"></script>
    <script type="text/javascript" language="javascript">HowManyQuest({{$questions}});</script>
@endsection

@section('content')

@foreach($questions_order as $key => $question)
<?php $question--; ?>
<form id="form{{$key+1}}" name="form{{$key+1}}">
    <div class="card border-success mt-4">
        <div class="card-header border-success">
            <h5><img class="left" src="/img/eyegray.gif" name="img" width="15" height="15"> <b>{{ __('test.question')}} {{$key+1}}.</b> {!! $doc->p[$question] !!}</h5></div>
        <div class="card-body list-group p-0">    
<?php
    $aswer_count = count($doc->ul[$question]->li);
    $answer_order = \App\Http\Controllers\Controller::rand_select_from_array($aswer_count,$aswer_count);
    $correct = array_search(1,$answer_order);
?>
@foreach($answer_order as $akey => $answer)
<?php /*$answer--;*/ ?>
            <li class="list-group-item border"><input name="RadioGroup" type="radio" value="{{$answer-1}}" onClick="ButOn('form{{$key+1}}')"> {!! $doc->ul[$question]->li[$answer-1] !!}</li>
@endforeach
        </div>
        <div class="card-footer border-success">     
            <input name="Button1" type="button" class="btn btn-success mr-3" value="{{ __('test.answer')}}" onClick="answer('form{{$key+1}}','{{$correct}}')">
            <input name="Button2" type="button" class="btn btn-warning" value="{{ __('test.help')}}" onClick="Help('form{{$key+1}}','{{$correct}}')" data-toggle="button" aria-pressed="false">
            <input name="Button3" type="button" class="btn btn-light text-light invisible" value="{{ __('test.hide')}}">    
        </div>
    </div>
</form>    
  
@endforeach
<!-- Result Table -->
<table class="w-75 mt-5">
   <tr bordercolor="#FFFFCC"> 
      <td width="30%" height="12"> 
        <p class="main">{{__('test.total_questions')}}</p></td>
      <td width="45%" height="10" bordercolor="#FFFF99"> 
        <form name="form01" method="post">
          <input value="{{ $questions }}" type="text" align="texttop" name="textfield1" readonly="true" size="10">
        </form></td>
   </tr>
   <tr bordercolor="#FFFFCC"> 
      <td height="10" > 
         <p class="main">{{ __('test.got_answers')}}: </p></td>
      <td height="10" bordercolor="#FFFF99"> 
         <form name="form02" method="post">
           <input type="text" name="textfield2" readonly="true" size="10">
         </form></td>
   </tr>
   <tr bordercolor="#FFFFCC"> 
      <td height="10" > 
        <p class="main">{{ __('test.correct')}}: </p></td>
      <td height="10" bordercolor="#FFFF99"> 
        <form name="form03" method="post">
           <input type="text" name="textfield3" readonly="true" size="10">
        </form></td>
   </tr>
   <tr bordercolor="#FFFFCC"> 
      <td height="10"> 
        <p class="main">{{ __('test.incorrect')}}: </p></td>
      <td height="10" bordercolor="#FFFF99"> 
        <form name="form04" method="post">
           <input type="text" name="textfield4" readonly="true" size="10">
        </form></td>
   </tr>
</table>
@endsection

