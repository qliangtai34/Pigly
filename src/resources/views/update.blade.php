<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/css/update.css">
</head>
<body>
<div class="main">

<div>
<form action="/weight_logs/{{$weightlogs->id}}/update" method="POST">
  <div class="update">
    @csrf
    <tr>
      
      <td>
        <input type="hidden" name="id" value="{{$weightlogs->id}}">
      </td>
    </tr>
    <tr>
      
      <td>
        <input type="hidden" name="user_id" value="{{$weightlogs->user_id}}">
      </td>
    </tr>

    <p>日付</p>
        <input type="text" name="date" value="{{$weightlogs->date}}">
    </br>
    @if ($errors->has('date'))
    <tr>
        <td>
            {{$errors->first('date')}}
        </td>
    </tr>
    @endif  
    <p>体重</p>
        <input type="text" name="date" value="{{$weightlogs->date}}">
    </br>
    @if ($errors->has('weight'))
    <tr>
        <td>
            {{$errors->first('weight')}}
        </td>
    </tr>
    @endif
    <p>摂取カロリー</p>
        <input type="text" name="date" value="{{$weightlogs->date}}">
    </br>
    @if ($errors->has('calories'))
    <tr>
        <td>
            {{$errors->first('calories')}}
        </td>
    </tr>
    @endif
    <p>運動時間</p>
        <input type="text" name="date" value="{{$weightlogs->date}}">
    </br>
    @if ($errors->has('exercise_time'))
    <tr>
        <td>
            {{$errors->first('exercise_time')}}
        </td>
    </tr>
    @endif
    <p>運動内容</p>
        <input type="text" name="date" value="{{$weightlogs->date}}">
    </br>
    @if ($errors->has('exercise_content'))
    <tr>
        <td>
            {{$errors->first('exercise_content')}}
        </td>
    </tr>
    @endif
    <tr>
      <th></th>
      <td>
        <button>送信</button>
      </td>
    </tr>
  </div>
</form>

<form  action="/weight_logs/{{$weightlogs->id}}/delete" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$weightlogs->id}}">
    <button class="delete-form__button-submit" type="submit">🗑️</button>
</form>

</div>
</body>
</html>