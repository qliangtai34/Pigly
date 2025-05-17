<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>体重記録編集</title>
  <link rel="stylesheet" href="/css/update.css">
</head>
<body>
  <div class="main">
    <h1>体重記録を編集</h1>

    <form action="/weight_logs/{{ $weightlogs->id }}/update" method="POST">
      @csrf

      <input type="hidden" name="id" value="{{ $weightlogs->id }}">
      <input type="hidden" name="user_id" value="{{ $weightlogs->user_id }}">

      <div class="form-group">
        <label for="date">日付</label>
        <input type="date" id="date" name="date" value="{{ old('date', $weightlogs->date) }}">
        @error('date')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="weight">体重 (kg)</label>
        <input type="text" id="weight" name="weight" value="{{ old('weight', $weightlogs->weight) }}">
        @error('weight')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="calories">摂取カロリー (kcal)</label>
        <input type="text" id="calories" name="calories" value="{{ old('calories', $weightlogs->calories) }}">
        @error('calories')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="exercise_time">運動時間 (分)</label>
        <input type="text" id="exercise_time" name="exercise_time" value="{{ old('exercise_time', $weightlogs->exercise_time) }}">
        @error('exercise_time')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="exercise_content">運動内容</label>
        <input type="text" id="exercise_content" name="exercise_content" value="{{ old('exercise_content', $weightlogs->exercise_content) }}">
        @error('exercise_content')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-actions">
        <button type="submit">更新する</button>
      </div>
    </form>

    <form action="/weight_logs/{{ $weightlogs->id }}/delete" method="POST" onsubmit="return confirm('本当に削除しますか？')">
      @csrf
      <input type="hidden" name="id" value="{{ $weightlogs->id }}">
      <button class="delete-form__button-submit" type="submit">🗑️ 削除する</button>
    </form>
  </div>
</body>
</html>
