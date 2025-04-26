<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/css/index.css">
</head>
<body>

<div class="top__button">
  <div class="goal_setting">
   <a href="/wight_logs/goal_setting">目標体重設定</a>
  </div>
  
  <form class="logoutbutton" action="/logout" method="post">
   @csrf
   <button class="header-nav__button">ログアウト</button>
  </form>
  
</div>
  
<div class="whight__head">
  <div class="weighttarget">
    <div class="weighttarget__title">
        <span class="form__label--item">目標体重</span>
    </div>
@if ($weighttarget)
    <td>{{$weighttarget->target_weight}}kg</td>
@endif
  </div>
  <div class="latestweightlog">
    <div class="latestweightlog__title">
       <span>最新体重</span>
    </div>
@if ($latestweightlog)
    <td>{{$latestweightlog->weight}}kg</td>
@endif
  </div>
  <div class="totargetweight">
    <div>
       <span>目標まで</span>
    </div>
@if ($latestweightlog)
    <td>{{$weighttarget->target_weight - $latestweightlog->weight}}kg</td>
@endif
  </div>
</div>
    

<div class=main>

<div class="adddata">
<label for="modalToggle" class="modal-open-button">データを追加</label>
<input type="checkbox" id="modalToggle" class="modal-checkbox">
<div class="modal" id="modal">
  <div class="modal-wrapper">
    <label for="modalToggle" class="close">&times;</label>
    <div class="modal-content">
      <h3>Weight Logを追加</h3>
      


<form action="/add" method="post">
  <table>
  @csrf
    <tr>
      <th>
        <span class="form__label--item">
        日付
        </span>
        <span class="form__label--required">
        必須
        </span>
      </th>
      <td><input type="text" name="date"></td>
    </tr>
    @if ($errors->has('date'))
    <tr>
        <td>
            {{$errors->first('date')}}
        </td>
    </tr>
    @endif   
    <tr>
      <th>
        <span class="form__label--item">
        体重
        </span>
        <span class="form__label--required">
        必須
        </span>
      </th>
      <td><input type="text" name="weight"><div class="kg">kg</div></td>
    </tr>
    @if ($errors->has('weight'))
    <tr>
        <td>
            {{$errors->first('weight')}}
        </td>
    </tr>
    @endif   
    <tr>
      <th>
        <span class="form__label--item">
        摂取カロリー
        </span>
        <span class="form__label--required">
        必須
        </span>
      </th>
      <td><input type="text" name="calories"><div class="cal">cal</div></td>
    </tr>
    @if ($errors->has('calories'))
    <tr>
        <td>
            {{$errors->first('calories')}}
        </td>
    </tr>
    @endif
    <tr>
      <th>
        <span class="form__label--item">
        運動時間
        </span>
        <span class="form__label--required">
        必須
        </span>
      </th>
      <td><input type="text" name="exercise_time"></td>
    </tr>
    @if ($errors->has('exercise_time'))
    <tr>
        <td>
            {{$errors->first('exercise_time')}}
        </td>
    </tr>
    @endif
    <tr>
      <th>
        <span class="form__label--item">
        運動内容
        </span>
      </th>
      <td><textarea name="exercise_content" id=""></textarea></td>
    </tr>
    @if ($errors->has('exercise_content'))
    <tr>
        <td>
            {{$errors->first('exercise_content')}}
        </td>
    </tr>
    @endif
    
    <tr>
      <th></th>
      <td><button>送信</button></td>
    </tr>
  </table>
</form>

      </div>
    </div>
  </div>
</div>
    
      
    


<table class="weightlogtable">

  <tr>
    <th>日付</th>
    <th>体重</th>
    <th>食事摂取カロリー</th>
    <th>運動時間</th>
  </tr>
@foreach ($weightlogs as $weightlog)
  <tr>
    
    <td>{{$weightlog->date}}</td>
    <td>{{$weightlog->weight}}kg</td>
    <td>{{$weightlog->calories}}cal</td>
    <td>{{ \Carbon\Carbon::parse($weightlog->exercise_time)->format('H:i') }}</td>
    
    <td>
      <a href="/weight_logs/{{$weightlog->id}}">
        <button type="submit">✏</button>
      </a>
    </td>
    <td>
    <div class="hover-target">
    Hover Me
    <div class="hover-modal">
      <h3>Sample</h3>
    {{$weightlog->id}} </br>
    {{$weightlog->date}} </br>
    {{$weightlog->weight}} </br>
    {{$weightlog->calories}} </br>
    {{$weightlog->exercise_time}} </br>
    {{$weightlog->exercise_content}} </br>
    
      <a href="/weight_logs/{{$weightlog->id}}">アンカーテキスト</a>
    
    </div>
  </div>
</td>
  </tr>
  
@endforeach
</table>

<div class="paginate">
{{ $weightlogs->links() }}
</div>


<form class="search-form" action="/todos/search" method="get">
  @csrf
  <input type="date" name="from" value="{{ request('from') }}">
    <input type="date" name="to" value="{{ request('to') }}">
    <button type="submit">検索</button>
</form>

</div>

</body>
</html>
