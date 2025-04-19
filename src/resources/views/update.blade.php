<form action="/weight_logs/{{$weightlogs->id}}/update" method="POST">
  <table>
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
    <tr>
      <th>
        date
      </th>
      <td>
        <input type="text" name="date" value="{{$weightlogs->date}}">
      </td>
    </tr>
    <tr>
      <th>
        weight
      </th>
      <td>
        <input type="text" name="weight" value="{{$weightlogs->weight}}">
      </td>
    </tr>
    <tr>
      <th>
        calories
      </th>
      <td>
        <input type="text" name="calories" value="{{$weightlogs->calories}}">
      </td>
    </tr>
    <tr>
      <th>
        exercise_time
      </th>
      <td>
        <input type="text" name="exercise_time" value="{{$weightlogs->exercise_time}}">
      </td>
    </tr>
    <tr>
      <th>
        exercise_content
      </th>
      <td>
        <textarea name="exercise_content" id="" value="{{$weightlogs->exercise_content}}"></textarea>
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <button>送信</button>
      </td>
    </tr>
  </table>
</form>

<form  action="/weight_logs/{{$weightlogs->id}}/delete" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$weightlogs->id}}">
    <button class="delete-form__button-submit" type="submit">削除</button>
</form>