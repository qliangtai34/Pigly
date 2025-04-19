@if ($weighttarget)
    <td>{{$weighttarget->target_weight}}</td>
@endif

@if ($latestweightlog)
    <td>{{$latestweightlog->weight}}</td>
@endif

@if ($weighttarget)
    <td>{{$weighttarget->target_weight - $latestweightlog->weight}}</td>
@endif

    <style>
    .modal-checkbox {
  display: none;
}

.modal-open-button {
  padding: 10px 20px;
  color: white;
  cursor: pointer;
  background-color: #007BFF;
  border: none;
  border-radius: 5px;
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1;
  display: none;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
  background-color: rgb(0 0 0 / 60%);
}

.close {
  position: absolute;
  top: 20px;
  right: 20px;
  font-size: 24px;
  cursor: pointer;
  transform: translate(50%, -50%);
}

.modal-wrapper {
  position: relative;
  width: 80%;
  max-width: 500px;
  max-height: 70%;
  padding: 20px;
  margin: auto;
  overflow: scroll;
  background-color: #FEFEFE;
  border-radius: 5px;
}

.modal-content h1 {
  margin: 0;
  font-size: 4rem;
  line-height: 1.2em;
  letter-spacing: -0.02em;
}

.modal-checkbox:checked + .modal {
  display: flex;
}
  </style>
<label for="modalToggle" class="modal-open-button">データを追加</label>
<input type="checkbox" id="modalToggle" class="modal-checkbox">
<div class="modal" id="modal">
  <div class="modal-wrapper">
    <label for="modalToggle" class="close">&times;</label>
    <div class="modal-content">
      <h1>Weight Logを追加</h1>
      


<form action="/add" method="post">
  <table>
  @csrf
    <tr>
      <th>date</th>
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
      <th>weight</th>
      <td><input type="text" name="weight"></td>
    </tr>
    @if ($errors->has('weight'))
    <tr>
        <td>
            {{$errors->first('weight')}}
        </td>
    </tr>
    @endif   
    <tr>
      <th>calories</th>
      <td><input type="text" name="calories"></td>
    </tr>
    @if ($errors->has('calories'))
    <tr>
        <td>
            {{$errors->first('calories')}}
        </td>
    </tr>
    @endif
    <tr>
      <th>exercise_time</th>
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
      <th>exercise_content</th>
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

    <td>
      <a href="/wight_logs/goal_setting">目標体重設定</a>
    </td>

</br>
@foreach ($weightlogs as $weightlog)
  <tr>
    <td>{{$weightlog->id}}</td>
    <td>{{$weightlog->date}}</td>
    <td>{{$weightlog->weight}}</td>
    <td>{{$weightlog->calories}}</td>
    <td>{{$weightlog->exercise_time}}</td>
    <td>{{$weightlog->exercise_content}}</td>
    <td>
      <a href="/weight_logs/{{$weightlog->id}}">アンカーテキスト</a>
    </td>
    <div class="hover-target">
    Hover Me
    <div class="hover-modal">
      <h3>Sample</h3>
    <td>{{$weightlog->id}}</td>
    <td>{{$weightlog->date}}</td>
    <td>{{$weightlog->weight}}</td>
    <td>{{$weightlog->calories}}</td>
    <td>{{$weightlog->exercise_time}}</td>
    <td>{{$weightlog->exercise_content}}</td>
    <td>
      <a href="/weight_logs/{{$weightlog->id}}">アンカーテキスト</a>
    </td>
    </div>
  </div>
  </tr>
  </br>
@endforeach

<form class="form" action="/logout" method="post">
  @csrf
  <button class="header-nav__button">ログアウト</button>
</form>

<form class="search-form" action="/todos/search" method="get">
  @csrf
  <input type="date" name="from" value="{{ request('from') }}">
    <input type="date" name="to" value="{{ request('to') }}">
    <button type="submit">検索</button>
</form>


<style>
    

    .hover-target {
      display: inline-block;
      background: #3498db;
      color: white;
      padding: 0.75rem 1.5rem;
      border-radius: 5px;
      cursor: pointer;
      position: relative;
    }

    .hover-modal {
      display: none;
      position: absolute;
      top: 120%;
      left: 150%;
      transform: translateX(-50%);
      background: white;
      color: black;
      padding: 1rem;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      width: 300px;
      z-index: 100;
    }

    .hover-target:hover .hover-modal {
      display: block;
    }
  </style>
</head>
